<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Cart;


class WishlistController extends Controller
{
    public function wishlisT($product_id)
    {
      if(Auth::check()){
           Wishlist::insert([
          'user_id' => Auth::id(),
          'product_id'=>$product_id,
        ]);
        return redirect()->back()->with('success','Product added On Wishlist');
      }
      else {
        return redirect()->route('front.login')->with('danger','Invalide Cupon');
      }
    }

    public function wishPage()
    {
      $wishlists = Wishlist::where('user_id',Auth::id())->get();
      return view('front.include.wishlist',compact('wishlists'));
    }

    public function destroyWish($product_id)
    {
      Wishlist::where('product_id',$product_id)->delete();
      return redirect()->back()->with('success','Cart Deleted');
    }


    public function truncateWish()
    {
      Wishlist::truncate();
      return redirect()->back()->with('success','All Cart Deleted');
    }



}
