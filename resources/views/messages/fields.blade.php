<!-- From User Field -->
<div class="form-group col-sm-6">
    {!! Form::label('from_user', 'From User:') !!}
    {!! Form::text('from_user', null, ['class' => 'form-control']) !!}
</div>

<!-- To User Field -->
<div class="form-group col-sm-6">
    {!! Form::label('to_user', 'To User:') !!}
    {!! Form::text('to_user', null, ['class' => 'form-control']) !!}
</div>

<!-- Message Field -->
<div class="form-group col-sm-6">
    {!! Form::label('message', 'Message:') !!}
    {!! Form::text('message', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Read Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_read', 'Is Read:') !!}
    {!! Form::text('is_read', null, ['class' => 'form-control']) !!}
</div>