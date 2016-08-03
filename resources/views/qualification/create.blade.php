<!-- resources/views/qualification/create.blade.php -->
    <h3>Add Qualifications</h3>
    <div class="qualification">
        <h4>Qualification</h4>
        <div class="form-group">
            {!! Form::label('level', 'Level') !!}
            {!! Form::text('level[]', null, array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('subject', 'Subject') !!}
            {!! Form::text('subject[]', null, array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('grade', 'Grade') !!}
            {!! Form::text('grade[]', null, array('class' => 'form-control')) !!}
        </div>
    </div>
