<!-- resources/views/education/create.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">

        <h1>{{ Auth::user()->firstname }} create a new Educational Establishment Entry</h1>
        <!-- Display Validation Errors -->
        @include('common.errors')

        {!! Form::open(array('url' => 'education')) !!}

        <div class="form-group">
            {!! Form::label('establishment', 'Establishment') !!}
            {!! Form::text('establishment', Input::old('establishment'), array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('start', 'Start Date') !!}
            {!! Form::date('start', Input::old('start'), array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('end', 'End Date') !!}
            {!! Form::date('end', Input::old('end'), array('class' => 'form-control')) !!}
        </div>

        <!-- Here are the address fields -->
        @include('address.create' )

        @include('qualification.create' )

        {!! Form::hidden('user_id',  Auth::user()->id , array('class' => 'form-control')) !!}

        {!! Form::submit('Create the Establishment!', array('class' => 'btn btn-primary')) !!}

        {!! Form::close() !!}
    </div>

@endsection