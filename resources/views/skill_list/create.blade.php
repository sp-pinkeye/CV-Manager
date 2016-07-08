<!-- resources/views/skill_list/create.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">

		<h1>Create a Skill</h1>
      <!-- Display Validation Errors -->
      @include('common.errors')

	{!! Form::open(array('url' => 'skill_list')) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', Input::old('name'), array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('version', 'Version') !!}
        {!! Form::text('version', Input::old('version'), array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('experience', 'Experience') !!}
        {!! Form::selectRange('experience', 0, 30, array('class' => 'form-control')) !!}
    </div>

    {!! Form::submit('Create the Skill!', array('class' => 'btn btn-primary')) !!}

	{!! Form::close() !!}
    </div>

@endsection