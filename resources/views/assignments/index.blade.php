@extends('layouts.app')

@section('content')
    <h2>Assignments</h2>
    @if(count($assignments) >= 1)
            @foreach($assignments as $assignment)
                <div class="well">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <h3><a href="assignments/{{$assignment->id}}">{{$assignment->title}}</a></h3>
                            <small>Set by {{$assignment->user->name}}</small>
                        </div>
                    </div>
                </div>
            @endforeach
            {{$assignments->links()}}
       
    @else
        <p>No Assignments found</p>
    @endif
@endsection