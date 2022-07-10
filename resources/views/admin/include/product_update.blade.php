@extends('admin.tema')
@section('products') active @endsection
@section('add_products') active @endsection
@section('title') E-Commerce - Product - Manage - Update
@section('home')
@section('css')
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection
<div class="container">
   <div clas s="row">
      <div class="col-md-12">
        @error('category_id') <strong class="text-danger">{{$message}}</strong>@enderror<br>
        @error('brand_id') <strong class="text-danger">{{$message}}</strong>@enderror<br>
         <div class="card">
            <div class="card-header">
             {{$products->name}} - Product Update
            </div>
            <div class="card-body">
              <form method="post" action="{{route('product.update.post',$products->id)}}" enctype="multipart/form-data">
             @csrf
              <div class="row">
                <label for="">Choose Category: <span class="text-danger">*</span></label>
                <select value="{{old('category_id')}}" name="category_id" class="form-select form-select-lg mb-3 col-md-12 mb-3"  aria-label=".form-select-lg example">
                <option selected></option>
                @foreach($categories as $category)
                <option name="category_id" value="{{$category->id}}" {{ $category->id == $products->category_id ? 'selected':'' }}>{{$category->name}}</option>
                @endforeach
                  </select>
                  <br><br>
                  <label for="">Choose Brand: <span class="text-danger">*</span></label>
                  <select value="{{old('brand_id')}}" name="brand_id" class="form-select form-select-lg mb-3 col-md-12 mb-3"  aria-label=".form-select-lg example">
                  <option selected></option>
                  @foreach($brands as $brand)
                  <option name="brand_id" value="{{$brand->id}}" {{ $brand->id == $products->brand_id ? 'selected':'' }}>{{$brand->name}}</option>
                  @endforeach
                    </select>
                    <br><br>
                 <div class="col-md-6 mb-3">
                    <label for="">Name: <span class="text-danger">*</span></label>
                    <input value="{{$products->name}}" type="text" class="form-control" name="name">
                    @error('name') <strong class="text-danger">{{$message}}</strong>@enderror
                 </div>
                 <div class="col-md-6 mb-3">
                    <label for="">Slug: <span class="text-danger">*</span></label>
                    <input value="{{$products->slug}}" type="text" class="form-control" name="slug">
                    @error('slug') <strong class="text-danger">{{$message}}</strong>@enderror
                 </div>
                 <div class="col-md-4 mb-3">
                    <label for="">Price: <span class="text-danger">*</span></label>
                    <input value="{{$products->price}}" type="number"  class="form-control" name="price">
                    @error('price') <strong class="text-danger">{{$message}}</strong>@enderror
                 </div>
                 <div class="col-md-12 mb-3">
                  <label for="">Status</label>
                  <input type="checkbox" value="{{$products->status == "1" ? 'checked':'' }}" value="status" class="form-control" name="status">
               </div><br>
                 <div class="col-md-4 mb-3">
                    <label for="">Quantity: <span class="text-danger">*</span></label>
                    <input value="{{$products->quantity}}" type="text"  class="form-control" name="quantity">
                    @error('quantity') <strong class="text-danger">{{$message}}</strong>@enderror
                 </div>
                 <div class="col-md-4 mb-3">
                    <label for="">Code: <span class="text-danger">*</span></label>
                    <input value="{{$products->code}}" type="text"  class="form-control" name="code">
                    @error('code') <strong class="text-danger">{{$message}}</strong>@enderror
                 </div>
                 <div class="col-md-12 mb-3">
                    <label>Image: <span class="text-danger">*</span></label>
                    @if($products->image)
                    <img src="{{ asset('frontend/img/products')}}/{{$products->image}}" width="60" height="60">
                  @endif
                    @error('image') <strong class="text-danger">{{$message}}</strong>@enderror
                    <input value="" type="file" class="form-control" name="image">
                 </div>
                 <div class="col-lg-12 mb-3">
                    <label for="">Short Description: <span class="text-danger">*</span></label>
                    <textarea  type="text" id="summernote"   class="form-control" name="short_description">{{$products->short_description}}</textarea>
                    @error('short_description') <strong class="text-danger">{{$message}}</strong>@enderror
                 </div>
                 <div class="col-lg-12 mb-3" >
                    <label for="">Long Description: <span class="text-danger">*</span></label>
                    <textarea type="text" id="summernote2" class="form-control" name="long_description">{{$products->long_description}}</textarea>
                    @error('long_description') <strong class="text-danger">{{$message}}</strong>@enderror
                 </div>
                 <button type="submit" class="btn btn-primary">Product Update</button>
              </div>
           </form>
            </div>
         </div>
      </div>
   </div>
</div>
@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
 <script>
      $('#summernote').summernote({
        tabsize: 2,
        height: 100
      });
    </script>
    <script>
         $('#summernote2').summernote({
           tabsize: 2,
           height: 100
         });
       </script>
@endsection
@endsection
@endsection
