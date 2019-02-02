@extends('layouts.app')


@section('content')
   @include('admin.includes.errors')
    <div class="panel panel-default">
        <div class="panel-heading">
            Update tag: {{$tag->tag}}
        </div>
         <div class="panel-body">
                <form action="{{route('tag.update',['id'=>$tag->id])}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="tag">Tag</label>
                        <input type="text" value="{{$tag->tag}}" name="tag" class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            <button class="btn btn-success" type="submit" >Update Tag</button>
                        </div>
                    </div>
                </form>
         </div>
    </div>
@endsection