@extends('admin.tema')
@section('title') E-Commerce - Dashboard
@section('home')
    @section('css')
    @endsection
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><span class="text-primary">{{ucfirst( $contact->name)}} Message</span></div>
                    <div class="card-body">
                        <form method="post" action="">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>User Message:<span class="text-danger">*</span></label><br>
                                    <textarea rows="8" cols="50"  class="form-control" readonly >{{$contact->description}}</textarea>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @section('js')
    @endsection
@endsection
@endsection
