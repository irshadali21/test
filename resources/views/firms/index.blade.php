@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Firms</h1>
                </div>
                {{-- <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('firms.create') }}">
                        Add New
                    </a>
                </div> --}}
            </div>
        </div>
    </section>

    <div class="content px-3">
        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                <br>
                <div>
                    @include('firms.table')
                </div>

                {{-- <div class="card-footer clearfix">
                    <div class="float-right">
                        @include('adminlte-templates::common.paginate', ['records' => $firms])
                    </div>
                </div> --}}
            </div>

        </div>
    </div>
@endsection

@push('scripts')
<script>
    $('.datatable').DataTable({
                language: {
                    lengthMenu: '{{ __("lang.lengthMenu") }}',
                    zeroRecords: '{{ __("lang.zeroRecords") }}',
                    info: '{{ __("lang.info") }}',
                    infoEmpty: '{{ __("lang.infoEmpty") }}',
                    infoFiltered: '{{ __("lang.infoFiltered") }}',
                },
            });

</script>
@endpush
