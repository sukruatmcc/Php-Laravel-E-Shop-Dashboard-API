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
                Brand Update - {{$brands->name}}
           </div>
           <div class="card-body">
             <form method="post" action="{{route('brand.update.post',$brands->id)}}">
               @csrf
                <label>Brand</label>
                <input name="name" value="{{$brands->name}}" class="form-control" type="text"><br>

                <label>Slug</label>
                <input name="slug" value="{{$brands->slug}}" class="form-control" type="text"><br>


                  <label for="">Status</label>
                  <input type="checkbox" value="{{$brands->status}}" value="status" class="form-control" name="status">

                <div class="form-group">
            <input id='isFinished' @if(old('created_at')) value="{{$brands->status == '1' ? 'checked':'' }}" checked @endif type="checkbox"><!--seçiliyse kalsın..-->
            <label>Will there be a creation date?</label>
        </div>
        <br>
        <div class="form-group" id='isFinishedInput' @if(!old('created_at'))  style="display:none" @endif><!--seçiliyse kalsın..-->
            <label>Creation Date</label>
            <input name="created_at" type="datetime-local" name="created_at" value="{{old('created_at')}}" class="form-control">
        </div>
        <button class="btn btn-primary" type="submit">Update</button>
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
