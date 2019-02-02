@extends('layouts.app')


@section('content')
  
   @include('admin.includes.errors')
   
    <div class="panel panel-default">
        <div class="panel-heading">
            Create a New Post
        </div>
         <div class="panel-body">
                <form action="{{route('post.update',['id'=>$post->id])}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="{{$post->title}}">
                    </div>
                    <div class="form-group">
                        <label for="featured">Featured Image</label>
                        <input type="file" name="featured"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="category">Select Category</label>
                        <select name="category_id" id="category" class="forrm-control">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                       <label for="tags">Select Tags</label>
                        @foreach($tags as $tag)
                            <div class="checkbox">
                                <label><input type="checkbox" name="tags[]" value="{{$tag->id}}">{{$tag->tag}}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control" name="content" cols="30" rows="10" id="content">{{$post->content}}</textarea>
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            <button class="btn btn-success" type="submit">Update Post</button>
                        </div>
                    </div>
                </form>
         </div>
    </div>
@endsection
@section('styles')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
@endsection


@section('Scripts')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
 <script>
  $(document).ready(function() {
  $('#content').summernote();
});</script>   
@endsection