<!-- resources/views/cvs/edit.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">

		<h1>Create a CV</h1>
      <!-- Display Validation Errors -->
      @include('common.errors')

	{!! Form::model($cv, array('route' => array('cvs.update', $cv->id), 'method' => 'PUT')) !!}
    <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', null, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('user_id', 'User') !!}
        {!! Form::text('user_id', null, array('class' => 'form-control')) !!}
    </div>

    {!! Form::submit('Update the CV!', array('class' => 'btn btn-primary')) !!}

	{!! Form::close() !!}
    </div>

@endsection