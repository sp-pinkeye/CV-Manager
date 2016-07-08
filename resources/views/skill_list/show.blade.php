<!-- resources/views/skill_list/show.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')


	  	<div class="jumbotron text-center">
      	<h2 class="text-left">{{ $skill_list->name }}</h2>
			<table>
			<tr><th class="text-left"> Version :</th><td class="text-left"> {{ $skill_list->version }}</td></tr>
			<tr><th class="text-left"> Experience :</th><td class="text-left"> {{ $skill_list->experience }} years</td></tr>
			</table>     
    	</div>
    </div>

@endsection