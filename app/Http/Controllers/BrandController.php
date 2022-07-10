<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;

class BrandController extends Controller
{

    public function list()
    {
        $brands = Brand::paginate(10);
        return view('admin.include.brand',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function brand_add()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.include.brand_add',compact('brands','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBrandRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function brand_addPost(Request $request)
    {
      $request->validate([
     'name' => 'required|min:3|max:20|unique:users',
     'slug' => 'required|min:3|max:25',
 ]);

    Brand::insert([
     'name' => $request->name,
     'slug' => $request->slug,
     'status' => $request->status == TRUE ? '1':'0',
     'created_at' => Carbon::now(),
   ]);

    return redirect()->route('brand.list')->with('success','Added New Category');
    }


    public function brand_edit($id)
    {
      $brands = Brand::find($id);
      return view('admin.include.brand_update',compact('brands'));
    }

    public function brand_updatePost(Request $request,$id)
    {
        Brand::find($id)->update([
          'name' => $request->name,
          'slug' => $request->slug,
          'status' => $request->status == TRUE ? '1':'0',
          'created_at' => Carbon::now(),
        ]);
         return redirect()->route('brand.list')->with('success','Updated Brand');
    }

    public function brandDelete($id)
    {
      Brand::find($id)->delete();
      return redirect()->back()->with('success','Deleted Brand');
    }


     public function active($id)
     {
       Brand::find($id)->update([
         'status' => '1',
       ]);
       return redirect()->back()->with('success','Status InActive');
     }

     public function inactive($id)
     {
       Brand::find($id)->update([
         'status' => '0',
       ]);
       return redirect()->back()->with('success','Status Active');
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBrandRequest  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
