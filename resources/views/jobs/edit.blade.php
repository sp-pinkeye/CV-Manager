<!-- resources/views/jobs/edit.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">

		<h1>Update a Job</h1>
      <!-- Display Validation Errors -->
      @include('common.errors')

	{!! Form::model($job, array('route' => array('jobs.update', $job->id), 'method' => 'PUT')) !!}

    <div class="form-group">
        {!! Form::label('company', 'Company') !!}
        {!! Form::text('company', null, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('order', 'Order') !!}
        {!! Form::text('order', null, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        	{!! Form::label('skills', 'Select Skills :') !!}        
      	@foreach($skills as $key=>$skill)
      		{!! Form::label('skills', $skill) !!}
      		<?php if( in_array( $key, $selected )) :?>
      		{!! Form::checkbox('skills[]', $key, true ) !!}
      		<?php else: ?>
      		{!! Form::checkbox('skills[]', $key, false ) !!}
      		<?php endif ; ?>
      	@endforeach 
    </div>

    <div class="form-group">
        {!! Form::label('summary', 'Summary') !!}
        {!! Form::text('summary', null, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Description') !!}
        {!! Form::textarea('description', null, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('start', 'Start Date') !!}
        {!! Form::date('start', null, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('end', 'End Date') !!}
        {!! Form::date('end', null, array('class' => 'form-control')) !!}
    </div>
    
    {!! Form::hidden('user_id',  Auth::user()->id , array('class' => 'form-control')) !!}

    {!! Form::submit('Updated the Job!', array('class' => 'btn btn-primary')) !!}

	{!! Form::close() !!}
    </div>

@endsection