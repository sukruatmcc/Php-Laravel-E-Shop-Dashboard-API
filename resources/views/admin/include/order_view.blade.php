@extends('admin.tema')
@section('dashboard') active  @endsection
@section('title') E-Commerce - Dashboard
@section('home')
@section('css')
@endsection
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header"><span class="text-primary">{{ucfirst($order->user->name)}} Shipping</span></div>
<div class="card-body">
<form method="post" action="">
  <div class="row">
<div class="form-group col-md-4">
<label>First Name:<span class="text-danger">*</span></label><br>
<input type="text" value="{{$shippings->shipping_first_name}}"  class="form-control" readonly >
</div>
<div class="form-group col-md-4">
<label>Last Name:<span class="text-danger">*</span></label><br>
<input type="text" value="{{$shippings->shipping_last_name}}" class="form-control" readonly >
</div>
<div class="form-group col-md-4">
<label>Shipping:<span class="text-danger">*</span></label><br>
<input type="text" value="{{$shippings->shipping_email}}" class="form-control" readonly >
</div>
</div>
<div class="row">
<div class="form-group col-md-4">
<label>Phone:<span class="text-danger">*</span></label><br>
<input type="text" value="{{$shippings->shipping_phone}}" class="form-control" readonly >
</div>
<div class="form-group col-md-4">
<label>Post Code:<span class="text-danger">*</span></label><br>
<input type="text" value="{{$shippings->post_code}}" class="form-control" readonly >
</div>
<div class="form-group col-md-4">
<label>State:<span class="text-danger">*</span></label><br>
<input type="text" class="form-control" value="{{$shippings->state}}" readonly>
</div>
<div>
</form>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label>Address:<span class="text-danger">*</span></label><br>
<textarea class="form-control" rows="4" cols="100" readonly>{{$shippings->address}}</textarea>
</div>
</div>
</div>
</div>
</div>
<br>
<div class="card">
<div class="card-header">
<span class="text-primary">{{ucfirst($order->user->name)}} Orders</span>
</div>
<div class="card-body">
  <form method="post" action="">
    <div class="row">
  <div class="form-group col-md-6">
  <label>Invoice No:<span class="text-danger">*</span></label><br>
  <input type="text" value="{{$order->invoice_no}}"  class="form-control" readonly >
  </div>
  <div class="form-group col-md-6">
  <label>Payment Type:<span class="text-danger">*</span></label><br>
  <input type="text" value="{{$order->payment_type}}" class="form-control" readonly >
  </div>
  </div>
  <div class="row">
    <div class="form-group col-md-4">
    <label>Cupon Discount:<span class="text-danger">*</span></label><br>
    <input type="number" value="{{$order->cupon_discount}}" class="form-control" readonly >
    </div>
    <div class="form-group col-md-4">
    <label>Total:<span class="text-danger">*</span></label><br>
    <input type="text" value="{{$order->total}}" class="form-control" readonly >
    </div>
    <div class="form-group col-md-4">
    <label>Subtotal:<span class="text-danger">*</span></label><br>
    <input type="text" class="form-control" value="{{$order->subtotal}}" readonly>
    </div>
  </div>
</div>
</div>
<br>
<div class="card">
<div class="card-header">
<span class="text-primary">{{ucfirst($order->user->name)}} Item Orders</span>
</div>
<div class="card-body">
  <div class="row">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
              <th>Products Image</th>
              <th>Products Name</th>
              <th>Products Quantity</th>
        </thead>
        <tfoot>
            <tr>
                <th>Products Image</th>
                <th>Products Name</th>
                <th>Products Quantity</th>
            </tr>
        </tfoot>
        <tbody>
          @foreach($items as $item)
            <tr>
                <td>
                  <img src="{{asset('frontend')}}/img/products/{{$item->productsOrder->image}}" height="60">
                </td>
                <td>{{$item->productsOrder->name}}</td>
                <td>{{$item->productsOrder->quantity}}</td>
            </tr>
            @endforeach
          </tbody>
          </table>
</div>
</div>
</div>
</div>
</div>
@section('js')
@endsection
@endsection
@endsection
