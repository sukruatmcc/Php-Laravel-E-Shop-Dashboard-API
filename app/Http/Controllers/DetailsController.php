<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Cart;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\Products;
use Carbon\Carbon;

class DetailsController extends Controller
{
    public function details($id)
    {
      $products = Products::where('id',$id)->where('status','0')->first();
      $p_images = Products::inRandomOrder()->where('status','0')->limit(4)->get();
      $category_id = $products->category_id;
      $r_products = Products::where('category_id',$category_id)->where('id','!=',$id)->get();
      $reviews = Review::where('status',1)->where('product_id',$id)->get();

      $avgratingSum = Review::where('status',1)->where('product_id',$id)->sum('rating');
      $avgratingCount = Review::where('status',1)->where('product_id',$id)->count();

      $avgrating = round($avgratingSum/$avgratingCount,2);
      $avgStarRating = round($avgratingSum/$avgratingCount);


      return view('front.include.product_details',compact('products','p_images','r_products','reviews','avgratingSum',
      'avgratingCount','avgrating','avgStarRating'));
    }

    public function reviewPost(Request $request)
    {
        Review::insert([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'rating' => $request->rating,
            'review' => $request->review,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back();
    }
}
