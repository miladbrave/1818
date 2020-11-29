<?php


namespace App\Helpers;


use Illuminate\Support\Facades\Session;

class cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;
    public $totalDiscountPrice = 0;
    public $totalPurePrice = 0;
    public $couponDiscount = 0;
    public $coupon = null;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
            $this->totalPurePrice = $oldCart->totalPurePrice;
            $this->totalDiscountPrice = $oldCart->totalDiscountPrice;
        }
    }

    public function add($item, $id)
    {
        if ($item->discount) {
            $storedItem = ['qty' => 0, 'price' => Helpers::discount($item->price, $item->discount), 'item' => $item];
        } else {
            $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        }
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        if ($item->discount) {
            $storedItem['price'] = Helpers::discount($item->price, $item->discount) * $storedItem['qty'];
            $this->totalPrice += Helpers::discount($item->price, $item->discount);
            $this->totalDiscountPrice += ($item->price - Helpers::discount($item->price, $item->discount));
        } else {
            $storedItem['price'] = $item->price * $storedItem['qty'];
            $this->totalPrice += $item->price;
        }
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPurePrice += $item->price;
    }


    public function addnumber($item, $id, $mount)
    {
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }

        if ($item->discount) {
            $this->totalPrice -= $storedItem['price'];
            $this->totalDiscountPrice -= ($item->price - Helpers::discount($item->price, $item->discount)) * $storedItem['qty'];
            $this->totalPurePrice -= ($item->price * $storedItem['qty']);
        } else {
            $this->totalPrice -= $storedItem['price'];
            $this->totalPurePrice -= ($item->price * $storedItem['qty']);
        }

        $this->totalQty -= $storedItem['qty'];

        if ($item->discount) {
            $storedItem = ['qty' => $mount, 'price' => (Helpers::discount($item->price, $item->discount) * $mount), 'item' => $item];
            $this->totalPrice += $storedItem['price'];
            $this->totalDiscountPrice += ($item->price - Helpers::discount($item->price, $item->discount)) * $storedItem['qty'];
            $this->totalPurePrice += ($item->price * $storedItem['qty']);
        } else {
            $storedItem = ['qty' => $mount, 'price' => (($item->price) * $mount), 'item' => $item];
            $this->totalPrice += $storedItem['price'];
            $this->totalPurePrice += ($item->price * $storedItem['qty']);
        }
        $this->items[$id] = $storedItem;
        $this->totalQty += $storedItem['qty'];

//        dd($this->items, $this->totalPrice, $this->totalDiscountPrice, $this->totalPurePrice);


//        if ($item->discount) {
//            $storedItem = ['qty' => 1, 'price' => Helpers::discount($item->price,$item->discount), 'item' => $item];
//            $this->totalPrice -= (Helpers::discount($item->price,$item->discount) *  $storedItem['qty']);
//            $this->totalDiscountPrice -= ($item->price - Helpers::discount($item->price,$item->discount)) *  $storedItem['qty'];
//            $this->totalPurePrice -= ($item->price * $storedItem['qty']) ;
//
//        } else {
//            $storedItem = ['qty' => 1, 'price' => $item->price, 'item' => $item];
//            $this->totalPrice -= ($item->price * $storedItem['qty']);
//            $this->totalPurePrice -= ($item->price * $storedItem['qty']) ;
//        }
//        if ($item->discount) {
//            $this->totalPrice += (Helpers::discount($item->price,$item->discount) * $mount);
//            $this->totalDiscountPrice += ($item->price - Helpers::discount($item->price,$item->discount)) * $mount;
//        } else {
//            $this->totalPrice += ($item->price * $mount);
//        }
//        $storedItem['qty'] = $mount;
//        $this->totalQty +=  $mount;
//        $this->totalPurePrice += ($item->price * $mount) ;
    }

    public function remove($item, $id)
    {
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                if ($item->discount) {
                    $this->totalPrice -= (Helpers::discount($item->price, $item->discount) * $this->items[$id]['qty']);
                    $this->totalDiscountPrice -= (($item->price) - (Helpers::discount($item->price, $item->discount))) * $this->items[$id]['qty'];
                } else {
                    $this->totalPrice = (($this->totalPrice) - (($item->price) * $this->items[$id]['qty']));
                }
                $this->totalQty -= $this->items[$id]['qty'];
                $this->totalPurePrice -= ($item->price * $this->items[$id]['qty']);
                if ($this->items[$id]['qty'] > 1) {
                    unset($this->items[$id]);
                } else {
                    unset($this->items[$id]);
                }
            }
        }
        if ($this->totalQty == 0){
            Session::forget('cart');
        }
    }


    public function addCoupon($coupon)
    {
        $couponData = ['price' => $coupon->price, 'coupon' => $coupon];
        $this->coupon = $couponData;
        $this->totalPrice -= $couponData['price'];
        $this->couponDiscount += $couponData['price'];
    }

}
