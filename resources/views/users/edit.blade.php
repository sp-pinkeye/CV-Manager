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

    <!-- How do we populate this automatically -->
        {!! Form::hidden('address.id', $user->address->id, array('class' => 'form-control')) !!}

        <div class="form-group">
        {!! Form::label('address1', 'Address 1') !!}
        {!! Form::text('address1', $user->address->address1, array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('address2', 'Address 2') !!}
        {!! Form::text('address2', $user->address->address2, array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('address3', 'Address 3') !!}
        {!! Form::text('address3', $user->address->address3, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('city', 'City') !!}
        {!! Form::text('city', $user->address->city, array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('state', 'State' ) !!}
        {!! Form::text('state', $user->address->state, array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('country', 'Country') !!}
        {!! Form::text('country', $user->address->country, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('postcode', 'Poctcode') !!}
        {!! Form::text('postcode', $user->address->postcode, array('class' => 'form-control')) !!}
    </div>

    {!! Form::submit('Update the User!', array('class' => 'btn btn-primary')) !!}

	{!! Form::close() !!}
    </div>

@endsection