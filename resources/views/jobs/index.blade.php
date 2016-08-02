<!-- resources/views/jobs/index.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')
 
    @if (count($jobs) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Jobs
            </div>

            <div class="panel-body">
                <table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Company</td>
            <td>Order</td>
            <td>Skill Set</td>
            <td>Summary</td>
            <td>Description</td>
            <td>Start</td>
            <td>End</td>
            <td>User</td>
        </tr>
    </thead>
    <tbody>
    @foreach($jobs as $key => $job)
        <tr>
            <td>{{ $job->id }}</td>
            <td>{{ $job->company }}</td>
            <td>{{ $job->order }}</td>
            <td>{!! Helpers::formatSkillSet( $job ) !!}</td>
            <td>{{ $job->summary }}</td>
            <td>{{ $job->description }}</td>
            <td>{{ $job->start }}</td>
            <td>{{ $job->end }}</td>
            <td>{{ $job->users_id }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>
                <!-- show the nerd (uses the show method found at GET /jobs/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('jobs/' . $job->id) }}">Show this Job</a>

                <!-- edit this nerd (uses the edit method found at GET /jobs/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('jobs/' . $job->id . '/edit') }}">Edit this Job</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
            </div>
        </div>
    @endif
	</div>

@endsection