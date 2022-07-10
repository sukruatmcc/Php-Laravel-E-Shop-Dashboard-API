@extends('admin.tema')
@section('blog') active  @endsection
@section('add_articles') active  @endsection
@section('title') E-Commerce - Dashboard
@section('home')
    @section('css')
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    @endsection
    <div class="container">
        <div clas s="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-primary">
                        {{$articles->name}} Articles Update
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('articles.edit.post',$articles->id)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="">Name: <span class="text-danger">*</span></label>
                                    <input value="{{$articles->name}}"  type="text" class="form-control" name="name">
                                    @error('name') <strong class="text-danger">{{$message}}</strong>@enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Slug: <span class="text-danger">*</span></label>
                                    <input value="{{$articles->slug}}" type="text" class="form-control" name="slug">
                                    @error('slug') <strong class="text-danger">{{$message}}</strong>@enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Status(1 or 0): <span class="text-danger">*</span></label>
                                    <input value="{{$articles->status}}" type="number" class="form-control" name="status">
                                    @error('status') <strong class="text-danger">{{$message}}</strong>@enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Image: <span class="text-danger">*</span></label>
                                    @if($articles->image)
                                    <img src="{{ asset('frontend')}}/img/blog/{{$articles->image}}" width="80" height="80">
                                    @endif
                                    @error('image') <strong class="text-danger">{{$message}}</strong>@enderror
                                    <input value="" type="file" class="form-control" name="image">
                                </div>
                                <div class="col-lg-12 mb-3" >
                                    <label for="">Description: <span class="text-danger">*</span></label>
                                    <textarea type="text" id="summernote" class="form-control" name="description">{{$articles->description}}</textarea>
                                    @error('description') <strong class="text-danger">{{$message}}</strong>@enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Articles Update</button>
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
    @endsection
@endsection
@endsection
