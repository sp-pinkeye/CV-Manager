<!-- resources/views/users/edit.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

		<h1>Showing {{ $user->firstname.' '.$user->lastname }}</h1>

	  	<div class="jumbotron text-center">
      	<h1>{{ $user->firstname.' '.$user->lastname }}</h2>
      	<p>
           	<strong>Email:</strong> {{ $user->email }}<br>
           	<strong>Telephone:</strong> {{ $user->telephone }}<br>
           	<strong>Mobile:</strong> {{ $user->mobile }}
        	</p>
    	</div>
    </div>

@endsection