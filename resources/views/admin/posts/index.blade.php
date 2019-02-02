@extends('layouts.app')


@section('content')
     
     <div class="panel panel-default">
         <div class="panel-heading ">
            Posts
        </div>
         <div class="panel-body">
            <table class="table table-hover">
                 <head>
                     <th>
                         Image
                     </th>
                     <th>
                         Title
                     </th>
                     <th>
                         Category
                     </th>
                     <th>
                         Edit
                     </th>
                     <th>
                         Trash
                     </th>
                 </head>
                 <tbody>
                 @if($posts->count()>0)
                     @foreach($posts as $post)
                     <tr>
                         <td>
                             <img src="{{$post->featured}}" alt="{{$post->title}}" width="90px" height="50px">
                         </td>
                          <td>
                             {{$post->title}}
                         </td>
                           <td>
                             {{$post->category->name}}
                         </td>
                         <td>
                             <a href="{{route('post.edit',['id'=>$post->id])}}" class="btn btn-info btn-xs">
                                 Edit
                             </a>
                             
                         </td>
                        <td>
                             <a href="{{route('post.destroy',['id'=>$post->id])}}" class="btn btn-success btn-xs">
                                Trash
                             </a>

                         </td>
                     </tr>
                     @endforeach
                    @else
                        <tr>
                            <th colspan="5" class="text-center">No Published Posts</th>
                        </tr>
                    @endif
                 </tbody>
             </table>
         </div>
     </div>
     
     
@endsection