<!-- resources/views/education/edit.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">

        <h1>Edit Educational Establishment</h1>
        <!-- Display Validation Errors -->
        @include('common.errors')

        {!! Form::model($education->toArray(), array('route' => array('education.update', $education->id), 'method' => 'PUT')) !!}
        <div class="form-group">
            {!! Form::label('establishment', 'Educational Establishment') !!}
            {!! Form::text('establishment', null, array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('start', 'Start Date') !!}
            {!! Form::date('start',null, array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('end', 'End Date') !!}
            {!! Form::date('end',null, array('class' => 'form-control')) !!}
        </div>

        <!-- Here are the address fields -->
        @include('address.partial.edit' )

        @include('qualification.partial.edit', ['qualifications'=>$education->qualifications] )
        <div class="form-group">
            <a href="javascript:void(0);" id="add-qualification">Add another Qualification</a>
        </div>


        {!! Form::hidden('user_id',  Auth::user()->id , array('class' => 'form-control')) !!}

        {!! Form::submit('Update the Educational Establishment!', array('class' => 'btn btn-primary')) !!}

        {!! Form::close() !!}
    </div>
@section('postJquery')
    @parent
    jQuery(document).ready(function() {

    var cloneIndex = $(".qualification").length ;
    $('#add-qualification').on('click',function(){
    var block = jQuery("#qualification0").clone()
    .attr("id", "qualification"+cloneIndex)
    .insertAfter("div.qualification:last");

    block.children("h4").text("Qualification"+(cloneIndex+1)) ;
    block.find(".level").attr("name","qualification["+ cloneIndex + "][level]" );
    block.find(".subject").attr("name","qualification["+cloneIndex+"][subject]" );
    block.find(".grade").attr("name","qualification["+cloneIndex+"][grade]" );
    });
    });

@endsection

@endsection