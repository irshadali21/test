@extends('layouts.app')
@push('styles')
    <style>
        label {
  background-color: #68150F;;
  color: white;
  padding: 0.5rem;
  font-family: sans-serif;
  border-radius: 0.3rem;
  cursor: pointer;
  margin-top: 1rem;
}
    </style>

@endpush
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Import Firms</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body ">

                    <center> <h1><a href="{{ asset('upload/TEMPLATE-LAST.xlsx') }}">Scarica il template</a> in excel, compilare in sua parte per caricare le tue aziende nel sistema. Quando il file e pronto torna su questa pagina e clicca su "Carica modello compilato" </h1></center>
                
                <center><a href="{{ asset('upload/TEMPLATE-LAST.xlsx') }}"><i class="fa fa-file-excel-o fa-6" aria-hidden="true" style="font-size: 100px; color:black"></i></a></center>
                <br><br>
                {!! Form::open(['route' => 'firms.upload' ,'files' => true]) !!}

                <input name="file" type="file" id="actual-btn" hidden onchange="this.form.submit();">
                
                <center><label for="actual-btn">Carica modello compilato</label></center>
                {!! Form::close() !!}
            </div>

        </div>
    </div>

@endsection

