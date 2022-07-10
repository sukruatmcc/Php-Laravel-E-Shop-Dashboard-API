@extends('admin.tema')
@section('brand') active  @endsection
@section('title') E-Commerce - Dashboard
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
          <h2 class="text-secondary" style="float:left">All Brand</h2>
          <a href="{{route('brand.add')}}" style="float:left; margin-left:750px" class="btn btn-success">Brand Add</a>
       </div>
          @if($brands->count() > 0)
       <div class="card-body">
         <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Status</th>
      <th scope="col">Creation Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($brands as $brand)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$brand->name}}</td>
      <td>
        @if($brand->status == 0)
        <a href="{{route('brand.active',$brand->id)}}"class="btn btn-success btn-sm">Active</a>
        @else
        <a href="{{route('brand.inactive',$brand->id)}}" class="btn btn-danger btn-sm">InActive</a>
        @endif
      </td>
      <td>{{\Carbon\Carbon::parse($brand['created_at'])->diffForHumans() }}</td>
      <td><a href="{{route('brand.edit',$brand->id)}}"><svg xmlns="http://www.w3.org/2000/svg" class="text-success"  width="20" height="20" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
   <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
 </svg></a>
 <a href="{{route('brand.delete',$brand->id)}}">
 <svg xmlns="http://www.w3.org/2000/svg"  class="text-danger" width="20" style="margin-left:7px" height="20" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
   <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
 </svg></a>
 </td>
    @endforeach
    {{$brands->links('pagination::bootstrap-5')}}
  </tbody>
</table>

</div>
@else
<h3 class="alert alert-danger">Not Found Brand</h3>
@endif
       </div>
   </div>
</div>
</div>
@endsection
@endsection
