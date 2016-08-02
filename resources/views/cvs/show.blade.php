<!-- resources/views/cvs/show.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

		<div class="pageTitle"><h2>{{ $cv->title }}</h2></div>

		<div class="personal">
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
					@include('address.show',['address'=> $cv->user->address] )
				</td>
				</tr>
      		</table>
		</div>

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

		<div class="employment">
			<h2>Employment History</h2>
      		@foreach( $cv->jobs as $job )
			<div class="jobs">
				<div class="company">{!! $job->company !!} : {!! $job->start->toFormattedDateString() !!} - {!! $job->end->toFormattedDateString() !!}</div>
				<div class="skillset">{!! Helpers::formatSkillSet( $job ) !!}</div>
				@if( $job->pivot->featured )
					<div class="summary">{!! $job->summary !!}</div>
					<div class="description">{!! $job->description !!}</div>
				@endif
			</div>
      		@endforeach
		</div>

    </div>

@endsection