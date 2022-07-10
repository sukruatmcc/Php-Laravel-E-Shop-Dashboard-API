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
    <a href="{{url('order.front')}}" class="btn btn-info btn-block btn-sm">My Orders</a>
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
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Invoice no</th>
                        <th>Payment Type</th>
                        <th>Subtotal</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                      <th>Invoice no</th>
                      <th>Payment Type</th>
                      <th>Subtotal</th>
                      <th>Total</th>
                      <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                  @foreach($orders as $order)
                    <tr>
                        <td>{{$order->invoice_no}}</td>
                        <td>{{$order->payment_type}}t</td>
                        <td>{{$order->subtotal}}</td>
                        <td>{{$order->total}}</td>
                        <td>
                           <a href="{{route('order.view.pages',$order->id)}}"  class="btn btn-danger bnt-sm">View</a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
      </div>
    </div>
  </div>
</div>
</div><br>
@endsection
