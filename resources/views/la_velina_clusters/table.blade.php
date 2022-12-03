<br>
<div class="table-responsive">
    <table class="table datatable" id="laVelinaClusters-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Total Companies</th>
                <th >Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laVelinaClusters as $laVelinaCluster)
                <tr>
                    <td>{{ $laVelinaCluster->name }}</td>
                    <td>{{ count(json_decode($laVelinaCluster->companies)) }}</td>
                    {{-- <td width="120">
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
                </td> --}}

                    <td width="120">
                        <div class="btn-group ">
                            <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="true">Options</i></button>
                            <div class="dropdown-menu">
                                {{-- @can('view-file') --}}
                                <a class="dropdown-item"
                                    href="{{ route('laVelinaClusters.show', [$laVelinaCluster->id]) }}"><i
                                        class="far fa-eye"></i> Check Cluster</a>
                                
                                        <a class="dropdown-item"
                                    href="{{ route('laVelinaClusters.sendlavelina', [$laVelinaCluster->id]) }}"><i
                                        class="far fa-paper-plane"></i> Send LaVelina</a>
                                        <a class="dropdown-item"
                                    href="{{ route('laVelinaClusters.edit', [$laVelinaCluster->id]) }}"><i
                                        class="far fa-edit"></i> Edit Cluster</a>

                                        {!! Form::open(['route' => ['laVelinaClusters.destroy', $laVelinaCluster->id], 'method' => 'delete']) !!}
                                         {!! Form::button('<i class="far fa-trash-alt"></i> Delete Cluster', ['type' => 'submit', 'class' => 'dropdown-item', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                         {!! Form::close() !!}
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
