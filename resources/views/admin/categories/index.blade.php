@extends('layouts.app')


@section('content')
     
     <div class="panel panel-default">
        <div class="panel-heading">
            Categories
        </div>
         <div class="panel-body">
            <table class="table table-hover">
                 <head>
                     <th>
                         Category Name
                     </th>
                     <th>
                         Edit Category
                     </th>
                     <th>
                         Delete Category
                     </th>
                 </head>
                 <tbody>
                 @if($categories->count()>0)
                     @foreach($categories as $category)
                     <tr>
                         <td>
                             {{$category->name}}
                         </td>
                         <td>
                             <a href="{{route('category.edit',['id'=>$category->id])}}" class="btn btn-info btn-xs">
                                 Edit
                             </a>
                             
                         </td>
                        <td>
                             <a href="{{route('category.delete',['id'=>$category->id])}}" class="btn btn-danger btn-xs">
                                Delete
                             </a>

                         </td>
                     </tr>
                     @endforeach
                      @else
                        <tr>
                            <th colspan="5" class="text-center">No Categories</th>
                        </tr>
                    @endif
                 </tbody>
             </table>
         </div>
     </div>
     
     
@endsection