<?php


namespace App\Helpers;


class Helpers
{
    public static function discount($price,$dis)
    {
        $discount = $price -(($price * $dis)/100);
        return $discount;
    }
}
