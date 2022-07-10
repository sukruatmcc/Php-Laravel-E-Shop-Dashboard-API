<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cupon;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use Session;

class CartController extends Controller
{

    public function addToCart(Request $request,$product_id)
    {
      $check = Cart::where('product_id',$product_id)->first();
      if($check){
        Cart::where('product_id',$product_id)->increment('qty');
        return redirect()->back()->with('success','Product added On Cart');
      }
      else{
        Cart::insert([
          'product_id' => $product_id,
          'qty' =>1,
          'price' => $request->price,
          'user_ip' => $request->ip(),
        ]);
        return redirect()->back()->with('success','Product added On Cart');
      }
    }

    public function cart()
    {
      $carts = Cart::with('getProducts')->get();
      $subtotal = Cart::all()->where('user_ip',request()->ip())->sum(function($t){
        return $t->price * $t->qty;
      });
      return view('front.include.cart',compact('carts','subtotal'));
    }

    public function cartDelete($id)
    {
      Cart::where('id',$id)->where('user_ip',request()->ip())->delete();
      return redirect()->back()->with('success','Cart Deleted');
    }

    public function clearCartDelete()
    {
      Cart::truncate();
      return redirect()->back()->with('success','Clear Cart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function quantityUpdatePost(Request $request,$id)
    {
        Cart::where('id',$id)->where('user_ip',request()->ip())->update([
          'qty' => $request->qty,
        ]);
        return redirect()->back()->with('success','Update Quantity');
    }

    public function cuponApply(Request $request)
    {
      $check = Cupon::where('cupon_name',$request->cupon_name)->where('status',1)->first();
      if($check){
        Session::put('cupon_name',[
          'coupon_name' => $check->cupon_name,
          'discount' => $check->discount,
        ]);
        return redirect()->back()->with('success','Cupon Applied');
      }
      else{
        return redirect()->back()->with('danger','Invalide Cupon');
      }
    }

    public function cuponDeleteFront($id)
    {
      Cupon::find($id);
      return redirect()->back()->with('success','Cupon Deleted');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCartRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCartRequest  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
