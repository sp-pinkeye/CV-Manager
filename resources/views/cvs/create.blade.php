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
            {!! Form::label('introduction', 'Introduction') !!}
            {!! Form::textarea('introduction', Input::old('introduction'), array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
        <table class="jobSelector">
            <tr><th colspan="4">{!! Form::label('jobs', 'Jobs') !!}</th></tr>
            @foreach( $jobs as $job )
                <tr>
                    <td>{!! Form::label('jobIds', $job['company']) !!}</td>
                    <td>{!! Form::checkbox('jobIds[]', $job['id'], false) !!}</td>
                    <td>{!! Form::label('featureIds', 'Featured') !!}</td>
                    <td>{!! Form::checkbox('featureIds[]', $job['id'], false) !!}</td>
                </tr>
            @endforeach
        </table>
    </div>

    {!! Form::hidden('user_id',  Auth::user()->id , array('class' => 'form-control')) !!}

    {!! Form::submit('Create the CV!', array('class' => 'btn btn-primary')) !!}

	{!! Form::close() !!}
    </div>

@endsection