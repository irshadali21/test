<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:' , ['class' => 'form-control-label']) !!}
    <p>{{ $laVelinaCluster->name }}</p>
</div>

<!-- Companies Field -->
{{-- <div class="col-sm-12">
    {!! Form::label('companies', 'Companies:', ['class' => 'form-control-label']) !!}
    @foreach ($companies as $company)
    <p>{{ $company->firm_name }} ( {{ $company->firm_vat_no }} )</p>
    @endforeach
</div> --}}
<br><br><br>
<div class="table-responsive">
    <table class="table" id="firms-table">
        <thead>
        <tr>
            <th>Advisor Name</th>
            <th>Firm Name</th>
            <th>Vat No</th>
            <th>Province</th>
            <th>Category</th>
            <th>Phone Number</th>
            <th>Contact Person</th>
            <th>Email</th>
            <th>Sector </th>
            <th>Ateco </th>
        </tr>
        </thead>
        <tbody>
        @foreach($companies as $firm)
            <tr>
            <td>{{ $firm->levlelina_advisor->name }}</td>
            <td>{{ $firm->firm_name }}</td>
            <td>{{ $firm->firm_vat_no }}</td>
            <td>{{ $firm->province->province }}</td>
            <td>{{ $firm->category }}</td>
            <td>{{ $firm->phone_number }}</td>
            <td>{{ $firm->firm_owner }}</td>
            <td>{{ $firm->email }}</td>
            <td>{{ $firm->sector->name }}</td>
            <td>{{ $firm->ateco->code }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>