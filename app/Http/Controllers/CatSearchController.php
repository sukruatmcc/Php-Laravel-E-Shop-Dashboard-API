<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;

class CatSearchController extends Controller
{
    public function catSearch($cat_id)
    {
      $categories=Products::where('category_id',$cat_id)->latest()->paginate(9);
      $cats = Category::where('status','1')->latest()->get();
      return view('front.include.category_search',compact('categories','cats'));
    }
}
