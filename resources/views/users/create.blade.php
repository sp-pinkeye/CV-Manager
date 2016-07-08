<!-- resources/views/users/create.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">

		<h1>Create a User</h1>
      <!-- Display Validation Errors -->
      @include('common.errors')

	{!! Form::open(array('url' => 'users')) !!}

    <div class="form-group">
        {!! Form::label('firstname', 'First Name') !!}
        {!! Form::text('firstname', Input::old('firstname'), array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('lastname', 'Last Name') !!}
        {!! Form::text('lastname', Input::old('lastname'), array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('username', 'User Name') !!}
        {!! Form::text('username', Input::old('username'), array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password', 'Password') !!}
        {!! Form::text('password', Input::old('password'), array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'Email') !!}
        {!! Form::email('email', Input::old('email'), array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('telephone', 'Telephone') !!}
        {!! Form::text('telephone', Input::old('telephone'), array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('mobile', 'Mobile') !!}
        {!! Form::text('mobile', Input::old('mobile'), array('class' => 'form-control')) !!}
    </div>

    {!! Form::submit('Create the User!', array('class' => 'btn btn-primary')) !!}

	{!! Form::close() !!}
    </div>

@endsection