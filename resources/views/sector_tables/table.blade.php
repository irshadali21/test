<div class="table-responsive">
    <table class="table" id="sectorTables-table">
        <thead>
        <tr>
            <th>Name</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sectorTables as $sectorTable)
            <tr>
                <td>{{ $sectorTable->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['sectorTables.destroy', $sectorTable->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('sectorTables.show', [$sectorTable->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('sectorTables.edit', [$sectorTable->id]) }}"
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
