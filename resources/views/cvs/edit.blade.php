<!-- resources/views/cvs/edit.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">

		<h1>Edit CV</h1>
      <!-- Display Validation Errors -->
      @include('common.errors')

	{!! Form::model($cv, array('route' => array('cvs.update', $cv->id), 'method' => 'PUT')) !!}
    <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', null, array('class' => 'form-control')) !!}
    </div>

      <div class="form-group">
        {!! Form::label('jobs', 'Jobs') !!}
			{!! Form::select('jobs[]', $jobs, $selected, ['id' => 'jobs', 'multiple' => 'multiple']) !!}
    </div>

    {!! Form::hidden('user_id',  Auth::user()->id , array('class' => 'form-control')) !!}


    {!! Form::submit('Update the CV!', array('class' => 'btn btn-primary')) !!}

	{!! Form::close() !!}
    </div>

@endsection