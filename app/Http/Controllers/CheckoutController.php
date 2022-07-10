<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CheckoutController extends Controller
{
    public function checkout()
    {
      $carts = Cart::with('getProducts')->get();
      $subtotal = Cart::all()->where('user_ip',request()->ip())->sum(function($t){
        return $t->price * $t->qty;
      });
      return view('front.include.checkout',compact('carts','subtotal'));
    }
}
