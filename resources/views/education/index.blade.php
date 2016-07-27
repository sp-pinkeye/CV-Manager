<!-- resources/views/education/index.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Educational Establishments</h2>
                </div>

                <div class="panel-body">
                    @if (count($education) > 0)
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>Establishment</td>
                            <td>Qualifications</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($education as $key => $value)
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->establishment }}

                                </td>

                                <td>
                                    <a class="btn btn-small btn-success" href="{{ URL::to('education/' . $value->id) }}">Show this Educational Establishment</a>
                                    <a class="btn btn-small btn-info" href="{{ URL::to('education/' . $value->id . '/edit') }}">Edit this Educational Establishment</a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
                </div>
            </div>
    </div>

@endsection