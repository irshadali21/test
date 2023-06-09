<div class="table-responsive">
    <table class="table datatable" id="tests-table">
        <thead>
        <tr>
            <th> {{ __('lang.Valina Name') }}</th>
            <th>{{ __('lang.Valina Creation date') }}</th>
            <th>{{ __('lang.Valina Title') }}</th>
            <th colspan="3">{{ __('lang.Action') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tests as $test)
        {{-- @dd() --}}
            <tr>
                <td>{{ $test->name }}</td>
                <td>{{\Carbon\Carbon::parse($test->created_at)->format('d/m/Y H:i:s')  }}</td>
                <td>{{ $test->title }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['lavelina.destroy', $test->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('lavelina.show', [$test->id]) }}"
                           class='btn btn-default btn-sm'>
                           <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                        <a href="{{ route('lavelina.edit', [$test->id]) }}"
                           class='btn btn-default btn-sm'>
                           <i class="fa fa-edit" aria-hidden="true"></i>
                        </a>
                        {!! Form::button('<i class="fas fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
