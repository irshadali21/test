@extends('layouts.app')

@section('content')
    <!-- ================== -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-header">
                    <h3>Generate new Report for Firms</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('getreport.firms') }}" accept-charset="UTF-8">
                        @csrf
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    {{ Form::label('firm_name', 'Firm Name', ['class' => 'form-control-label']) }}
                                    {{ Form::text('firm_name', null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    {{ Form::label('ateco', 'Ateco Code', ['class' => 'form-control-label']) }}
                                    <select name="ateco" id="ateco" class="form-control select2">
                                        <option value="" selected disabled>Select ateco code...</option>
                                        @foreach ($ateco as $ateco)
                                            <option value="{{ $ateco->id }}">{{ $ateco->code }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    {{ Form::label('sector', 'Sector', ['class' => 'form-control-label']) }}
                                    <select name="sector" id="sector" class="form-control select2">
                                        <option value="" selected disabled>Select sector...</option>
                                        @foreach ($sector as $sector)
                                            <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    {{ Form::label('province', 'Province', ['class' => 'form-control-label']) }}
                                    <select name="province" id="province" class="form-control select2">
                                        <option value="" selected disabled>Select province ...</option>
                                        @foreach ($province as $province)
                                            <option value="{{ $province->id }}">{{ $province->province }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Category</label>
                                    <select name="category" id="category" class="form-control">
                                        <option value="" selected disabled>Select category ...</option>
                                        <option value="MICRO">MICRO</option>
                                        <option value="PICCOLA">PICCOLA</option>
                                        <option value="MEDIA">MEDIA</option>
                                        <option value="GRANDE">GRANDE</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Firm Type</label>
                                    <select name="firm_type" id="firm_type" class="form-control">
                                        <option value="" selected disabled>Select Firms ...</option>
                                        <option value="Società di Capitali">Società di Capitali</option>
                                        <option value="Società di Persone">Società di Persone</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-lg-3">
                                <div class="form-group">
                                    {{ Form::label('phone', 'Phone', ['class' => 'form-control-label']) }}
                                    {{ Form::text('phone', null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    {{ Form::label('advisor', 'Advisor', ['class' => 'form-control-label']) }}
                                    <select name="advisor" id="advisor" class="form-control select2">
                                        <option value="" selected disabled>Select advisor ...</option>
                                        @foreach ($advisor as $advisor)
                                            <option value="{{ $advisor->id }}">{{ $advisor->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
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
