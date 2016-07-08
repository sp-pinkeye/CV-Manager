<!-- resources/views/jobs/create.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">

		<h1>Create a Job</h1>
      <!-- Display Validation Errors -->
      @include('common.errors')

	{!! Form::open(array('url' => 'jobs')) !!}

    <div class="form-group">
        {!! Form::label('company', 'Company') !!}
        {!! Form::text('company', Input::old('company'), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('order', 'Order') !!}
        {!! Form::text('order', Input::old('order'), array('class' => 'form-control')) !!}
    </div>
    
    <div class="form-group">
    	{!! Form::label('skills', 'Select Skills :') !!}        
      	@foreach($skills as $key=>$skill)
      		{!! Form::label('skills', $skill) !!}
      		{!! Form::checkbox('skills[]', $key ) !!}
      	@endforeach 
    </div>

    <div class="form-group">
        {!! Form::label('summary', 'Summary') !!}
        {!! Form::text('summary', Input::old('summary'), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Description') !!}
        {!! Form::textarea('description', Input::old('description'), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('start', 'Start Date') !!}
        {!! Form::date('start', Input::old('start'), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('end', 'End Date') !!}
        {!! Form::date('end', Input::old('end'), array('class' => 'form-control')) !!}
    </div>
    {!! Form::hidden('user_id',  Auth::user()->id , array('class' => 'form-control')) !!}

    {!! Form::submit('Create the Job!', array('class' => 'btn btn-primary')) !!}

	{!! Form::close() !!}
    </div>

@endsection