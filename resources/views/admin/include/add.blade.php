@extends('admin.tema')
@section('title') E-Commerce - Dashboard - Add
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
                Category Add
           </div>
           <div class="card-body">
             <form method="post" action="{{route('category.add.post')}}">
               @csrf
                <label>Category</label>
                <input name="name" class="form-control" type="text"><br>

                <label>Slug</label>
                <input name="slug" class="form-control" type="text"><br>

                <label>Status</label>
                <input name="status" class="form-control" type="checkbox"><br>

                <div class="form-group">
            <input id='isFinished' @if(old('created_at')) checked @endif type="checkbox"><!--seçiliyse kalsın..-->
            <label>Will there be a creation date?</label>
        </div>
        <br>
        <div class="form-group" id='isFinishedInput' @if(!old('created_at'))  style="display:none" @endif><!--seçiliyse kalsın..-->
            <label>Creation Date</label>
            <input name="created_at" type="datetime-local" name="created_at" value="{{old('created_at')}}" class="form-control">
        </div>
        <button class="btn btn-primary" type="submit">Add</button>
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
