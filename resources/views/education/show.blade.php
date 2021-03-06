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
                @if( $education->address )
                <tr><th class="text-left"> Address :</th><td class="text-left"> @include('address.partial.show',['address'=>$education->address] )</td></tr>
                @endif
                @if( $education->qualifications )
                    <tr><th class="text-left"> Qualifications :</th><td class="text-left"> @include('qualification.partial.show' )</td></tr>
                @endif
            </table>
        </div>
    </div>

@endsection