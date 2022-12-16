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
                <div class="row">
                    <center> <h2>Scarica il<a href="{{ asset('upload/TEMPLATE-LAST.xlsx') }}"> “template da compilare”</a> in excel, compila in ogni sua parte per caricare le tue aziende nel
                        sistema. <br> Quando il file è pronto, torna su questa pagina e clicca su "Carica modello compilato"
                    </h2></center>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <center><a href="{{ asset('upload/TEMPLATE-LAST.xlsx') }}"><img src="{{ asset('image/signature/downloadpng.png') }}" width="90px" height="90px"></a></center>
                        <br><br>
                        <center><a class="btn" href="{{ asset('upload/TEMPLATE-LAST.xlsx') }}" style="background-color: #68150F; color: white; margin-top: 10px">Carica modello compilato</a></center>

                    </div>
                    <div class="col-md-6">
                        <center><img src="{{ asset('image/signature/uploadpng.png') }}" width="90px" height="90px"></center>
                        <br><br>
                        {!! Form::open(['route' => 'firms.upload' ,'files' => true]) !!}

                        <input name="file" type="file" id="actual-btn" hidden onchange="this.form.submit();">
                        
                        <center><label for="actual-btn">Carica modello compilato</label></center>
                        {!! Form::close() !!}
                    </div>
                </div>
                
                
            </div>

        </div>
    </div>

@endsection

