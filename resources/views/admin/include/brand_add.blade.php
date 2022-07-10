@extends('admin.tema')
@section('title') E-Commerce - Brand - Add
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
                Brand Add
           </div>
           <div class="card-body">
             <form method="post" action="{{route('brand.add.post')}}">
               @csrf
   <div class="form-group">
     <label for="exampleFormControlInput1">Name</label>
     <input type="text" class="form-control" name="name">
   </div><br>
   <div class="form-group">
     <label for="exampleFormControlInput1">Slug</label>
     <input type="text" class="form-control" name="slug">
   </div><br>
   <div class="form-group">
   <label>Status</label>
   <input name="status" class="form-control" type="checkbox"><br>
 </div><br>
 <div class="form-group">
<input id='isFinished' @if(old('created_at')) checked @endif type="checkbox"><!--seçiliyse kalsın..-->
<label>Will there be a creation date?</label>
</div>
<br>
<div class="form-group" id='isFinishedInput' @if(!old('created_at'))  style="display:none" @endif><!--seçiliyse kalsın..-->
<label>Creation Date</label>
<input name="created_at" type="datetime-local" name="created_at" value="{{old('created_at')}}" class="form-control">
</div><br>
   <button type="submit" class="btn btn-primary">Add</button>
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
