<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $laVelinaCluster->id }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $laVelinaCluster->name }}</p>
</div>

<!-- Companies Field -->
<div class="col-sm-12">
    {!! Form::label('companies', 'Companies:') !!}
    <p>{{ $laVelinaCluster->companies }}</p>
</div>

<!-- Filters Field -->
<div class="col-sm-12">
    {!! Form::label('filters', 'Filters:') !!}
    <p>{{ $laVelinaCluster->filters }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $laVelinaCluster->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $laVelinaCluster->updated_at }}</p>
</div>

