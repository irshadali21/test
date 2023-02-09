<div class="table-responsive">
    <table class="table datatable" id="firms-table">
        <thead style="background-color: #68150F; color:white">
            <tr>
                <th>{{ __('lang.Action') }}</th>
                <th>{{ __('lang.Cluster Advisor Name') }}</th>
                <th>{{ __('lang.Cluster Firm Name') }}</th>
                <th>{{ __('lang.Cluster Vat NO') }}</th>
                <th>{{ __('lang.Cluster Province') }}</th>
                <th>{{ __('lang.Cluster Category') }}</th>
                <th>{{ __('lang.Cluster Phone number') }}</th>
                <th>{{ __('lang.Cluster Contact person') }}</th>
                {{-- <th>Email</th> --}}
                <th>{{ __('lang.Ateco Code') }}</th>
                <th>Status</th>
                {{-- <th colspan="3">Action</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($firms as $firm)
                <tr>
                    <td width="120">

                            @if ($firm->deleted_at)
                            <center>


                            {!! Form::open(['route' => ['firms.restore', $firm->id]]) !!}
                            {!! Form::button('<i class="fa fa-recycle"></i>', [
                                'type' => 'submit',
                                'class' => 'btn btn-sm btn-outline-success',
                                'onclick' => "return confirm('Are you sure?')",
                            ]) !!}
                            {!! Form::close() !!}
                        </center>
                            @else
                            <div class='btn-group'>
                                <a href="{{ route('firms.show', [$firm->id]) }}" class='btn btn-default btn-sm'>
                                    <i class="fa fa-search"></i>
                                </a>
                                <a href="{{ route('firms.edit', [$firm->id]) }}" class='btn btn-default btn-sm'>
                                    <i class="far fa-edit"></i>
                                </a>

                                {!! Form::open(['route' => ['firms.delete', $firm->id]]) !!}
                                {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'onclick' => "return confirm('Are you sure?')",
                                ]) !!}
                                {!! Form::close() !!}
                            </div>
                            @endif


                    </td>

                    <td>{{ $firm->levlelina_advisor->name }}</td>
                    <td>{{ $firm->firm_name }}</td>
                    <td>{{ $firm->firm_vat_no }}</td>
                    {{-- <td>{{ $firm->firm_type }}</td> --}}
                    <td>{{ $firm->province->province }}</td>
                    <td>{{ $firm->category }}</td>
                    <td>{{ $firm->phone_number }}</td>
                    <td>{{ $firm->firm_owner }}</td>
                    {{-- <td>{{ $firm->email }}</td> --}}
                    {{-- <td>{{ $firm->email2 }}</td> --}}
                    <td>{{ $firm->ateco->code }}</td>
                    @if ($firm->deleted_at)
                        <td class="badge badge-pill badge-danger">{{ __('lang.Deleted') }}</td>
                    @else
                        <td class="badge badge-pill badge-success">{{ __('lang.Active') }}</td>
                    @endif
                    {{-- <td>{{ $firm->created_by }}</td> --}}
                    {{-- <td width="120">
                    {!! Form::open(['route' => ['firms.destroy', $firm->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('firms.show', [$firm->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('firms.edit', [$firm->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
