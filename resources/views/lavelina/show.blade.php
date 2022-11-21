@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>La Velina Details</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-secondary float-right"
                       href="{{ route('lavelina.index') }}">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class=" px-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('lavelina.show_fields')
                </div>
            </div>
        </div>
    </div>
@endsection
