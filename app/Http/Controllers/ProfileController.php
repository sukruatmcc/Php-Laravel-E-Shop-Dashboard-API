<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;

class ProfileController extends Controller
{
    public function profile()
    {
      $users = User::all();
      return view('front.include.profile',compact('users'));
    }

    public function orderFront()
    {
      $orders = Order::where('user_id',Auth::id())->latest()->get();
      return view('front.include.order',compact('orders'));
    }

    public function profileUpdate(Request $request,$id)
    {
      User::find($id)->update([
        'name' => $request->name,
        'email' => $request->email,
      ]);
      return redirect()->back()->with('success','Profile Updated');
    }
}
