@extends('layouts.app')

@section('content')
    <!-- ================== -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-header">
                    <h3>Generate new Report for Files</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('getreport.files') }}" accept-charset="UTF-8">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label('company', 'Company ( VAT Number )', ['class' => 'form-control-label']) }}
                                    <select name="company" id="company" class = "form-control select2" >
                                        <option value="" selected disabled>Select Company...</option>
                                        @foreach ($company as $com)
                                            <option value="{{ $com->id }}">{{ $com->company_name }} ( {{ $com->vat_number }} )</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label('benefits', 'Type of Benefits', ['class' => 'form-control-label']) }}
                                    {{ Form::select('benefits', $benefit, null, ['class' => 'form-control select2', 'placeholder' => 'Select Benefits...']) }}
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    {{ Form::label('inc_send_date', 'Incarico Send Date', ['class' => 'form-control-label']) }}
                                    {{ Form::date('inc_send_date', null, ['class' => 'form-control']) }}
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    {{ Form::label('certificate_issue_date', 'Certification Issue Date', ['class' => 'form-control-label']) }}
                                    {{ Form::date('certificate_issue_date', null, ['class' => 'form-control']) }}
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    {{ Form::label('file_date', 'File Creation Date', ['class' => 'form-control-label']) }}
                                    {{ Form::date('file_date', null, ['class' => 'form-control']) }}
                                </div>
                            </div>

                            @if (auth()->user()->hasrole('super-admin'))
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        {{ Form::label('advisor_name', 'Advisor Name', ['class' => 'form-control-label']) }}
                                    {{ Form::select('advisor_name', $advisor, null, ['class' => 'form-control select2', 'placeholder' => 'Select Advisor...']) }}
                                        {{-- {{ Form::text('advisor_name', null, ['class' => 'form-control']) }} --}}
                                    </div>
                                </div>
                            @endif

                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label('opration_email', 'E-Mail Opration', ['class' => 'form-control-label']) }}
                                    {{ Form::text('opration_email', null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>
                           <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">

                                    <label class="form-control-label">Download As</label>
                                    <select name="file_type" id="file_type" class="form-control">
                                        <option value=1>PDF</option>
                                        <option value=2>Excel</option>
                                    </select>
                                </div>


                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    <div>
                                        <button type="button" class="btn btn-outline-success" style="margin-left: 20%;"
                                            id="preview">Preview</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    <div>
                                        <button type="submit" class="btn btn-secondary"
                                            id="download_excel">Download</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive" id="filespreview"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $( document ).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click', '#preview', function() {
                var company = $('#company').val();
                var benefits = $('#benefits').val();
                var inc_send_date = $('#inc_send_date').val();
                var certificate_issue_date = $('#certificate_issue_date').val();
                var file_date = $('#file_date').val();
                var advisor_name = $('#advisor_name').val();
                var opration_email = $('#opration_email').val();
                var file_type = $('#file_type').val();
                $.ajax({
                    type: "post",
                    url: "{{ route('getreport.files') }}",
                    data: {
                        company:company,
                        benefits:benefits,
                        inc_send_date:inc_send_date,
                        certificate_issue_date:certificate_issue_date,
                        file_date:file_date,
                        advisor_name:advisor_name,
                        opration_email:opration_email,
                        file_type:file_type,
                    },
                    cache: false,
                    success: function(result) {
                        if (result.data.length == 0) {
                            console.log(result.message);
                        } else {
                            const element = result.data;
                            // console.log(element);
                            var appenddata = ``
                            if (element.length > 0) {
                                appenddata += `<table class="table datatable" id="laVelinaClusters-table"><tbody>`;
                                for (let index = 0; index < element.length; index++) {
                                    const company = element[index];
                                    // console.log(company);
                                    appenddata += `<tr>`;

                                    company.forEach(element => {
                                        appenddata +=  `<td>` + element + `</td>`
                                    });
                                    appenddata += `</tr>`;
                                }
                                appenddata += '</tbody></table>';
                            }
                            console.log(appenddata);
                            $('#filespreview').html(appenddata);
                        }

                    },
                });
            })

        });
    </script>
@endpush
