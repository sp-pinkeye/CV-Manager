<!-- resources/views/qualification/create.blade.php -->
<h3>Qualifications</h3>
<div class="form-group">
    {!! Form::label('level', 'Level') !!}
    {!! Form::date('level', Input::old('leveL'), array('class' => 'form-control')) !!}
</div>

<div class="form-group">
    {!! Form::label('subject', 'Subject') !!}
    {!! Form::date('subject', Input::old('subject'), array('class' => 'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('grade', 'Grade') !!}
    {!! Form::date('grade', Input::old('grade'), array('class' => 'form-control')) !!}
</div>

