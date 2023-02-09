@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('lang.All LaVelina') }}</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('lavelina.create') }}">
                        {{ __('lang.Valina Add New') }}
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class=" px-3">
        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('lavelina.table')

                <div class="card-footer clearfix">
                    <div class="float-right">
                        {{-- @include('adminlte-templates::common.paginate', ['records' => $tests]) --}}
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

