@extends('layouts.app')
@push('pg_btn')
    <a href="{{route('post.index')}}" class="btn btn-sm btn-neutral">All Files</a>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                    {!! Form::open(['route' => 'file.store', 'files' => true]) !!}
                    <h6 class="heading-small text-muted mb-4">File information</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        {{ Form::label('vat_number', 'VAT Number', ['class' => 'form-control-label']) }}
                                        {{ Form::text('vat_number', null, ['class' => 'form-control', 'placeholder' => 'VAT Number']) }}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {{ Form::label('countries', 'Countries', ['class' => 'form-control-label']) }}
                                        <select name="countries" id="countries" class="form-control">
                                        @foreach ($countries as $c)
                                            <option value="{{ $c['countryIso2'] }}">{{ $c['countryName'] }}</option>
                                            
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                       <br>
                                        {{ Form::button('Get Data', array('class' => 'btn btn-danger mt-2', 'id'=> 'get_data')) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        {{ Form::label('company_name', 'Company Name', ['class' => 'form-control-label']) }}
                                        {{ Form::text('company_name', null, ['class' => 'form-control', 'placeholder' => 'Company Name']) }}
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
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        {{ Form::label('sdi', 'SDI', ['class' => 'form-control-label']) }}
                                        {{ Form::text('sdi', null, ['class' => 'form-control', 'placeholder' => 'SDI']) }}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        {{ Form::label('benefit_id', 'Benefit', ['class' => 'form-control-label']) }}
                                        {{ Form::select('benefit_id', $benefit, null, [ 'class'=> ' form-control', 'placeholder' => 'Select Benefit...']) }}
                                        
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        {{ Form::label('year', 'Year', ['class' => 'form-control-label']) }}
                                        {{ Form::number('year', null, ['class' => 'form-control', 'placeholder' => 'E.g 2022']) }}
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
                                        {{ Form::label('customer_email', 'Customer Email', ['class' => 'form-control-label']) }}
                                        {{ Form::email('customer_email', null, ['class' => 'form-control', 'placeholder' => 'Customer_Email@domain.com']) }}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        {{ Form::label('opration_email', 'Opration Email', ['class' => 'form-control-label']) }}
                                        {{ Form::email('opration_email', null, ['class' => 'form-control', 'placeholder' => 'Opration_Email@domain.com']) }}
                                    </div>
                                </div>
                                
                            </div>
                                

                        {{-- <hr class="my-4" /> --}}
                        
                        <div class="col-md-12">
                            {{ Form::submit('Submit', ['class'=> 'mt-5 btn btn-primary']) }}
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
    
    
        $('#get_data').on('click', function(){
           var vat_number = $('#vat_number').val();
           var country = $('#countries').val();
           console.log(vat_number);
           console.log(country);

           $.ajax({
            type:"post",
            url: "{{ route('file.get_data') }}",
            data:{
                "_token": "{{ csrf_token() }}",
                vat_num:vat_number,
                country:country
            },
            success:function(company){
                console.log(company);
                console.log(company.address.simpleValue);
                console.log(company['name']);
                console.log(company['address']['simpleValue']);
                console.log(company['status']);
                console.log(company['officeType']);
                console.log(company['type']);
                console.log(company['id']);

                $('#company_name').val(company.name);
                $('#company_address').val(company.address.simpleValue);
                $('#phone_number').val(company.phoneNo);
                $('#region').val(company.address.province);
            }
           })
        })
    });

    
  </script>
@endpush
