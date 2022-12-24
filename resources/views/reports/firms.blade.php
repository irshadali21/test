@extends('layouts.app')

@section('content')
    <!-- ================== -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-header">
                    <h3>{{ __('lang.Generate new Report for Firms') }}</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('getreport.firms') }}" accept-charset="UTF-8">
                        @csrf
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    {{ Form::label('firm_name', __('lang.Firm Name'), ['class' => 'form-control-label']) }}
                                    {{ Form::text('firm_name', null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    {{ Form::label('ateco', __('lang.Ateco Code'), ['class' => 'form-control-label']) }}
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
                                    {{ Form::label('sector', __('lang.Sector'), ['class' => 'form-control-label']) }}
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
                                    {{ Form::label('province', __('lang.Province'), ['class' => 'form-control-label']) }}
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
                                    <label class="form-control-label">{{ __('lang.Category') }}</label>
                                    <select name="category" id="category" class="form-control">
                                        <option value="" selected disabled>{{ __('lang.Select category ...') }}</option>
                                        <option value="MICRO">MICRO</option>
                                        <option value="PICCOLA">PICCOLA</option>
                                        <option value="MEDIA">MEDIA</option>
                                        <option value="GRANDE">GRANDE</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">{{ __('lang.Firm Type') }}</label>
                                    <select name="firm_type" id="firm_type" class="form-control">
                                        <option value="" selected disabled>{{ __('lang.Select Firms ...') }}</option>
                                        <option value="Società di Capitali">Società di Capitali</option>
                                        <option value="Società di Persone">Società di Persone</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-lg-3">
                                <div class="form-group">
                                    {{ Form::label('phone', __('lang.Phone Number'), ['class' => 'form-control-label']) }}
                                    {{ Form::text('phone', null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            @if (auth()->user()->hasrole('super-admin'))
                            <div class="col-lg-3">
                                <div class="form-group">
                                    {{ Form::label('advisor', __('lang.ADVISOR'), ['class' => 'form-control-label']) }}
                                    <select name="advisor" id="advisor" class="form-control select2">
                                        <option value="" selected disabled>{{ __('lang.Select advisor') }} ...</option>
                                        @foreach ($advisor as $advisor)
                                        <option value="{{ $advisor->id }}">{{ $advisor->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">{{ __('lang.Download as') }}</label>
                                    <select name="file_type" id="file_type" class="form-control">
                                        <option value="1">PDF</option>
                                        <option value="2">Excel</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    <div>
                                        <button type="button" class="btn btn-outline-success" style="margin-left: 20%;"
                                            id="preview">{{ __('lang.Preview') }}</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
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
                var firm_name = $('#firm_name').val();
                var ateco = $('#ateco').val();
                var sector = $('#sector').val();
                var province = $('#province').val();
                var category = $('#category').val();
                var firm_type = $('#firm_type').val();
                var phone = $('#phone').val();
                var advisor = $('#advisor').val();
                var file_type = $('#file_type').val();
                $.ajax({
                    type: "post",
                    url: "{{ route('getreport.firms') }}",
                    data: {
                        firm_name:firm_name,
                        ateco:ateco,
                        sector:sector,
                        province:province,
                        category:category,
                        firm_type:firm_type,
                        phone:phone,
                        advisor:advisor,
                        file_type:file_type,
                    },
                    cache: false,
                    success: function(result) {
                        if (result.data.length == 0) {
                            console.log(result.message);
                        } else {
                            const element = result.data;
                            console.log(element);
                            var appenddata = ``
                            if (element.length > 0) {
                                appenddata += `<table class="table datatable" id="laVelinaClusters-table"><tbody>`;
                                for (let index = 0; index < element.length; index++) {
                                    const company = element[index];
                                    console.log(company);
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
