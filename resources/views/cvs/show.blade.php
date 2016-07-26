<!-- resources/views/cvs/show.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

	  	<div class="jumbotron text-center">
      	<h2 class="">{{ $cv->title }}</h2>
      	<table class="user">
				<tr>
				<th class="">Name :</th>
				<td class=" name">{!! $cv->user->firstname !!} {!! $cv->user->lastname !!}</td>				
				</tr>      	
				<tr>
				<th class="">Email :</th>
				<td class=" email">{!! $cv->user->email !!}</td>				
				</tr>      	
				<tr>
				<th class="">Telephone :</th>
				<td class=" telephone">{!! $cv->user->telephone !!}</td>				
				</tr>
			<tr>
				<th class="">Mobile :</th>
				<td class=" mobile">{!! $cv->user->mobile !!}</td>
			</tr>
			<tr>
				<th class="">Address :</th>

				<td class=" mobile">
					{!! $cv->user->address->address1 !!}<br />
					{!! $cv->user->address->address2 !!}<br />
					{!! $cv->user->address->address3 !!}<br />
					{!! $cv->user->address->city !!}<br />
					{!! $cv->user->address->state !!}<br />
					{!! $cv->user->address->postcode !!}<br />
					{!! $cv->user->address->country !!}
				</td>
			</tr>
      	</table>

		<div class="introduction">
			<h2>Introduction</h2>
			{!! $cv->introduction !!}
		</div>

			<div class="skillList">
				<h2>Skill List</h2>
				<table class="skills">
					<tr>
						<th>Name</th>
						<th>Version</th>
						<th>Years Experience</th>
					</tr>

					@foreach( $skill_list as $skill )
					<tr>
						<td>{!! $skill->name  !!}</td>
						<td>{!! $skill->version  !!}</td>
						<td>{!! $skill->experience  !!}</td>
					</tr>
					@endforeach
				</table>
			</div>

			<h2>Employment History</h2>

      	@foreach( $jobs as $job )
			<table class="jobs">
			<tr>
			<td class="company">{!! $job->company !!} : {!! $job->start->toFormattedDateString() !!} - {!! $job->end->toFormattedDateString() !!}</td>			</tr>
			<tr>
			<td class="skillset">{!! $job->skillSet !!}</td>
			</tr>
			@if( $job->pivot->featured )
			<tr>
			<td class="summary">{!! $job->summary !!}</td>
			</tr>
			<tr>
			<td class="description">{!! $job->description !!}</td>
			</tr>@endif
			</table>
      	@endforeach
    	</div>
    </div>

@endsection