@extends('admin.tema')
@section('title') E-Commerce - Dashboard - Update
@section('home')
<div class="container">
   <div class="row">
     <div class="col-md-12">
       @if ($errors->any())
           <div class="alert alert-danger">
               <ul>
                   @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                   @endforeach
               </ul>
           </div>
       @endif
        <div class="card">
           <div class="card-header">
                Category Update - {{$cupons->name}}
           </div>
           <div class="card-body">
             <form method="post" action="{{route('cupon.edit.post',$cupons->id)}}">
               @csrf
                <label>Category</label>
                <input name="cupon_name" value="{{$cupons->cupon_name}}" class="form-control" type="text"><br>

                <label>Slug</label>
                <input name="cupon_slug" value="{{$cupons->cupon_slug}}" class="form-control" type="text"><br>


                  <label for="">Status</label>
                  <input type="checkbox" value="{{$cupons->status == '1' ? 'checked':'' }}" value="status" class="form-control" name="status">
                  <button class="btn btn-primary" type="submit">Cupons Update</button>
             </form>
           </div>
        </div>
     </div>
   </div>
</div>
@section('js')
    <script>
       $('#isFinished').change(function(){
           if($('#isFinished').is(':checked')){
             $('#isFinishedInput').show()
           }else {
             $('#isFinishedInput').hide()
           }
       });
    </script>
@endsection
@endsection
@endsection
