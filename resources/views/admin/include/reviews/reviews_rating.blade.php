@extends('admin.tema')
@section('blog') active  @endsection
@section('reviews') active  @endsection
@section('title') E-Commerce - Dashboard
@section('home')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>User Email</th>
                                <th>Review</th>
                                <th>Rating</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Product Name</th>
                                <th>User Email</th>
                                <th>Review</th>
                                <th>Rating</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($reviews as $review)
                            <tr>
                                <td>{{$review->product->name}}</td>
                                <td>{{$review->user->email}}</td>
                                <td>{{$review->review}}</td>
                                <td>{{\Carbon\Carbon::parse($review['created_at'])->diffForHumans() }}</td>
                                <td
                                    @if($review->status == 1)
                                        <a href="#" class="btn btn-success btn-sm">Active</a>
                                    @else
                                        <a href="#" class="btn btn-danger btn-sm">InActive</a>
                                    @endif
                                </td>
                            <td>
                                <a href="#" style="margin-left:5px" class="fa fa-trash"></a>
                            </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@endsection
