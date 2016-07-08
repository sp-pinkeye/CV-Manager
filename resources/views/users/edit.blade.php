<!-- resources/views/users/edit.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">

		<h1>Edit a User</h1>
      <!-- Display Validation Errors -->
      @include('common.errors')

	{!! Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) !!}
    <div class="form-group">
        {!! Form::label('firstname', 'First Name') !!}
        {!! Form::text('firstname', null, array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('lastname', 'Last Name') !!}
        {!! Form::text('lastname', null, array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('name', 'User Name') !!}
        {!! Form::text('name', null, array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'Email') !!}
        {!! Form::email('email', null, array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('telephone', 'Telephone') !!}
        {!! Form::text('telephone', null, array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('mobile', 'Mobile') !!}
        {!! Form::text('mobile', null, array('class' => 'form-control')) !!}
    </div>

    {!! Form::submit('Update the User!', array('class' => 'btn btn-primary')) !!}

	{!! Form::close() !!}
    </div>

@endsection