@extends('admin.tema')
@section('cupon') active  @endsection
@section('title') E-Commerce - Copon - Manager
@section('home')
<div class="container">
<div class="row">
  <div class="col-md-12">
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
   <div class="card">
       <div class="card-header">
          <h2 class="text-secondary" style="float:left">Add Cupons</h2>
       </div>
       <div class="card-body">
         <form method="post" action="{{route('cupon.add.post')}}">
           @csrf
            <label>Cupon Name</label>
            @error('cupon_name') <strong class="text-danger">{{$message}}</strong>@enderror
            <input name="cupon_name" class="form-control" type="text">
            <br><br>
            <label>Cupon Discount</label>
            @error('discount') <strong class="text-danger">{{$message}}</strong>@enderror
            <input name="discount" class="form-control" type="number">
            <br><br>
            <label>Cupon Slug</label>
            @error('cupon_slug') <strong class="text-danger">{{$message}}</strong>@enderror
            <input name="cupon_slug" class="form-control" type="text"><br>
            <br><br>
            <label>Status</label>
            <input name="status" class="form-control" type="checkbox"><br>
            <button class="btn btn-primary" type="submit">Cupon Add</button>
         </form>

   </div>
</div>
</div>
@endsection
@endsection
