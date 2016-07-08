<!-- resources/views/jobs/show.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

	  	<div class="jumbotron text-left">
      	<h2  class="text-left">{{ $job->company }}</h2>
      	<table>
      		<tr>
				<th class="text-left">Order :</th>
				<td class="text-left">{{ $job->order }}</td>
      		</tr>
      		<tr>
				<th class="text-left">Summary :</th>
				<td class="text-left">{{ $job->summary }}</td>
      		</tr>
				<tr>
				<th class="text-left">Description :</th>
				<td class="text-left">{{ $job->description }}</td>
      		</tr>
      		<tr>
				<th class="text-left">Start Date :</th>
				<td class="text-left">{{ $job->start }}</td>
      		</tr>
      		<tr>
				<th class="text-left">End Date :</th>
				<td class="text-left">{{ $job->end }}</td>
      		</tr>
      		<tr>
				<th class="text-left">User :</th>
				<td class="text-left">{{ $job->users_id }}</td>
      		</tr>
      		<tr>
				<th class="text-left">Skill Set :</th>
				<td class="text-left">{{ $skillSet }}</td>
      		</tr>      		
      	</table>           	
    	</div>
    </div>

@endsection