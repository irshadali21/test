<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $provinceTable->id }}</p>
</div>

<!-- Province Field -->
<div class="col-sm-12">
    {!! Form::label('province', 'Province:') !!}
    <p>{{ $provinceTable->province }}</p>
</div>

<!-- Region Field -->
<div class="col-sm-12">
    {!! Form::label('region', 'Region:') !!}
    <p>{{ $provinceTable->region }}</p>
</div>

<!-- Area Field -->
<div class="col-sm-12">
    {!! Form::label('area', 'Area:') !!}
    <p>{{ $provinceTable->area }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $provinceTable->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $provinceTable->updated_at }}</p>
</div>

