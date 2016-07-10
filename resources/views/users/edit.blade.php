<!-- resources/views/users/edit.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">

		<h1>Edit a User</h1>
      <!-- Display Validation Errors -->
      @include('common.errors')

	{!! Form::model($user->toArray(), array('route' => array('users.update', $user->id), 'method' => 'PUT')) !!}
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


    <div class="form-group">
        {!! Form::label('address1', 'Address 1') !!}
        {!! Form::text('address1', null, array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('address2', 'Address 2') !!}
        {!! Form::text('address2', null, array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('address3', 'Address 3') !!}
        {!! Form::text('address3', null, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('city', 'City') !!}
        {!! Form::text('city', null, array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('state', 'State' ) !!}
        {!! Form::text('state', null, array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('country', 'Country') !!}
        {!! Form::text('country', null, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('postcode', 'Poctcode') !!}
        {!! Form::text('postcode', null, array('class' => 'form-control')) !!}
    </div>

    {!! Form::submit('Update the User!', array('class' => 'btn btn-primary')) !!}

	{!! Form::close() !!}
    </div>

@endsection