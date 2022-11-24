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

                <div class="row">
                    @include('la_velina_clusters.fields')
                </div>
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6">

                        <button class="btn btn-outline-success" style="float: right" id="filter" type="button">Get
                            Compnies</button>
                    </div>
                </div>
                <br>
                <div id="result_compnies">

                </div>

            </div>
            <div class="card-footer">
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

                var companies = $("#companies").val()
                var benefits = $("#benefits").val()
                var inc_send_date = $("#inc_send_date").val()
                var certificate_issue_date = $("#certificate_issue_date").val()
                var file_date = $("#file_date").val()
                var advisor_name = $("#advisor_name").val()
                var opration_email = $("#opration_email").val()

                $.ajax({
                    url: "{{ route('laVelinaClusters.filter') }}",
                    type: "post",
                    data: {
                        companies: companies,
                        benefits: benefits,
                        inc_send_date: inc_send_date,
                        certificate_issue_date: certificate_issue_date,
                        file_date: file_date,
                        advisor_name: advisor_name,
                        opration_email: opration_email,
                    },
                    success: function(result) {
                            const element = result.data;
                            var appenddata = `<table class="table datatable" id="laVelinaClusters-table"><thead><tr>
                                            <th>Add in Cluster</th>
                                            <th>Company Name</th>
                                            <th>VAT No</th>
                                            <th>phone_number</th>
                                            <th>Ateco Code</th>
                                            <th>Rating</th>
                                            </tr></thead><tbody>`;

                            if (element.length > 0) {
                                for (let index = 0; index < element.length; index++) {
                                    const company = element[index];
                                    
                                    appenddata += `<tr>
            
                                        <td> <input type="checkbox" name="company[]" id="company" checked value="`+company.id+`"></td>
                                        <td>`+company.company_name+`</td>
                                        <td>`+company.vat_number+`</td>
                                        <td>`+company.phone_number+`</td>
                                        <td>`+company.ateco_code+`</td>
                                        <td>`+company.creditsafe_rating+`</td>
                                        </tr>`;
                                }
                                appenddata += '</tbody></table>';
                            }
                        $('#result_compnies').append(appenddata);

                        
                    },
                    error: function(result) {
                    }
                })
            })

        });
    </script>
@endpush
