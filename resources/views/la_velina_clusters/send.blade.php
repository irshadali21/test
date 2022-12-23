@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Send La Velina</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'laVelinaClusters.send']) !!}

            <div class="card-body">

                <div class="row">

                    <!-- Name Field -->
                    <div class="form-group col-sm-12">
                        <div class="form-group ">
                            {!! Form::label('lavelina_id', 'Select Lavelina:' , ['class' => 'form-control-label']) !!}

                            <input type="hidden" name="cluster_id" value="{{ $laVelinaCluster->id }}">
                            <select name="lavelina_id" id="lavelina_id" class= 'form-control select2'>
                                @foreach ($lavelina as $valina)
                                <option value="{{ $valina->id }}">Name >> ({{ $valina->name }}) Creation Date >> ({{ \Carbon\Carbon::parse($valina->created_at)->format('d/m/Y H:i:s')}})</option>
                                @endforeach
                                </select>
                        </div>
                    </div>

                </div>

            </div>
            <div class="card-footer">
                {!! Form::submit('Send', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('laVelinaClusters.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection


@push('scripts')
    <script>
        jQuery(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>
@endpush
