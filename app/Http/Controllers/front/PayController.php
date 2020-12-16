<?php

namespace App\Http\Controllers\front;

use App\Category;
use App\Http\Controllers\Controller;
use App\Pay;
use App\Product;
use App\Purchlist;
use App\Userlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;

class PayController extends Controller
{
    public function pay()
    {
        $mount = Userlist::where('user_id', auth()->user()->id)->latest('created_at')->first();
        $total = $mount->totalprice + $mount->receiveprice;
        $total = ($total/10);
        $invoice = (new Invoice)->amount((int)$total);
        $payment = Payment::callbackUrl(route('paypack_callback'))->purchase($invoice);
        $pay = new Pay();
        $pay->transaction_id = $invoice->getTransactionId();
        $pay->price = $invoice->getAmount();

        if (auth()->user()->id)
            $pay->user_id = auth()->user()->id;
        else
            $pay->user_id = 1000000;
        $pay->name = Session::get('data.name');
        $pay->description = Session::get('data.description');

        $pay->save();
        return $payment->pay()->render();
    }

    public function paypack_callback(Request $request)  //موفق یا ناموفق
    {
        try {
            $pay = Pay::where('transaction_id', ltrim($request->Authority, '0'))->latest()->first();
            if (isset($pay)) {
                $price = (int)$pay->price;
                $payment = Payment::amount($price)->transactionId($pay->transaction_id)->verify();
                if ($request->success == "OK") {
                    $pay->status = 'success';
                    $pay->payment_date = Carbon::now();
                    $pay->order_id = $payment->getReferenceId();
                    $pay->save();
                }
            }
            return redirect()->route('payStatus')->with('success', 'پرداخت موفقیت آمیز');

        } catch (InvalidPaymentException $exception) {
            $pay->status = 'failed';
            $pay->save();
            return redirect()->route('payStatus')->with('error', $exception->getMessage());
        }
    }

    public function payStatus()
    {
        $navcategories = Category::where('type', 'null')->get();
        $maincategories = Category::where('type', '!=', 'null')->get();
        $subcategories = Category::whereRaw("type REGEXP '^[0-9]'")->get();
        if (Auth::check()) {
            $pays = Pay::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->first();
            if ($pays->status == 'success') {
                $userlist = Userlist::where('user_id', $pays->user_id)->latest('created_at')->first();
                $purchlist = Purchlist::where('factor_number', $userlist->id)->get();
                foreach ($purchlist as $pro) {
                    $product = Product::where('id', $pro->product_id)->first();
                    if ($product) {
                        $num = $product->count - $pro->count;
                        $product->count = $num;
                        $product->save();
                    }
                }
                Session::forget('cart');
                $userlist->status = "success";
                $userlist->save();
                HomeController::sendmail(auth()->user()->id);
            }
        }
        if (!Auth::check()){
            $pays = Pay::where('user_id', 1000000)->orderBy('created_at', 'DESC')->first();
            Session::forget('data');
        }

        return view('front.callback', compact( 'pays', 'navcategories', 'maincategories', 'subcategories'))
            ->with('success', 'error');
    }

}
