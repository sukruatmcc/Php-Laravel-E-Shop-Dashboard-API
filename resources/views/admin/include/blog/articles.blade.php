@extends('admin.tema')
@section('blog') active  @endsection
@section('articles_mng') active  @endsection
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
                    <div class="card-header text-primary">
                        Manager Articles
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>İmage</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Latest Transaction</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>İmage</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Latest Transaction</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($articles as $article)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$article->name}}</td>
                                    <td>
                                        <img src="{{asset('frontend')}}/img/blog/{{$article->image}}" height="60">
                                    </td>
                                    <td>
                                        @if($article->status == 1)
                                            <button type="button" class="btn btn-success">Active</button>
                                        @else
                                            <button type="button" class="btn btn-danger">InActive</button>
                                        @endif
                                    </td>
                                    <td>{{\Carbon\Carbon::parse($article['created_at'])->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{route('articles.edit',$article->id)}}" style="margin-left:5px" class="fa fa-edit"></a>
                                        <a href="{{route('articles.delete',$article->id)}}" style="margin-left:5px" class="fa fa-trash"></a>
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
    </div>
@endsection
@endsection
