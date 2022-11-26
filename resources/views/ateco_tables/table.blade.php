<div class="table-responsive">
    <table class="table" id="atecoTables-table">
        <thead>
        <tr>
            <th>Code</th>
        <th>Name</th>
        <th>Description</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($atecoTables as $atecoTable)
            <tr>
                <td>{{ $atecoTable->code }}</td>
            <td>{{ $atecoTable->name }}</td>
            <td>{{ $atecoTable->description }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['atecoTables.destroy', $atecoTable->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('atecoTables.show', [$atecoTable->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('atecoTables.edit', [$atecoTable->id]) }}"
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
