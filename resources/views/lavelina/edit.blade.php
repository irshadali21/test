@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit Test</h1>
                </div>
            </div>
        </div>
    </section>
    @php
    $count = 0;
@endphp
    <div class=" px-3">

        {{-- @include('adminlte-templates::common.errors') --}}

        <div class="card">
{{-- @dd($lavelina) --}}
            {!! Form::model($lavelina, ['route' => ['lavelina.update', $lavelina->id], 'method' => 'patch']) !!}

            <div class="card-body">
                {{-- <div class="row"> --}}
                    @include('lavelina.edit_fields')
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

@push('scripts')
@foreach ($body as $body_text)
@php
    $count++;
@endphp
@endforeach
<script>
    console.log({{ $count }});
@for ($i = 0; $i < $count; $i++)
   ckapplyeditor('body{{ $i+1 }}');
    
@endfor
</script>
@endpush
