@extends('layouts.app')
@push('pg_btn')
    <a href="{{route('files.index')}}" class="btn btn-sm btn-neutral">All Files</a>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                    {!! Form::open(['route' => 'files.store', 'files' => true]) !!}
                    <h6 class="heading-small text-muted mb-4">File information</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        {{ Form::label('vat_number', 'VAT Number', ['class' => 'form-control-label']) }}
                                        {{ Form::text('vat_number', null, ['class' => 'form-control', 'placeholder' => 'VAT Number', 'required' ]) }}
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        {{ Form::label('country', 'country', ['class' => 'form-control-label']) }}
                                        {{ Form::select('country', $cuntries, null, [ 'class'=> ' form-control', 'required']) }}
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">

                                        {{ Form::label('data_base', 'Get Data From', ['class' => 'form-control-label']) }}
                                        {{ Form::button('DataBase', array('class' => 'btn btn-danger ', 'id'=> 'data_base')) }}
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        {{ Form::label('creditsafe', 'Get Data From', ['class' => 'form-control-label']) }}
                                        {{ Form::button('CreditSafe', array('class' => 'btn btn-danger ', 'id'=> 'creditsafe')) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="table-responsive">
                                    <div>
                                        <table class="table table-hover align-items-center">
                                            {{-- <thead class="thead-light"> --}}
                                            <tr class="thead-light">
                                                <th scope="col" style="width: 50px">Company Name</th>
                                                <td scope="budget" style="width: 350px" id="table_companyName"></td>
                                                <th scope="col" style="width: 50px">VAT Number </th>
                                                <td scope="budget" style="width: 350px" id="table_vatNo"></td>
                                            </tr><tr class="thead-light">
                                            <tr class="thead-light">
                                                <th scope="col" style="width: 50px">Company Address</th>
                                                <td scope="budget" style="width: 350px" id="table_companyAddress"></td>
                                                <th scope="col" style="width: 50px">Phone Number </th>
                                                <td scope="budget" style="width: 350px" id="table_phone"></td>
                                            </tr><tr class="thead-light">
                                            <tr class="thead-light">
                                                <th scope="col" style="width: 50px">Email Address</th>
                                                <td scope="budget" style="width: 350px" id="table_emailAddress"></td>
                                                <th scope="col" style="width: 50px">Director </th>
                                                <td scope="budget" style="width: 350px" id="table_director"></td>
                                            </tr><tr class="thead-light">
                                                <th scope="col" style="width: 50px">CreditSafe Rating</th>
                                                <td scope="budget" style="width: 350px" id="table_rating"></td>
                                                <th scope="col" style="width: 50px">Credit </th>
                                                <td scope="budget" style="width: 350px" id="table_credit"></td>
                                            </tr><tr class="thead-light">
                                                <th scope="col" style="width: 50px">Ateco Code</th>
                                                <td scope="budget" style="width: 350px" id="table_atecoCode"></td>
                                                <th scope="col" style="width: 50px">Region </th>
                                                <td scope="budget" style="width: 350px" id="table_region"></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>



                                {{-- <div class="col-lg-6">
                                    <div class="form-group">
                                        {{ Form::label('company_name', 'Company Name', ['class' => 'form-control-label']) }}
                                        {{ Form::text('company_name', null, ['hidden']) }}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        {{ Form::label('company_address', 'Company Address', ['class' => 'form-control-label']) }}
                                        {{ Form::text('company_address', null, ['class' => 'form-control', 'placeholder' => 'Company Address']) }}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        {{ Form::label('email_address', 'Email Address', ['class' => 'form-control-label']) }}
                                        {{ Form::email('email_address', null, ['class' => 'form-control', 'placeholder' => 'email@domain.com']) }}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        {{ Form::label('phone_number', 'Phone Number', ['class' => 'form-control-label']) }}
                                        {{ Form::text('phone_number', null, ['class' => 'form-control', 'placeholder' => 'Phone Number']) }}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        {{ Form::label('region', 'Region', ['class' => 'form-control-label']) }}
                                        {{ Form::text('region', null, ['class' => 'form-control', 'placeholder' => 'Region']) }}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        {{ Form::label('ateco_code', 'ATECO Code', ['class' => 'form-control-label']) }}
                                        {{ Form::text('ateco_code', null, ['class' => 'form-control', 'placeholder' => 'ATECO Code']) }}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        {{ Form::label('creditsafe_rating', 'Creditsafe Rating', ['class' => 'form-control-label']) }}
                                        {{ Form::text('creditsafe_rating', null, ['class' => 'form-control', 'placeholder' => 'Creditsafe Rating']) }}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        {{ Form::label('credit', 'Credit', ['class' => 'form-control-label']) }}
                                        {{ Form::text('credit', null, ['class' => 'form-control', 'placeholder' => 'Credit']) }}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        {{ Form::label('company_administrator', 'Company Administrator', ['class' => 'form-control-label']) }}
                                        {{ Form::text('company_administrator', null, ['class' => 'form-control', 'placeholder' => 'Company Administrator']) }}
                                    </div>
                                </div> --}}
                                
                                <div class="col-lg-6 mt-2">
                                    <div class="form-group">
                                        {{ Form::label('benefit_id', 'Benefit', ['class' => 'form-control-label']) }}
                                        {{ Form::select('benefit_id', $benefit, null, [ 'class'=> ' form-control', 'required']) }}
                                        
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-2">
                                    <div class="form-group">
                                        {{ Form::label('year', 'Year', ['class' => 'form-control-label']) }}
                                        {{ Form::number('year', null, ['class' => 'form-control', 'placeholder' => 'E.g 2022', 'required']) }}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        {{ Form::label('fee', 'Fee', ['class' => 'form-control-label']) }}
                                        {{ Form::text('fee', null, ['class' => 'form-control', 'placeholder' => 'Fee']) }}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        {{ Form::label('sdi', 'SDI', ['class' => 'form-control-label']) }}
                                        {{ Form::text('sdi', null, ['class' => 'form-control', 'placeholder' => 'SDI']) }}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        {{ Form::label('customer_email', 'Customer Email', ['class' => 'form-control-label']) }}
                                        {{ Form::email('customer_email', null, ['class' => 'form-control', 'placeholder' => 'Customer_Email@domain.com', 'required']) }}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        {{ Form::label('opration_email', 'Opration Email', ['class' => 'form-control-label']) }}
                                        {{ Form::email('opration_email', null, ['class' => 'form-control', 'placeholder' => 'Opration_Email@domain.com']) }}
                                    </div>
                                </div>
                                @if (Auth::user()->hasRole('super-admin'))
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            {{ Form::label('advisor', 'Select advisor', ['class' => 'form-control-label']) }}
                                            {{ Form::select('advisor', $advisor, null, [ 'class'=> ' form-control', 'required']) }}
                                        </div>
                                    </div>
                                @endif
                            </div>
                                

                        {{-- <hr class="my-4" /> --}}
                        
                        <div class="col-md-12">
                            {{ Form::submit('Save File', ['class'=> 'mt-5 btn btn-primary']) }}
                        </div>

                    {!! Form::close() !!}
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/summernote-bs4.min.css') }}">
@endpush
@push('scripts')
<script src="{{ asset('assets/js/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
<script>
    jQuery(document).ready(function() {
        jQuery('#summernote').summernote({
            height: 150,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
              ]

        });
        jQuery('#uploadFile').filemanager('file');
    
    
        $('#data_base').on('click', function(){
             var url =  "{{ route('files.get_data_database') }}";
             getdata(url);

        });
        $('#creditsafe').on('click', function(){
             var url =  "{{ route('files.get_data_api') }}";
             getdata(url);
        });

        function getdata(geturl){
           var vat_number = $('#vat_number').val();
           if(vat_number.length == 0){
            alert( 'Please enter VAT Number');
            return;
           }
           var country = $('#country').val();
           $.ajax({
            type:"post",
            url: geturl,
            data:{
                "_token": "{{ csrf_token() }}",
                vat_num:vat_number,
                country:country
            },
            
            success:function(report){
                $('#table_companyName').html(report.businessName);
                $('#table_companyName').html(report.businessName);
                $('#table_vatNo').html(report.vatNo);
                $('#table_companyAddress').html(report.address);
                $('#table_phone').html(report.telephone);
                $('#table_emailAddress').html(report.pec_email);
                $('#table_director').html(report.director);
                $('#table_rating').html(report.creditSafeRating);
                $('#table_credit').html(report.credits);
                $('#table_region').html(report.region);
                $('#table_atecoCode').html(report.ateco_code);
                
            },
                error: function(responce) {
                    // console.log(responce.responseJSON);
                    alert(responce.responseJSON);
                }
           })
        }
    });

    
  </script>
@endpush
