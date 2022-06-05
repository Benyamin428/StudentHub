@extends('layouts.app')

@section('content')

    <!-- Purpose of this code is to allow users to view the full blog post -->

    <a href="../posts" class="btn btn-default">Go Back</a>
    <h2>{{$post->title}}</h2>
    <img src="../storage/images/{{$post->image}}" class="img-responsive">
    <br><br>
    <div>
        {!!$post->body!!}
    </div>
    <hr>
    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
    <hr>

    @if(!Auth::guest()) <!-- If the user viewing this page is the user that created the blog post, they will be allowed to edit or delete their blog -->
        @if(Auth::user()->id == $post->user_id)
    
            <a href="{{$post->id}}/edit" class="btn btn-default">Edit</a>

            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection