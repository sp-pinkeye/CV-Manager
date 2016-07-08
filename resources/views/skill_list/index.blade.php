<!-- resources/views/skill_list/index.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')
 
    <!-- TODO: Current Users -->
    @if (count($skill_list) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Available Skills
            </div>

            <div class="panel-body">
                <table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Version</td>
            <td>Years Experience</td>
        </tr>
    </thead>
    <tbody>
    @foreach($skill_list as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->version }}</td>
            <td>{{ $value->experience }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>
                <!-- show the nerd (uses the show method found at GET /skill_list/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('skill_list/' . $value->id) }}">Show this Skill</a>

                <!-- edit this nerd (uses the edit method found at GET /skill_list/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('skill_list/' . $value->id . '/edit') }}">Edit this Skill</a>

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