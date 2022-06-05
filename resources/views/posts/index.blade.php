@extends('layouts.app')

@section('content')

<!-- Every blog post is here. Users can click on the blog post to view it in more detail -->

    <h2>Posts</h2>
    @if(count($posts) >= 1)
        @foreach($posts as $post)
            <div class="well">
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                    <img style="width: 100%" src="storage/images/{{$post->image}}">
                    </div>
                    <div class="col-md-9 col-sm-9">
                        <h3><a href="posts/{{$post->id}}">{{$post->title}}</a></h3>
                        <small>Posted on {{$post->created_at}} by {{$post->user->name}}</small>
                    </div>
                </div>
            </div>
        @endforeach
        {{$posts->links()}}
    @else
        <p>No posts found</p>
    @endif
@endsection