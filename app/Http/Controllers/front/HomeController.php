<?php

namespace App\Http\Controllers\front;

use App\Banner;
use App\Blog;
use App\Brand;
use App\Category;
use App\Helpers\cart;
use App\Http\Controllers\Controller;
use App\Photo;
use App\Product;
use App\Purchlist;
use App\Slider;
use App\User;
use App\Userlist;
use App\Message;
use App\Video;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{
    public function index()
    {
        visitor()->visit();
        $navcategories = Category::where('type', 'null')->get();
        $maincategories = Category::where('type', '!=', 'null')->get();
        $subcategories = Category::whereRaw("type REGEXP '^[0-9]'")->get();
        $sliders = Slider::with('photo')->where('distribute', 'انتشار')->get();
        $banners = Banner::with('photo')->where('distribute', 'انتشار')->get();
        $products = Product::with('photos', 'attributevalus', 'categories')->where('distribute', 'انتشار')->get();
        $videos = Video::with('photo')->get();
        $messages = Message::where('type','public')->latest()->get();
        return view('front.index', compact('navcategories', 'maincategories', 'subcategories', 'sliders', 'banners', 'products', 'videos','messages'));
    }

    public function about()
    {
        $navcategories = Category::where('type', 'null')->get();
        $maincategories = Category::where('type', '!=', 'null')->get();
        $subcategories = Category::whereRaw("type REGEXP '^[0-9]'")->get();
        return view('front.about', compact('navcategories', 'maincategories', 'subcategories'));
    }

    public function cart()
    {
        $navcategories = Category::where('type', 'null')->get();
        $maincategories = Category::where('type', '!=', 'null')->get();
        $subcategories = Category::whereRaw("type REGEXP '^[0-9]'")->get();
        $cart = Session::has('cart') ? Session::get('cart') : null;
        return view('front.cart', compact('navcategories', 'maincategories', 'subcategories', 'cart'));
    }

    public function category($id, $sort = 0)
    {
        $categoryId = Category::where('title', $id)->first()->id;
        $navcategories = Category::where('type', 'null')->get();
        $maincategories = Category::where('type', '!=', 'null')->get();
        $subcategories = Category::whereRaw("type REGEXP '^[0-9]'")->get();
        $categories = Category::with('products')->find($categoryId)->products->pluck('id')->toArray();
        $title = Category::find($categoryId);
//        if ($sort == 2) {
//            $products = Product::with('photos', 'categories')->whereIn('id', $categories)
//                ->orderBy('price', 'asc')
//                ->get();
//        }
//        if ($sort == 1) {
//            $products = Product::with('photos', 'categories')->whereIn('id', $categories)
//                ->orderBy('price', 'desc')
//                ->get();
//        }
//        if ($sort == 3) {
//            $products = Product::with('photos', 'categories')->whereIn('id', $categories)
//                ->orderBy('exist', 'desc')
//                ->get();
//        }
        if ($sort == 0) {
            $products = Product::with('photos', 'categories')->whereIn('id', $categories)
                ->orderBy('created_at', 'desc')
                ->get();
        }
        $rand = Product::with('categories')->whereHas('categories', function ($q) use ($id) {
            $q->where('type', $id);
        })->take(2)->get();

        return view('front.category', compact('navcategories', 'maincategories', 'subcategories', 'products', 'title','rand'));
    }

    public function checkout()
    {
        if (!auth()->user())
            return redirect()->route('login');

        $user = User::find(auth()->user()->id);
        $navcategories = Category::where('type', 'null')->get();
        $maincategories = Category::where('type', '!=', 'null')->get();
        $subcategories = Category::whereRaw("type REGEXP '^[0-9]'")->get();
        $cart = Session::has('cart') ? Session::get('cart') : null;
        return view('front.checkout', compact('navcategories', 'maincategories', 'subcategories', 'user', 'cart'));
    }

    public function contact()
    {
        $navcategories = Category::where('type', 'null')->get();
        $maincategories = Category::where('type', '!=', 'null')->get();
        $subcategories = Category::whereRaw("type REGEXP '^[0-9]'")->get();
        return view('front.contact', compact('navcategories', 'maincategories', 'subcategories'));
    }

    public function fag()
    {
        $navcategories = Category::where('type', 'null')->get();
        $maincategories = Category::where('type', '!=', 'null')->get();
        $subcategories = Category::whereRaw("type REGEXP '^[0-9]'")->get();
        return view('front.fag', compact('navcategories', 'maincategories', 'subcategories'));
    }

    public function product($slug)
    {
        $navcategories = Category::where('type', 'null')->get();
        $maincategories = Category::where('type', '!=', 'null')->get();
        $subcategories = Category::whereRaw("type REGEXP '^[0-9]'")->get();
        $product = Product::with('categories', 'photos', 'attributevalus')->where('slug', $slug)->first();
        $brand = Brand::where('id', $product->brand_id)->first();
        $categoryIds = $product->categories->pluck('id')->toArray();
        $relatedProducts = Product::with('categories', 'photos')->whereHas('categories', function ($q) use ($categoryIds) {
            $q->whereIn('categories.id', $categoryIds);
        })->get();
        $randomProducts = Product::with('photos')->get()->random(2);
        return view('front.product', compact('navcategories', 'maincategories', 'subcategories', 'product', 'relatedProducts', 'randomProducts', 'brand'));
    }

    public function addcart(Request $request, $id)
    {
        $product = Product::with('photos')->findOrFail($id);
        $oldcart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new  cart($oldcart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        Session::flash('buy', 'کالای مورد نظر به سبد خرید افزوده شد.');

        return back();
    }

    public function removeproduct(Request $request, $id)
    {
        $product = Product::with('photos')->findOrFail($id);
        $cart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new cart($cart);
        $cart->remove($product, $product->id);
        $request->session()->put('cart', $cart);
        unset($cart->items[$id]);
        if (!$cart->items) {
            Session::forget('cart');
            return redirect()->route('home');
        }
        return back();
    }

    public function addqty(Request $request, $id)
    {
        $product = Product::with('photos')->findOrFail($id);
        $cart = Session::has('cart') ? Session::get('cart') : null;
        if ($request->quantity <= $product->count) {
            $cart = new cart($cart);
            $cart->addnumber($product, $product->id, $request->quantity);
            $request->session()->put('cart', $cart);
            return back();
        }
        Session::flash('mount', 'متاسفانه مقدار انتخابی برای این محصول بیش از تعداد موجود در انبار می باشد.');
        return back();
    }

    public function updateuser(Request $request)
    {

        $user = User::find(auth()->user()->id);
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->phone = $request->phone;
        $user->city = $request->city;
        $user->province = $request->province;
        $user->postcode = $request->postcode;
        $user->address = $request->address;
        $user->save();

        $userlist = new Userlist();
        $userlist->user_id = auth()->user()->id;
        $userlist->factor = $this->factor();
        $userlist->totalprice = Session::get('cart')->totalPrice;
        $userlist->receiveprice = $request->send;
        $userlist->comment = $request->comments;
        $userlist->save();

        foreach (Session::get('cart')->items as $person) {
            if (isset($person['item']->slug)) {
                $purchlist = Purchlist::create([
                    'product_id' => $person['item']->id,
                    'count' => $person['qty'],
                    'price' => $person['price'],
                ]);
            } else {
                $purchlist = Purchlist::create([
                    'product_id' => "download" . $person['item']->id,
                    'count' => $person['qty'],
                    'price' => $person['price'],
                ]);
            }

            $purchlist->factor_number = $userlist->id;
            $purchlist->save();
        }

        return redirect()->route('pay');
    }

    public function factor()
    {
        $number = rand(10000, 999999);
        if ($this->checkfactor($number)) {
            return $this->factor();
        }
        return $number;
    }

    public function checkfactor($number)
    {
        return Userlist::where('factor', $number)->exists();
    }

    public function profile()
    {
        if (Auth::check()) {
            $navcategories = Category::where('type', 'null')->get();
            $maincategories = Category::where('type', '!=', 'null')->get();
            $subcategories = Category::whereRaw("type REGEXP '^[0-9]'")->get();
            $userlists = Userlist::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
            foreach ($userlists->pluck('id') as $userlist) {
                $purchlist[] = Purchlist::whereIn('factor_number', [$userlist])->get();
            }
            if (!isset($purchlist)) {
                $purchlist = null;
            }

            $purchl = Product::with('photos')->get();
            $messages = Message::where('type', 'send')->get();
            return view('front.profile', compact('navcategories', 'maincategories', 'subcategories', 'purchlist', 'userlists', 'purchl', 'messages'));
        }
        return redirect()->route('login');
    }

    public function message(Request $request)
    {
        if (!$request->id) {
            $validator = Validator::make($request->all(), [
                'g-recaptcha-response' => 'required|captcha',
                'email' => 'required|email',
                'description' => 'required',
            ], [
                'g-recaptcha-response.required' => 'لطفا اعتبار سنجی کنید',
                'g-recaptcha-response.captcha' => 'مشکل در کپچرا.لطفا بعدا امتحان کنید.',
                'emai.required' => 'لطفا ایمیل خود را وارد کنید.',
                'emai.email' => 'لطفا ایمیل معتبر وارد کنید.',
                'description.required' => 'لطفا متن خود را وارد کنید.',
            ]);
            $validator->validate();
        }

        $message = new Message();
        $message->name = $request->name;
        $message->description = $request->description;
        $message->type = "get";

        if (!$request->id) {
            $message->email = $request->email;
        } else {
            $mail = User::findOrFail($request->id)->email;
            $message->email = $mail;
        }

        if ($request->id)
            $message->user_id = $request->id;

        $message->save();
        Session::flash('message', ' با تشکر از شما، نظر شما ارسال شد.');

        if (isset($request->id)) {
            return redirect()->route('profile');
        } else {
            return back();
        }
    }

    public function messageApi()
    {
        $message = Message::where('type', 'public')->latest('created_at');
        return response()->json($message, 200);
    }

    public function userUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fname' => 'required',
            'lname' => 'required',
            'phone' => 'required|min:7|max:12',
//            'city' => 'required',
//            'address' => 'required',
//            'postcode' => 'numeric',
        ], [
            'fname.required' => 'لطفا نام خود را وارد کنید.',
            'lname.required' => 'لطفا نام خانوادگی خود را وارد کنید.',
            'phone.required' => 'لطفا تلفن تماس خود را وارد کنید',
            'phone.min' => 'لطفا شماره تماس معتبر وارد کنید.',
            'phone.max' => 'لطفا شماره تماس معتبر وارد کنید.',
//            'city.required' => 'لطفا شهر خود را وارد کنید.',
//            'address.required' => 'لطفا آدرس خود را وارد کنید.',
//            'postcode.required' => 'لزفا کد پستی خود را وارد کنید.',
//            'postcode.numeric' => 'لطفا کدپستی معتبر وارد کنید.',
        ]);
        $validator->validate();

        $user = User::find(auth()->user()->id);
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->phone = $request->phone;
        $user->city = $request->city;
        $user->address = $request->address;
        $user->postcode = $request->postcode;
