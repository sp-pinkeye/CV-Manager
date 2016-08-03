<!-- resources/views/qualification/partial/edit.blade.php -->
    <h3>Qualifications</h3>

    @foreach( $qualifications as $key=>$qualification )
    <div class="qualification" id="qualification{!! $key  !!}">
        <h4>Qualification {!! $key+1 !!}</h4>
        <div class="form-group">
            {!! Form::label('level', 'Level') !!}
            {!! Form::text('qualification['.$key.'][level]', $qualification['level'], array('class' => 'form-control level')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('subject', 'Subject') !!}
            {!! Form::text('qualification['.$key.'][subject]', $qualification['subject'], array('class' => 'form-control subject')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('grade', 'Grade') !!}
            {!! Form::text('qualification['.$key.'][grade]', $qualification['grade'], array('class' => 'form-control grade')) !!}
        </div>
    </div>
    @endforeach
