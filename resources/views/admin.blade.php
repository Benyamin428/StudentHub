@extends('layouts.app')

@section('content')

<!-- This code allows the admin to change the users' roles with a series of checkboxes -->

@foreach($users as $user) 
{!! Form::open(['action' => 'RolesController@postAdminAssignRoles', 'method' => 'POST']) !!}  <!-- Calls the function postAdminAssignRoles in RolesController -->

<table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Student</th>
                <th>Teacher</th>
                <th>Admin</th>
            </tr>
        </thead>

                <tbody>
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }} <input type="hidden" name="email" value="{{ $user->email }}"></td>
                    <!-- The current role of the user will be checked in the checkbox -->
                    <td><input type="checkbox" {{ $user->hasRole('User') ? 'checked' : ''}} name="role_user"></td> <!-- hasRole() is a function that is in the User model -->
                    <td><input type="checkbox" {{ $user->hasRole('Teacher') ? 'checked' : ''}} name="role_teacher"></td>
                    <td><input type="checkbox" {{ $user->hasRole('Admin') ? 'checked' : ''}} name="role_admin" disabled="disabled"></td>
                    <td>{{Form::submit('Assign Roles', ['class' => 'btn btn-primary'])}}</td>
                </tr>
                 </tbody>
</table>

{!! Form::close() !!}

@endforeach     
        
  
      
@endsection