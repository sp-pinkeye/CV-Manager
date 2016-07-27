<!-- resources/views/education/edit.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">

        <h1>Edit Educational Establishment</h1>
        <!-- Display Validation Errors -->
        @include('common.errors')

        {!! Form::model($education->toArray(), array('route' => array('education.update', $education->id), 'method' => 'PUT')) !!}
        <div class="form-group">
            {!! Form::label('establishment', 'Educational Establishment') !!}
            {!! Form::text('establishment', null, array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('start', 'Start Date') !!}
            {!! Form::date('start',null, array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('end', 'End Date') !!}
            {!! Form::date('end',null, array('class' => 'form-control')) !!}
        </div>

        <!-- Here are the address fields -->
        @include('address.edit' )

        {!! Form::hidden('user_id',  Auth::user()->id , array('class' => 'form-control')) !!}


        {!! Form::submit('Update the Educational Establishment!', array('class' => 'btn btn-primary')) !!}

        {!! Form::close() !!}
    </div>

@endsection