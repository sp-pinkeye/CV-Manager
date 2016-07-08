<!-- resources/views/cvs/index.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')
 
    @if (count($cvs) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Available CV's
            </div>

            <div class="panel-body">
                <table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Title</td>
        </tr>
    </thead>
    <tbody>
    @foreach($cvs as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->title }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>
                <!-- show the nerd (uses the show method found at GET /cvs/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('cvs/' . $value->id) }}">Show this CV</a>

                <!-- edit this nerd (uses the edit method found at GET /cvs/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('cvs/' . $value->id . '/edit') }}">Edit this CV</a>

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