//        $user->password = Hash::make($request->password);
        $user->save();

        return back();
    }

    public static function sendmail($id)
    {
        $user = User::findOrFail($id);
        $userlists = Userlist::where('user_id', $id)->where('status', 'success')->latest('created_at')->first();
        foreach ($userlists->pluck('id') as $userlist) {
            $purchlist[] = Purchlist::whereIn('factor_number', [$userlist])->get();
        }
        if (!isset($purchlist)) {
            $purchlist = null;
        }
        $purchl = Product::with('photos')->get();
        Mail::send('front/mail',
            [
                'user' => $user,
                'userlists' => $userlists,
                'purchlists' => $purchlist,
                'purchl' => $purchl,
            ], function ($m) use ($user) {
                $m->from('info@1818kala.ir', 'آذر یدک ریو');
                $m->to($user->email, $user->name)->subject('فاکتور خرید(1818kala.ir)');
            });

        Mail::send('front/mail',
            [
                'user' => $user,
                'userlists' => $userlists,
                'purchlists' => $purchlist,
                'purchl' => $purchl,
            ], function ($m) use ($user) {
                $m->from('info@1818kala.ir', 'آذر یدک ریو');
                $m->to('Mmodafei@gmail.com', $user->name)->subject('فاکتور خرید(1818kala.ir)');
            });

        return "ok";
    }

    public function blog()
    {
        $navcategories = Category::where('type', 'null')->get();
        $maincategories = Category::where('type', '!=', 'null')->get();
        $subcategories = Category::whereRaw("type REGEXP '^[0-9]'")->get();
        $blogs = Blog::with('photo')->get();
        $blogPhotos = Photo::where('blog_file', '!=', null)->distinct()->get('blog_file')->toArray();
        return view('front.blog', compact('navcategories', 'maincategories', 'subcategories', 'blogs', 'blogPhotos'));
    }

    public function video($id)
    {
        $navcategories = Category::where('type', 'null')->get();
        $maincategories = Category::where('type', '!=', 'null')->get();
        $subcategories = Category::whereRaw("type REGEXP '^[0-9]'")->get();
        $video = Video::where('title', $id)->first();
        return view('front.video', compact('navcategories', 'maincategories', 'subcategories', 'video'));
    }

    public function download($id)
    {
        $photos = Photo::where('blog_file', $id)->first();
        foreach ($photos as $photo) {
            return response()->download(getcwd() . $photos->path);
        }
    }

    public function test()
    {
        Mail::send('front/test',
            [], function ($m) {
                $m->from('info@1818kala.ir', 'آذر یدک ریو');
                $m->to('milad.pourshoja@gmail.com', "milad")->subject('فاکتور خرید(1818kala.ir)');
            });
    }

}
