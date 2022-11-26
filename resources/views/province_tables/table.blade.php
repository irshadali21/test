<div class="table-responsive">
    <table class="table" id="provinceTables-table">
        <thead>
        <tr>
            <th>Province</th>
        <th>Region</th>
        <th>Area</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($provinceTables as $provinceTable)
            <tr>
                <td>{{ $provinceTable->province }}</td>
            <td>{{ $provinceTable->region }}</td>
            <td>{{ $provinceTable->area }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['provinceTables.destroy', $provinceTable->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('provinceTables.show', [$provinceTable->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('provinceTables.edit', [$provinceTable->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
