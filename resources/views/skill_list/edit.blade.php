<!-- resources/views/skill_list/edit.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">

		<h1>Update a Skill</h1>
      <!-- Display Validation Errors -->
      @include('common.errors')

	{!! Form::model($skill_list, array('route' => array('skill_list.update', $skill_list->id), 'method' => 'PUT')) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('version', 'Version') !!}
        {!! Form::text('version', null, array('class' => 'form-control')) !!}
    </div>
	
    {!! Form::submit('Update the Skill!', array('class' => 'btn btn-primary')) !!}

	{!! Form::close() !!}
    </div>

@endsection