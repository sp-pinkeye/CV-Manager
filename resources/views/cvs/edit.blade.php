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
          <table class="jobSelector">
              <tr><th colspan="4">{!! Form::label('jobs', 'Jobs') !!}</th></tr>
          @foreach( $jobs as $job )
              <tr>
                  <td>{!! Form::label('jobIds', $job['company']) !!}</td>

                  <td>{!! Form::checkbox('jobIds[]', $job['id'], $job['selected'] ) !!}</td>
                  <td>{!! Form::label('featureIds', 'Featured') !!}</td>
                  <td>{!! Form::checkbox('featureIds[]', $job['id'], $job['featured'] ) !!}</td>
              </tr>
          @endforeach
          </table>
      </div>

    {!! Form::hidden('user_id',  Auth::user()->id , array('class' => 'form-control')) !!}


    {!! Form::submit('Update the CV!', array('class' => 'btn btn-primary')) !!}

	{!! Form::close() !!}
    </div>

@endsection