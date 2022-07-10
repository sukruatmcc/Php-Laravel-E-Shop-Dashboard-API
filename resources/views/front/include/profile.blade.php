@extends('front.tema')
@section('title') Laravel - E-commerce
@endsection
@section('content')
@include('front.include.category')
<div class="container">
<div class="row">
  <div class="col-sm-4">
    <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <a href="{{url('/')}}" class="btn btn-primary btn-block btn-sm">Home</a>
    <a href="{{route('order.front')}}" class="btn btn-info btn-block btn-sm">My Orders</a>
    <a href="{{route('logout')}}" class="btn btn-danger btn-block btn-sm" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
    <form method="post" action="{{route('logout')}}" id="logout-form">
      @csrf
</form>
  </div>
</div>
  </div>
  <div class="col-sm-8">
    <div class="card">
      <div class="card-body">
        <form method="post" action="{{route('user.profile.update',Auth::user()->id)}}">
          @csrf
        <div class="form-group">
            <label for="exampleInputPassword1">Name</label>
            <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}">
        </div>
      <div class="form-group">
       <label for="exampleInputEmail1">Email address</label>
       <input type="email" name="email" class="form-control" value="{{Auth::user()->email}}">
     </div>
     <button type="submit" class="btn btn-primary">Update</button>
   </form>
      </div>
    </div>
  </div>
</div>
</div><br>
@endsection
