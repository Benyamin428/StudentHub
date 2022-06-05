@extends('layouts.app')

@section('content')

    <!-- This is the main page users will be directed to when they access the website -->

        <div class="jumbotron">
            <h1>Welcome to the hub</h1>
            <script src="https://wordsmith.org/words/quote2.js" type="text/javascript"></script> <!-- Retrieves data from another website to provide a daily quote -->
            <br><br/>
            @if (Auth::guest())
                <p><a class="btn btn-purple btn-primary btn-lg" href="login" role="button">Login</a> <a class="btn btn-blue btn-success btn-lg" href="register" role="button">Register</a></p>
            @endif
        </div>
        <h3>Latest Posts</h3>

        <!-- Displays latest blog posts on the homepage -->

        <div class="posts">
            @if(count($posts) >= 1)
                @foreach($posts as $post)
                    <div class="col-md-4 col-sm-4">
                        <div class="post">
                            <h3><a href="posts/{{$post->id}}">{{$post->title}}</a></h3>
                            <small>Posted on {{$post->created_at}} by {{$post->user->name}}</small>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No posts found</p>
            @endif
        </div>
@endsection
