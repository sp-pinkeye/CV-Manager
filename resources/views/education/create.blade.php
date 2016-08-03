<!-- resources/views/education/create.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Create Education... -->

    <div class="panel-body">

        <h1>{{ Auth::user()->firstname }} create a new Educational Establishment Entry</h1>
        <!-- Display Validation Errors -->
        @include('common.errors')

        {!! Form::open(array('url' => 'education')) !!}

        <div class="form-group">
            {!! Form::label('establishment', 'Establishment') !!}
            {!! Form::text('establishment', Input::old('establishment'), array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('start', 'Start Date') !!}
            {!! Form::date('start', Input::old('start'), array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('end', 'End Date') !!}
            {!! Form::date('end', Input::old('end'), array('class' => 'form-control')) !!}
        </div>

        <!-- Here are the address fields -->
        @include('address.create' )

        @include('qualification.partial.form' )
        <div class="form-group">
            <a href="javascript:void(0);" id="add-qualification">Add another Qualification</a>
        </div>


        {!! Form::hidden('user_id',  Auth::user()->id , array('class' => 'form-control')) !!}

        {!! Form::submit('Create the Establishment!', array('class' => 'btn btn-primary')) !!}

        {!! Form::close() !!}
    </div>

        @section('postJquery')
            @parent
            jQuery(document).ready(function() {
                var qualificationCount = 1 ;
                $('#add-qualification').on('click',function(){
                    var block = jQuery(".qualification0").clone().insertAfter("div.qualification"+( qualificationCount - 1 ) +":last");
                    block.children("h4").text("Qualification"+qualificationCount) ;
                    block.find(".level").attr("name","qualification["+ qualificationCount + "][level]" );
                    block.find(".subject").attr("name","qualification["+qualificationCount+"][subject]" );
                    block.find(".grade").attr("name","qualification["+qualificationCount+"][grade]" );
                    qualificationCount++ ;
                });
            });

        @endsection

@endsection