<!-- Outputs an error message to the user if something didn't run as it should in the controller -->

@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif

@if(session('success')) <!-- A green message would be displayed if a process has been done successfully -->
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger"> <!-- A red message would be displayed if a process has been done unsuccessfully -->
        {{session('error')}}
    </div>
@endif
        