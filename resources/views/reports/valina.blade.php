@extends('layouts.app')

@section('content')
    <!-- ================== -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-header">
                    <h3>{{ __('lang.Generate new Report for Valina') }}</h3>
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
                                    {{ Form::label('lavelina', __('lang.lavelina'), ['class' => 'form-control-label']) }}
                                    <select name="lavelina" id="lavelina" class="form-control select2">
                                        <option value="" selected disabled>{{ __('lang.Select valina') }}</option>
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
                                    <label class="form-control-label">{{ __('lang.Download as') }}</label>
                                    <select name="file_type" id="file_type" class="form-control">
                                        <option value="1">PDF</option>
                                        <option value="2">Excel</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    <div>
                                        <button type="button" class="btn btn-outline-success" style="margin-left: 20%;"
                                            id="preview">{{ __('lang.Preview') }}</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    <div>
                                        <button type="submit" class="btn btn-secondary" id="download_excel">{{ __('lang.Download') }}</button>
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
                var lavelina = $('#lavelina').val();
                var file_type = $('#file_type').val();

                $.ajax({
                    type: "post",
                    url: "{{ route('getreport.valina') }}",
                    data: {
                        lavelina:lavelina,
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
