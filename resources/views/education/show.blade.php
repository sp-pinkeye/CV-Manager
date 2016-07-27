<!-- resources/views/education/show.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')


        <div class="jumbotron text-center">
            <h2>{{ $education->establishment }}</h2>
            <table class="education">
                <tr><th class="text-left"> From :</th><td class="text-left"> {{ $education->start->toFormattedDateString() }}</td></tr>
                <tr><th class="text-left"> To :</th><td class="text-left"> {{ $education->end->toFormattedDateString() }}</td></tr>
                <tr><th class="text-left"> Address :</th><td class="text-left"> @include('address.show',['address'=>$education->address] )</td></tr>

            </table>
        </div>
    </div>

@endsection