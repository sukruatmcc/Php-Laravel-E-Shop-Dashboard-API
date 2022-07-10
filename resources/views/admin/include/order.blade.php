@extends('admin.tema')
@section('dashboard') active  @endsection
@section('title') E-Commerce - Dashboard
@section('home')
@section('css')
@endsection
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
          <h2 class="text-secondary" style="float:left">Order List</h2>

       </div>
       <div class="card-body">
         <table class="table table-striped">
 <thead>
   <tr>
     <th scope="col">#</th>
     <th scope="col">User Name</th>
     <th scope="col">Invoice No</th>
     <th scope="col">Payment Type</th>
     <th scope="col">Total</th>
     <th scope="col">Subtotal</th>
     <th scope="col">Cupon Status</th>
     <th scope="col"></th>
   </tr>
 </thead>
 <tbody>
   @foreach($orders as $order)
   <tr>
     <th scope="row">{{$order->id}}</th>
     <td>{{$order->user->name}}</td>
     <td>{{$order->invoice_no}}</td>
     <td>{{$order->payment_type}}</td>
     <td>{{$order->total}}</td>
     <td>{{$order->subtotal}}</td>
     <td>
       @if($order->cupon_discount	 == NuLL)
       <button type="submit" class="btn btn-danger btn-sm">No</button>
       @else
       <button type="submit" class="btn btn-success btn-sm">Yes</button>
       @endif
     </td>
     <td><a href="{{route('order.view',$order->id)}}" class="fa fa-eye"></a>
      <a href="" style="margin-left:5px" class="fa fa-trash"></a>
    </td>
   </tr>
   @endforeach
 </tbody>
</table>

@section('js')
@endsection
@endsection
@endsection
