<!-- resources/views/cvs/show.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

	  	<div class="jumbotron text-center">
      	<h2 class="text-left">{{ $cv->title }}</h2>
      	<table class="user">
				<tr>
				<th class="text-left">Name :</th>
				<td class="text-left name">{!! $cv->user->firstname !!} {!! $cv->user->lastname !!}</td>				
				</tr>      	
				<tr>
				<th class="text-left">Email :</th>
				<td class="text-left email">{!! $cv->user->email !!}</td>				
				</tr>      	
				<tr>
				<th class="text-left">Telephone :</th>
				<td class="text-left telephone">{!! $cv->user->telephone !!}</td>				
				</tr>      	
				<tr>
				<th class="text-left">Mobile :</th>
				<td class="text-left mobile">{!! $cv->user->mobile !!}</td>				
				</tr>      	
      	</table>
      	@foreach( $cv->jobs as $job )
			<table class="jobs">
			<tr>
			<td class="text-left company">{!! $job->company !!} : {!! $job->start !!} - {!! $job->end !!}</td>			</tr>
			<tr>
			<td class="text-left skillset">{!! $job->skillSet !!}</td>
			</tr>
			<tr>
			<td class="text-left summary">{!! $job->summary !!}</td>
			</tr>
			<tr>
			<td class="text-left description">{!! $job->description !!}</td>
			</tr>				
			</table>
      	@endforeach
    	</div>
    </div>

@endsection