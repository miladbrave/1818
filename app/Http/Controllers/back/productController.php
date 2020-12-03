<?php

namespace App\Http\Controllers\back;

use App\Brand;
use App\Http\Controllers\Controller;
use App\Photo;
use App\Product;
use Illuminate\Http\Request;

class productController extends Controller
{

    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')
            ->paginate(10);
        return view('back.product.index', compact('products'));
    }

    public function create()
    {
        $brands = Brand::all();
        return view('back.product.create', compact('brands'));
    }

    public function store(Request $request)
    {
        $newproduct = new Product();
        $newproduct->name = $request->faname;
        $newproduct->lname = $request->laname;
        $newproduct->slug = $this->make_slug($request->faname);
        $newproduct->sku = $this->generatesku();
        $newproduct->price = $request->price;
        $newproduct->discount = $request->discount;
        $newproduct->brand_id = $request->brand;
        $newproduct->type = $request->type;
        $newproduct->distribute = $request->distribute;
        $newproduct->description = $request->des;
        $newproduct->user_id = 1;
        $newproduct->count = $request->count;
        $newproduct->exist = $request->exist;
        $newproduct->save();

        $maincate = $request->get('maincategory');
        $newproduct->categories()->sync($maincate);

        $photos = explode(',', $request->input('photo_id')[0]);
        foreach ($photos as $photo) {
            $test = Photo::find($photo);
            $test->product_id = $newproduct->id;
            $test->save();
        }
        $newproduct->attributevalus()->sync($request->get('attributes'));

        return redirect()->route('product.index');
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        $pro = Product::with('attributevalus', 'categories')->whereId($product->id)->first();
        $photos = Photo::where('product_id', $product->id)->get();
        $brands = Brand::all();
        return view('back.product.edit', compact('product', 'brands', 'photos', 'pro'));
    }

    public function update(Request $request, Product $product)
    {
        $product->name = $request->faname;
        $product->lname = $request->laname;
        $product->slug = $this->make_slug($request->faname);
        $product->sku = $this->generatesku();
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->brand_id = $request->brand;
        $product->type = $request->type;
        $product->distribute = $request->distribute;
        $product->description = $request->des;
        $product->count = $request->count;
        $product->exist = $request->exist;
        $product->user_id = 1;
        $product->save();

        if ($request->get('maincategory'))
            $product->categories()->sync($request->get('maincategory'));
        else
            foreach ($product->categories as $pro)
            $product->categories()->sync($pro->id);

        $photos = explode(',', $request->input('photo_id')[0]);
        foreach ($photos as $photo) {
            $test = Photo::find($photo);
            $test->product_id = $product->id;
            $test->save();
        }
        $product->attributevalus()->sync($request->get('attributes'));

        return redirect()->route('product.index');
    }

    public function destroy(Product $product)
    {
        $photos = Photo::where('product_id',$product->id)->get();
        if ($photos) {
            foreach ($photos as $photo) {
                unlink(getcwd() . $photo->path);
                $photo->delete();
            }
        }
        $product->delete();
        return redirect()->route('product.index');
    }

    public function photoStore(Request $request)
    {
        $uploadfile = $request->file('file');
        $filename = time() . $uploadfile->getClientOriginalName();
        $original_name = $uploadfile->getClientOriginalName();
        $uploadfile->move('photo', $filename);
        $photo = new Photo();
        $photo->original_name = $original_name;
        $photo->path = $filename;
        $photo->user_id = auth()->user()->id;
        $photo->save();


        return response()->json([
            'photo_id' => $photo->id
        ]);
    }

    public function generatesku()
    {
        $number = rand(1000, 99999);
        if ($this->checksku($number)) {
            return $this->generatesku();
        }
        return (string)$number;
    }

    public function checksku($number)
    {
        return Product::where('sku', $number)->exists();
    }

    function make_slug($string, $separator = '-')
    {
        $string = trim($string);
        $string = mb_strtolower($string, 'UTF-8');
        $string = preg_replace("/[^a-z0-9_\s\-ءاآؤئبپتثجچحخدذرزژسشصضطظعغفقكکگلمنوهی]/u", '', $string);
        $string = preg_replace("/[\s\-_]+/", ' ', $string);
        $string = preg_replace("/[\s_]/", $separator, $string);
        return $string;
    }

    public function photoDestroy($id)
    {
        $photo = Photo::whereId($id)->first();
        if ($photo) {
            unlink(getcwd() . $photo->path);
            $photo->delete();
        }
        return back();
    }

    public function apiGetProducts()
    {
        $products = Product::all();
        $response = ['products' => $products];
        return response()->json( $response , 200);
    }
}
