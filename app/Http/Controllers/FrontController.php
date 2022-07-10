<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Cupons;
class FrontController extends Controller
{
    public function template()
    {
        $categories = Category::where('status','1')->get();
        $products = Products::where('status','0')->get();
        $articles = Articles::where('status',1)->get();
        $lates_products = Products::where('status','0')->limit(3)->get();
        $top_reateds = Products::where('status','0')->inRandomOrder()->limit(3)->get();
        return view('front.include.index',compact('products','categories','lates_products','top_reateds','articles'));
    }

}
