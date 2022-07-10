<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;

class ShopController extends Controller
{
  public function shop()
  {
    $categories = Category::where('status','1')->get();
    $latest_products = Products::where('status','1')->inRandomOrder()->limit(3)->get();
    $sale_off_products = Products::where('status','0')->get();
    $products = Products::where('status','1')->paginate(12);
    return view('front.include.shop_page',compact('categories','latest_products','sale_off_products','products'));
  }
}
