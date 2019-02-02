@extends('layouts.app')


@section('content')
  
   @include('admin.includes.errors')
   
    <div class="panel panel-default">
        <div class="panel-heading">
            Create a New Tag
        </div>
         <div class="panel-body">
                <form action="/admin/tag/store" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    
                    <div class="form-group">
                        <label for="tag">Tag</label>
                        <textarea class="form-control" name="tag" cols="30" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            <button class="btn btn-success" type="submit">Store Tag</button>
                        </div>
                    </div>
                </form>
         </div>
    </div>
@endsection