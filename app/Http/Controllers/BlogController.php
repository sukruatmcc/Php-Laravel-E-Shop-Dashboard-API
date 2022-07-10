<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Brand;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function articlesAdd()
    {
        return view('admin.include.blog.articles_add');
    }

    public function articlesaddPost(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:1050',
            'slug' => 'required|min:3|max:1060',
            'status' => 'required',
            'description' => 'required',
        ]);
        if($request->hasFile('image')){
            $filename=$request->image->getClientOriginalName();//dosyas adı tanımlama//name tanımla!
            $fileNameWithUpload='uploads/'.$filename;//dosya yükleme
            $request->image->move(public_path('frontend/img\blog'),$filename);
            $request->merge([
                'image'=>$fileNameWithUpload,
            ]);
            $products = new Articles();
            $products->image = $filename;
            $products->name = $request->name;
            $products->slug = $request->slug;
            $products->description = $request->description;
            $products->status = $request->status;
            $products->created_at = Carbon::now();
            $products->save();

            return redirect()->back()->with('success','Added New Articles');
        }
    }

    public function articles()
    {
        $articles = Articles::all();
        return view('admin.include.blog.articles',compact('articles'));
    }

    public function delete($id)
    {
        Articles::find($id)->delete();
        return redirect()->back()->with('success','Article Deleted');
    }

    public function articlesEdit($id)
    {
        $articles = Articles::find($id);
        return view('admin.include.blog.articles_edit',compact('articles'));
    }

    public function articlesUpdate(Request $request, $id)
    {
        if ($request->hasFile('image')) {
            $filename = $request->image->getClientOriginalName();//dosyas adı tanımlama
            $fileNamewithUpload = 'upload' . $filename;//dosya yükleme
            $request->image->move(public_path('frontend/img/blog/'), $filename);
            $request->merge([
                'image' => $fileNamewithUpload,
            ]);

        }


        Articles::find($id)->update([
            'image' => $filename,
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'status' => $request->status,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('articles')->with('success', 'Updated ' . $request->name);
    }

    //admin -----------------------------------admin//
    public function frontBlog()
    {
        $articles = Articles::where('status',1)->get();
        $categories = Category::where('status',1)->get();
        return view('front.include.blog',compact('articles','categories'));
    }

    public function details($id)
    {
        $details = Articles::find($id);
        $brands = Brand::where('status','0')->latest()->get();
        $articles = Articles::where('status',1)->get();
        $categories = Category::where('status',1)->get();
        return view('front.include.blog_details',compact('articles','categories','details','brands'));
    }




}
