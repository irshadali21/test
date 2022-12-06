<div class="table-responsive">
    <table class="table datatable" id="firms-table">
        <thead style="background-color: #68150F; color:white">
        <tr>
            <th>Action</th>
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
            {{-- <th colspan="3">Action</th> --}}
        </tr>
        </thead>
        <tbody>
        @foreach($firms as $firm)
            <tr>
            <td><a href="{{ route('firms.show', [$firm->id]) }}"
                class='btn btn-default btn-xs'>
                 <i class="fa fa-search"></i>
             </a>
            </td>
            <td>{{ $firm->levlelina_advisor->name }}</td>
            <td>{{ $firm->firm_name }}</td>
            <td>{{ $firm->firm_vat_no }}</td>
            {{-- <td>{{ $firm->firm_type }}</td> --}}
            <td>{{ $firm->province->province }}</td>
            <td>{{ $firm->category }}</td>
            <td>{{ $firm->phone_number }}</td>
            <td>{{ $firm->firm_owner }}</td>
            <td>{{ $firm->email }}</td>
            {{-- <td>{{ $firm->email2 }}</td> --}}
            <td>{{ $firm->sector->name }}</td>
            <td>{{ $firm->ateco->code }}</td>
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
