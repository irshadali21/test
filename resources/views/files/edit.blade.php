@extends('layouts.app')
@push('pg_btn')
    <a href="{{route('files.index')}}" class="btn btn-sm btn-neutral">All Files</a>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                    {!! Form::open(['route' => ['files.update', $file], 'files' => true, 'method' => 'put']) !!}
                    <h6 class="heading-small text-muted mb-4">File information</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        {{ Form::label('vat_number', 'VAT Number', ['class' => 'form-control-label']) }}
                                        {{ Form::text('vat_number', $file->company->vat_number, ['class' => 'form-control', 'placeholder' => 'VAT Number', 'required' ]) }}
                                        {{ Form::hidden('file_id', $file->id) }}
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        {{ Form::label('country', 'country', ['class' => 'form-control-label']) }}
                                        {{ Form::select('country', $cuntries, $file->company->country, [ 'class'=> ' form-control', 'required']) }}
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
                                                <td scope="budget" style="width: 350px" id="table_companyName">{{ $file->company->company_name }}</td>
                                                <th scope="col" style="width: 50px">VAT Number </th>
                                                <td scope="budget" style="width: 350px" id="table_vatNo">{{ $file->company->vat_number }}</td>
                                            </tr><tr class="thead-light">
                                            <tr class="thead-light">
                                                <th scope="col" style="width: 50px">Company Address</th>
                                                <td scope="budget" style="width: 350px" id="table_companyAddress">{{ $file->company->company_address }}</td>
                                                <th scope="col" style="width: 50px">Phone Number </th>
                                                <td scope="budget" style="width: 350px" id="table_phone">{{ $file->company->phone_number }}</td>
                                            </tr><tr class="thead-light">
                                            <tr class="thead-light">
                                                <th scope="col" style="width: 50px">Email Address</th>
                                                <td scope="budget" style="width: 350px" id="table_emailAddress">{{ $file->company->email_address }}</td>
                                                <th scope="col" style="width: 50px">Director </th>
                                                <td scope="budget" style="width: 350px" id="table_director">{{ $file->company->company_administrator }}</td>
                                            </tr><tr class="thead-light">
                                                <th scope="col" style="width: 50px">CreditSafe Rating</th>
                                                <td scope="budget" style="width: 350px" id="table_rating">{{ $file->company->creditsafe_rating }}</td>
                                                <th scope="col" style="width: 50px">Credit </th>
                                                <td scope="budget" style="width: 350px" id="table_credit">{{ $file->company->credit }}</td>
                                            </tr><tr class="thead-light">
                                                <th scope="col" style="width: 50px">Ateco Code</th>
                                                <td scope="budget" style="width: 350px" id="table_atecoCode">{{ $file->company->ateco_code }}</td>
                                                <th scope="col" style="width: 50px">City </th>
                                                <td scope="budget" style="width: 350px" id="table_region">{{ $file->company->region }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                
                                <div class="col-lg-6 mt-2">
                                    <div class="form-group">
                                        {{ Form::label('benefit_id', 'Benefit', ['class' => 'form-control-label']) }}
                                        {{ Form::select('benefit_id', $benefit, $file->benefit_id, [ 'class'=> ' form-control', 'required']) }}
                                        
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-2">
                                    <div class="form-group">
                                        {{ Form::label('year', 'Year', ['class' => 'form-control-label']) }}
                                        {{ Form::number('year', $file->year, ['class' => 'form-control', 'placeholder' => 'E.g 2022', 'required']) }}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        {{ Form::label('fee', 'Fee', ['class' => 'form-control-label']) }}
                                        {{ Form::text('fee', $file->fee, ['class' => 'form-control', 'placeholder' => 'Fee']) }}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        {{ Form::label('sdi', 'SDI', ['class' => 'form-control-label']) }}
                                        {{ Form::text('sdi', $file->sdi, ['class' => 'form-control', 'placeholder' => 'SDI']) }}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        {{ Form::label('customer_email', 'Customer Email', ['class' => 'form-control-label']) }}
                                        {{ Form::email('customer_email', $file->customer_email, ['class' => 'form-control', 'placeholder' => 'Customer_Email@domain.com', 'required']) }}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        {{ Form::label('opration_email', 'Opration Email', ['class' => 'form-control-label']) }}
                                        {{ Form::email('opration_email', $file->opration_email, ['class' => 'form-control', 'placeholder' => 'Opration_Email@domain.com']) }}
                                    </div>
                                </div>
                                @if (Auth::user()->hasRole('super-admin'))
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        {{ Form::label('advisor', 'Select advisor', ['class' => 'form-control-label']) }}
                                        {{ Form::select('advisor', $advisor, $file->advisor_id, [ 'class'=> ' form-control', 'required']) }}
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
