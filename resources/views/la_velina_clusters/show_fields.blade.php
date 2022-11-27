<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:' , ['class' => 'form-control-label']) !!}
    <p>{{ $laVelinaCluster->name }}</p>
</div>

<!-- Companies Field -->
<div class="col-sm-12">
    {!! Form::label('companies', 'Companies:', ['class' => 'form-control-label']) !!}
    @foreach ($companies as $company)
    <p>{{ $company->firm_name }} ( {{ $company->firm_vat_no }} )</p>
    @endforeach
</div>

{{-- <!-- Filters Field -->
<div class="col-sm-12">
    {!! Form::label('filters', 'Filters:') !!}
    <p>{{ $laVelinaCluster->filters }}</p>
</div> --}}
