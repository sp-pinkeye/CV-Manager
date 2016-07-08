<!-- resources/views/cvs/create.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">

		<h1>{{ Auth::user()->firstname }} create a new CV</h1>
      <!-- Display Validation Errors -->
      @include('common.errors')

	{!! Form::open(array('url' => 'cvs')) !!}

    <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', Input::old('title'), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('jobs', 'Jobs') !!}
{!! Form::select('jobs[]', $jobs, null, ['id' => 'jobs', 'multiple' => 'multiple']) !!}
    </div>

    {!! Form::hidden('user_id',  Auth::user()->id , array('class' => 'form-control')) !!}

    {!! Form::submit('Create the CV!', array('class' => 'btn btn-primary')) !!}

	{!! Form::close() !!}
    </div>

@endsection