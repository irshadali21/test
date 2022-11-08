<div class="table-responsive">
    <table class="table" id="tests-table">
        <thead>
        <tr>
            <th>Name</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tests as $test)
            <tr>
                <td>{{ $test->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['levelina.destroy', $test->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('levelina.show', [$test->id]) }}"
                           class='btn btn-default btn-sm'>
                           <i data-feather='eye'></i>
                        </a>
                        <a href="{{ route('levelina.edit', [$test->id]) }}"
                           class='btn btn-default btn-sm'>
                           <i data-feather='edit'></i>
                        </a>
                        {!! Form::button('<i data-feather="trash-2"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
