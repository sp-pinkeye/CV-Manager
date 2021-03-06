<!-- resources/views/qualification/partial/form.blade.php -->
    <h3>Add Qualifications</h3>
    <div class="qualification">
        <h4>Qualification 1</h4>
        <div class="form-group">
            {!! Form::label('level', 'Level') !!}
            {!! Form::text('qualification[0][level]', null, array('class' => 'form-control level')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('subject', 'Subject') !!}
            {!! Form::text('qualification[0][subject]', null, array('class' => 'form-control subject')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('grade', 'Grade') !!}
            {!! Form::text('qualification[0][grade]', null, array('class' => 'form-control grade')) !!}
        </div>
    </div>
