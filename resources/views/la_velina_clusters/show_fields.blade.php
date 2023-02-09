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
            <th>{{ __('lang.Action') }}</th>
            <th>{{ __('lang.Cluster Advisor Name') }}</th>
            <th>{{ __('lang.Cluster Firm Name') }}</th>
            <th>{{ __('lang.Cluster Vat NO') }}</th>
            <th>{{ __('lang.Cluster Province') }}</th>
            <th>{{ __('lang.Cluster Category') }}</th>
            <th>{{ __('lang.Cluster Phone number') }}</th>
            <th>{{ __('lang.Cluster Contact person') }}</th>
            <th>Email</th>
            <th>{{ __('lang.Cluster Sector') }}</th>
            <th>{{ __('lang.Ateco Code') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($companies as $firm)
            <tr>
                <td width="120">
                    <div class='btn-group'>
                        {!! Form::open(['route' => ['laVelinaClusters.deletefromcluster', $laVelinaCluster->id, $firm->id], 'method' => 'delete']) !!}
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        {!! Form::close() !!}

                    </div>
                </td>

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
