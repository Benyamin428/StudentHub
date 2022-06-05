@extends('layouts.app')

@section('content')
    <a href="../assignments" class="btn btn-default">Go Back</a>
    <h2>{{$assignment->title}}</h2>
    <br>
    <div>
        {!!$assignment->body!!}
    </div>
    <hr>
    <small>Set by {{$assignment->user->name}}</small>
    <hr>

    @if(!Auth::guest())
        @if(Auth::user()->id == $assignment->user_id)
    

            {!!Form::open(['action' => ['AssignmentsController@destroy', $assignment->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection