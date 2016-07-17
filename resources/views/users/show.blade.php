<!-- resources/views/users/edit.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

		<h1>Showing {{ $user->firstname.' '.$user->lastname }}</h1>

	  	<div class="jumbotron text-center">
    	  		<table>
					<tr><th colspan="2">{{ $user->firstname.' '.$user->lastname }}</th></tr>
					<tr><th>Email:</th><td>{{ $user->email }}</td></tr>
					<tr><th>Telephone:</th><td>{{ $user->telephone }}</td></tr>
					<tr><th>Mobile:</th><td>{{ $user->mobile }}</td></tr>
					<tr><th>Address1:</th><td>{{ $user->address->address1 }}</td></tr>
					<tr><th>Address 2:</th><td>{{ $user->address->address2 }}</td></tr>
					<tr><th>Address3:</th><td>{{ $user->address->address3 }}</td></tr>
					<tr><th>City:</th><td>{{ $user->address->city }}</td></tr>
					<tr><th>County:</th><td>{{ $user->address->state }}</td></tr>
					<tr><th>Postcode:</th><td>{{ $user->address->postcode }}</td></tr>
					<tr><th>Country:</th><td>{{ $user->address->country }}</td></tr>
				</table>
    	</div>
    </div>

@endsection