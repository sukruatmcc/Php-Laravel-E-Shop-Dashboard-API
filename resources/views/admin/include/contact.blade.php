@extends('admin.tema')
@section('contact') active  @endsection
@section('title') E-Commerce - Dashboard
@section('home')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><span class="text-primary">User Messages</span></div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Messages Date</th>
                                <th scope="col">User Messages</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contacts as $contact)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->email}}</td>
                                <td>{{\Carbon\Carbon::parse($contact['created_at'])->diffForHumans() }}</td>
                                <td>
                                    <a href="{{route('contact.view',$contact->id)}}" class="fa fa-eye"></a>
                                </td>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>
    </div>
@endsection
@endsection
