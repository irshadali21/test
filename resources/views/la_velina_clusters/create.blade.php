@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Create La Velina Cluster</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'laVelinaClusters.store']) !!}

            <div class="card-body">

                {{-- <div class="row"> --}}
                    @include('la_velina_clusters.fields')
                {{-- </div> --}}
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6">

                        <button class="btn btn-outline-success" style="float: right" id="filter" type="button">Get
                            Compnies</button>
                    </div>
                </div>
                <br>
                <div id="result_compnies" class="table-responsive">

                </div>

            </div>
            <div class="card-footer" id="save-btn" style="display: none">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('laVelinaClusters.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection


@push('scripts')
    <script>
        jQuery(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#filter').on('click', function() {

                $('#result_compnies').empty();

                var advisor = $("#advisor_name").val()
                var firm = $("#firm").val()
                var sector = $("#sector").val()
                var ateco_code = $("#ateco_code").val()
                var province = $("#province").val()
                var firm_type = $("#firm_type").val()
                var category = $("#category").val()
                // var firm_owner = $("#firm_owner").val()
                // var phone_number = $("#phone_number").val()
                $.ajax({
                    url: "{{ route('laVelinaClusters.filter') }}",
                    type: "post",
                    data: {
                        advisor: advisor,
                        firm: firm,
                        sector: sector,
                        ateco_code: ateco_code,
                        province: province,
                        firm_type: firm_type,
                        category: category,
                        // firm_owner: firm_owner,
                        // phone_number: phone_number
                    },
                    success: function(result) {
                        if (result.data.length == 0) {
                            console.log(result.message);
                        } else {
                            const element = result.data;
                            console.log(element);
                            var appenddata = ``
                            if (element.length > 0) {
                                appenddata += `<table class="table datatable" id="laVelinaClusters-table"><thead><tr>
                                            <th>Add in Cluster</th>
                                            <th>Firm Name</th>
                                            <th>Advisor</th>
                                            <th>VAT No</th>
                                            <th>phone_number</th>
                                            <th>Ateco Code</th>
                                            <th>sector</th>
                                            <th>province</th>
                                            </tr></thead><tbody>`;


                                for (let index = 0; index < element.length; index++) {
                                    const company = element[index];
                                    appenddata += `<tr>
                                        <td> <input type="checkbox" name="company[]" id="company" checked value="` +
                                        company.id + `"></td>
                                        <td>` + company.firm_name + `</td>
                                        <td>` + company.levlelina_advisor.name + `</td>
                                        <td>` + company.firm_vat_no + `</td>
                                        <td>` + company.phone_number + `</td>
                                        <td>` + company.ateco.code + `</td>
                                        <td>` + company.sector.name + `</td>
                                        <td>` + company.province.province + `</td>
                                        </tr>`;
                                }
                                appenddata += '</tbody></table>';
                            }
                            $('#result_compnies').append(appenddata);
                        }
                        $('#save-btn').show();
                        
                    },
                    error: function(result) {
                        // console.log(result.message);
                    }
                })
            })

            
        });
    </script>
@endpush
