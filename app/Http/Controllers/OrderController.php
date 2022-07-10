<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use Carbon\Carbon;
use Session;

class OrderController extends Controller
{
    public function storeOrder(Request $request)
    {
       $order_id = Order::insertGetId([
         'user_id' => Auth::id(),
          'invoice_no' => mt_rand(100000000000,999999999999),
          'payment_type' => $request->payment_type,
          'total' => $request->total,
          'subtotal' => $request->subtotal,
          'cupon_discount' => $request->cupon_discount,
          'created_at' => Carbon::now(),
       ]);

       $carts = Cart::where('user_ip',request()->ip())->latest()->get();

       foreach($carts as $cart){
         OrderItem::insert([
           'order_id' => $order_id,
           'product_id' => $cart->product_id,
           'product_qty' => $cart->qty,
           'created_at' => Carbon::now(),
         ]);
       }

       Shipping::insert([
         'order_id' => $order_id,
         'shipping_first_name' => $request->shipping_first_name,
         'shipping_last_name' => $request->shipping_last_name,
         'shipping_email' => $request->shipping_email,
         'shipping_phone' => $request->shipping_phone,
         'address' => $request->address,
         'state' => $request->state,
         'post_code' => $request->post_code,
         'created_at' => Carbon::now(),
       ]);

       if(Session::has('cupon_name')){
         session()->forget('cupon_name');
       }
       return redirect()->back()->with('success','Your order Placed Done');
    }

    //-------------------admin-----------------//
    public function order()
    {
      $orders = Order::latest()->get();
      return view('admin.include.order',compact('orders'));
    }

    public function viewOrder($order_id)
    {
      $order = Order::findOrFail($order_id);
      $items = OrderItem::where('order_id',$order_id)->get();
      $shippings = Shipping::where('order_id',$order_id)->first();
      return view('admin.include.order_view',compact('order','items','shippings'));
    }

    public function viewOrderFront($order_id)
    {
      $order = Order::findOrFail($order_id);
      $items = OrderItem::where('order_id',$order_id)->get();
      $shippings = Shipping::where('order_id',$order_id)->first();
      return view('front.include.order_view',compact('order','items','shippings'));
    }




    //------------------admin--------------------//
}
