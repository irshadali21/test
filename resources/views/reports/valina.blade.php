@extends('layouts.app')

@section('content')
    <!-- ================== -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-header">
                    <h3>Generate new Report for Valina</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('getreport.valina') }}" accept-charset="UTF-8">
                        @csrf
                        <div class="row">
                            {{-- <div class="col-lg-3">
                                <div class="form-group">
                                    {{ Form::label('valina_name', 'Valina Name', ['class' => 'form-control-label']) }}
                                    {{ Form::text('valina_name', null, ['class' => 'form-control']) }}
                                </div>
                            </div> --}}
                            <div class="col-lg-3">
                                <div class="form-group">
                                    {{ Form::label('lavelina', 'lavelina ', ['class' => 'form-control-label']) }}
                                    <select name="lavelina" id="lavelina" class="form-control select2">
                                        <option value="" selected disabled>Select lavelina ...</option>
                                        @foreach ($lavelina as $lavelina)
                                            <option value="{{ $lavelina->id }}">{{ $lavelina->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- <div class="col-lg-3">
                                <div class="form-group">
                                    {{ Form::label('inc_send_date', 'Incarico Send Date', ['class' => 'form-control-label']) }}
                                    {{ Form::date('inc_send_date', null, ['class' => 'form-control']) }}
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    {{ Form::label('certificate_issue_date', 'Certification Issue Date', ['class' => 'form-control-label']) }}
                                    {{ Form::date('certificate_issue_date', null, ['class' => 'form-control']) }}
                                </div>
                            </div> --}}
                        {{-- </div>
                        <div class="row"> --}}
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Download As</label>
                                    <select name="file_type" id="file_type" class="form-control">
                                        <option value="1">PDF</option>
                                        <option value="2">Excel</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    <div>
                                        <button type="submit" class="btn btn-secondary" style="margin-left: 40%;"
                                            id="download_excel">Download</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        jQuery(document).ready(function() {


        });
    </script>
@endpush
