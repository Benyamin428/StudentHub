@extends('layouts.app')

@section('content')

{!! Form::open(['action' => 'SubjectController@postSubject', 'method' => 'POST']) !!}  <!-- postSubject is a function in the Subject Controller -->

<table class="table" style="overflow-x: auto; display:block;">
    <thead>
        <tr>
            <th>Maths</th>
            <th>Computer Science</th>
            <th>Physics</th>
        </tr>
    </thead>

            <input type="hidden" name="email" value="{{ $user->email }}">
            <td><input type="checkbox" {{ $user->hasSubject('Maths') ? 'checked' : ''}} name="maths"></td>
            <td><input type="checkbox" {{ $user->hasSubject('Computer Science') ? 'checked' : ''}} name="computer_science"></td> 
            <td><input type="checkbox" {{ $user->hasSubject('Physics') ? 'checked' : ''}} name="physics"></td>
            <td>{{Form::submit('Add Subjects', ['class' => 'btn btn-primary'])}}</td>

</table>

{!! Form::close() !!}

@endsection