<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:' , ['class' => 'form-control-label']) !!}
    <p>{{ $laVelinaCluster->name }}</p>
</div>

<!-- Companies Field -->
<div class="col-sm-12">
    {!! Form::label('companies', 'Companies:', ['class' => 'form-control-label']) !!}
    @foreach ($companies as $company)
    <p>{{ $company->company_name }} ( {{ $company->vat_number }} )</p>
    @endforeach
</div>

{{-- <!-- Filters Field -->
<div class="col-sm-12">
    {!! Form::label('filters', 'Filters:') !!}
    <p>{{ $laVelinaCluster->filters }}</p>
</div> --}}
