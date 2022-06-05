@extends('layouts.app')

@section('content')
    <h2>Edit Post</h2>
    <!-- The blog post form is loaded with all the user's blog entry data. This will allow the user to easily make edits and changes to their post -->
    {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title:')}}
            {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Body:')}}
            {{Form::textarea('body', $post->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body'])}}
        </div>
        <div class="form-group">
            {{Form::file('image')}}
        </div>
        {{Form::hidden('_method', 'PUT')}} <!-- As HTML forms don't support PUT, PATCH or DELETE, a secret method will need to be used to carry out any of those 3 methods -->
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}

@endsection