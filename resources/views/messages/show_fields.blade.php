<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $message->id }}</p>
</div>

<!-- From User Field -->
<div class="col-sm-12">
    {!! Form::label('from_user', 'From User:') !!}
    <p>{{ $message->from_user }}</p>
</div>

<!-- To User Field -->
<div class="col-sm-12">
    {!! Form::label('to_user', 'To User:') !!}
    <p>{{ $message->to_user }}</p>
</div>

<!-- Message Field -->
<div class="col-sm-12">
    {!! Form::label('message', 'Message:') !!}
    <p>{{ $message->message }}</p>
</div>

<!-- Is Read Field -->
<div class="col-sm-12">
    {!! Form::label('is_read', 'Is Read:') !!}
    <p>{{ $message->is_read }}</p>
</div>

