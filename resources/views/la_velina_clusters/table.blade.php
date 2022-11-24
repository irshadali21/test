<div class="table-responsive">
    <table class="table" id="laVelinaClusters-table">
        <thead>
        <tr>
            <th>Name</th>
        <th>Companies</th>
        <th>Filters</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($laVelinaClusters as $laVelinaCluster)
            <tr>
                <td>{{ $laVelinaCluster->name }}</td>
            <td>{{ $laVelinaCluster->companies }}</td>
            <td>{{ $laVelinaCluster->filters }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['laVelinaClusters.destroy', $laVelinaCluster->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('laVelinaClusters.show', [$laVelinaCluster->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('laVelinaClusters.edit', [$laVelinaCluster->id]) }}"
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
