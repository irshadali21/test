@extends('layouts.app')


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Create Test</h1>
                </div>
            </div>
        </div>
    </section>
    
    <div class=" px-3">

        {{-- @include('adminlte-templates::common.errors') --}}

        <div class="card">

            {!! Form::open(['route' => 'lavelina.store']) !!}

            <div class="card-body">

                    @include('lavelina.fields')
                {{-- </div> --}}

            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('lavelina.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
    @include('includes.ckeditor')
@endsection


