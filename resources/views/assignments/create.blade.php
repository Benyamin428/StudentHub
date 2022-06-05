@extends('layouts.app')

@section('content')
    <h2>Set Assignment</h2>
    {!! Form::open(['action' => 'AssignmentsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title:')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Body:')}}
            {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body'])}}
        </div>
        <div class="form-group">
            <p>Select what subject to set assignment:</p>

                <label class="checkbox-inline"><input type="checkbox" name="maths">Maths</label>
                <label class="checkbox-inline"><input type="checkbox" name="computer_science">Computer Science</label>
                <label class="checkbox-inline"><input type="checkbox" name="physics">Physics</label>
        </div>

        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}

@endsection