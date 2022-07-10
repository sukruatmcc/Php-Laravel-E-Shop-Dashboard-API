<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
      $categories = Category::paginate(10);
      return view('admin.include.category',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('admin.include.add');
    }

     public function addPost(Request $request)
     {
       $request->validate([
         'name' => 'required|min:3|max:20',
         'slug' => 'required|min:3|max:25',
       ]);
    Category::insert([
      'name' => $request->name,
      'slug' => $request->slug,
      'status' => $request->status == TRUE ? '1':'0',
      'created_at' => Carbon::now(),
    ]);

     return redirect()->route('category.list')->with('success','Added New Category');

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function category_update($id)
    {
      $categories = Category::find($id);
      return view('admin.include.category_update',compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function category_updatePost(Request $request,$id)
    {
        Category::find($id)->update([
          'name' => $request->name,
          'slug' => $request->slug,
          'status' => $request->status == TRUE ? '1':'0',
          'created_at' => Carbon::now(),
        ]);
        return redirect()->route('category.list')->with('success','Updated Category');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Category::find($id)->delete();
        return redirect()->back()->with('success','Deleted Category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function active($id)
    {
      Category::find($id)->update([
        'status' => '1',
      ]);
      return redirect()->back()->with('success','Status InActive');
    }

    public function inactive($id)
    {
      Category::find($id)->update([
        'status' => '0',
      ]);
      return redirect()->back()->with('success','Status Active');
    }
}
