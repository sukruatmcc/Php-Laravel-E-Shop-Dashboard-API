<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Brand;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Str;
use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function productsList()
    {
        $products = Products::paginate(10);
        return view('admin.include.product',compact('products'));
    }

    public function productsAdd()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.include.products_add',compact('categories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function productAddPost(Request $request)
    {
      $request->validate([
        'category_id' => 'required',
        'brand_id' => 'required',
        'name' => 'required|min:3|max:255',
        'slug' => 'required|min:3|max:255',
        'short_description' => 'required|min:10|max:525',
        'long_description' => 'required|min:10|max:1050',
        'image' => 'required|mimes:jpg,bmp,png,jpeg',
        'price' => 'required|max:255',
        'quantity' => 'required|max:255',
        'code' => 'required|max:255',

      ]);
      if($request->hasFile('image')){
     $filename=$request->image->getClientOriginalName();//dosyas adı tanımlama//name tanımla!
     $fileNameWithUpload='uploads/'.$filename;//dosya yükleme
     $request->image->move(public_path('frontend/img/products/'),$filename);
     $request->merge([
       'image'=>$fileNameWithUpload,
     ]);
    //Categories::create($request->post());//burayı all dersen dosya tmp tanımlanır.post tanımla
    $products = new Products();
    $products->image = $filename;
    $products->category_id = $request->category_id;
    $products->brand_id = $request->brand_id;
    $products->name = $request->name;
    $products->slug = $request->slug;
    $products->short_description = $request->short_description;
    $products->long_description = $request->long_description;
    $products->price = $request->price;
    $products->quantity = $request->quantity;
    $products->code = $request->code;
    $products->created_at = Carbon::now();
    $products->save();

    return redirect()->route('products.list')->with('success','Added New Product');
    }
    }


    public function product_edit($id)
    {
      $categories = Category::all();
      $brands = Brand::all();
      $products = Products::find($id);
      return view('admin.include.product_update',compact('categories','brands','products'));
    }

    public function productUpdate(Request $request, $id)
   {
     if($request->hasFile('image')){
         $filename=$request->image->getClientOriginalName();//dosyas adı tanımlama
         $fileNamewithUpload='upload'.$filename;//dosya yükleme
         $request->image->move(public_path('frontend/img/products/'),$filename);
         $request->merge([
           'image'=>$fileNamewithUpload,
         ]);


     }


     Products::find($id)->update([
       'name' => $request->name,
       'image' => $filename,
       'category_id' => $request->category_id,
       'brand_id' => $request->brand_id,
       'slug' => $request->slug,
       'code' => $request->code,
       'quantity' => $request->quantity,
       'short_description' => $request->short_description,
       'long_description' => $request->long_description,
       'status' => $request->status == TRUE ? '1':'0',
       'created_at' => Carbon::now(),
     ]);

    return redirect()->route('products.list')->with('success','Updated '. $request->name);

   }


    public function productDelete($id)
    {
      Products::find($id)->delete();
      return redirect()->back()->with('success','Deleted Product');
    }




    public function active($id)
    {
      Products::find($id)->update([
        'status' => '1',
      ]);
      return redirect()->back()->with('success','Status InActive');
    }

    public function inactive($id)
    {
      Products::find($id)->update([
        'status' => '0',
      ]);
      return redirect()->back()->with('success','Status Active');
    }





    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductsRequest  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductsRequest $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        //
    }
}
