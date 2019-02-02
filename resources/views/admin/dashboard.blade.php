@extends('layouts.app')

@section('content')

            <div class="col-md-3">
                <div class="panel panel-info ">
                    <div class="panel-heading text-center">
                        POSTS
                    </div>
                    <div class="panel-body text-center">
                        <h1>{{$post_count}}</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-danger ">
                    <div class="panel-heading text-center">
                        TRASHED POSTS
                    </div>
                    <div class="panel-body text-center">
                        <h1>{{$trashed_count}}</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-success ">
                    <div class="panel-heading text-center">
                        USERS
                    </div>
                    <div class="panel-body text-center">
                        <h1>{{$users_count}}</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-warning">
                    <div class="panel-heading text-center">
                        CATEGORIES
                    </div>
                    <div class="panel-body text-center">
                        <h1>{{$categories_count}}</h1>
                    </div>
                </div>
            </div>


@endsection
