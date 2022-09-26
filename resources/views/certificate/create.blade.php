@extends('layouts.app')
@php
    if (session()->get('files_allowed') == null) {
        return redirect()->to('files')->send();
    }
@endphp
@push('pg_btn')
    <a href="{{route('certificate.index')}}" class="btn btn-sm btn-neutral">All Certificate</a>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                    {!! Form::open(['route' => 'certificate.store', 'files' => true]) !!}
                    <h6 class="heading-small text-muted mb-4">Certificate information for <strong>{{ $file->company->company_name }}</strong> - {{ $file->benefit->column1 }} - {{ $file->year }}</h6>
                        <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 mt-2">
                                        <div class="form-group">
                                            {{ Form::label('course', 'Course Name', ['class' => 'form-control-label']) }}
                                            {{ Form::text('course[]', null, ['class' => 'form-control', ]) }}
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 mt-2">
                                        <div class="form-group">
                                            {{ Form::label('hours', 'Number of Hours', ['class' => 'form-control-label']) }}
                                            {{ Form::text('hours[]', null, ['class' => 'form-control', ]) }}
                                            
                                        </div>
                                    </div>
                                        
                                    <div class="col-lg-2 col-md-2 mt-2">
                                        <div class="form-group">
                                            {{ Form::label('employe', 'Number of employees', ['class' => 'form-control-label']) }}
                                            {{ Form::text('employe[]', null, ['class' => 'form-control', ]) }}
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-6" style="margin-top: -20px">
                                        <div class="form-group">
                                            {{ Form::text('course[]', null, ['class' => 'form-control', ]) }}
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2" style="margin-top: -20px">
                                        <div class="form-group">
                                            {{ Form::text('hours[]', null, ['class' => 'form-control', ]) }}
                                            
                                        </div>
                                    </div>
                                        
                                    <div class="col-lg-2 col-md-2" style="margin-top: -20px">
                                        <div class="form-group">
                                            {{ Form::text('employe[]', null, ['class' => 'form-control', ]) }}
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-6" style="margin-top: -20px">
                                        <div class="form-group">
                                            {{ Form::text('course[]', null, ['class' => 'form-control', ]) }}
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2" style="margin-top: -20px">
                                        <div class="form-group">
                                            {{ Form::text('hours[]', null, ['class' => 'form-control', ]) }}
                                            
                                        </div>
                                    </div>
                                        
                                    <div class="col-lg-2 col-md-2" style="margin-top: -20px">
                                        <div class="form-group">
                                            {{ Form::text('employe[]', null, ['class' => 'form-control', ]) }}
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-6" style="margin-top: -20px">
                                        <div class="form-group">
                                            {{ Form::text('course[]', null, ['class' => 'form-control', ]) }}
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2" style="margin-top: -20px">
                                        <div class="form-group">
                                            {{ Form::text('hours[]', null, ['class' => 'form-control', ]) }}
                                            
                                        </div>
                                    </div>
                                        
                                    <div class="col-lg-2 col-md-2" style="margin-top: -20px">
                                        <div class="form-group">
                                            {{ Form::text('employe[]', null, ['class' => 'form-control', ]) }}
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-6" style="margin-top: -20px">
                                        <div class="form-group">
                                            {{ Form::text('course[]', null, ['class' => 'form-control', ]) }}
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2" style="margin-top: -20px">
                                        <div class="form-group">
                                            {{ Form::text('hours[]', null, ['class' => 'form-control', ]) }}
                                            
                                        </div>
                                    </div>
                                        
                                    <div class="col-lg-2 col-md-2" style="margin-top: -20px">
                                        <div class="form-group">
                                            {{ Form::text('employe[]', null, ['class' => 'form-control', ]) }}
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-6" style="margin-top: -20px">
                                        <div class="form-group">
                                            {{ Form::text('course[]', null, ['class' => 'form-control', ]) }}
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2" style="margin-top: -20px">
                                        <div class="form-group">
                                            {{ Form::text('hours[]', null, ['class' => 'form-control', ]) }}
                                            
                                        </div>
                                    </div>
                                        
                                    <div class="col-lg-2 col-md-2" style="margin-top: -20px">
                                        <div class="form-group">
                                            {{ Form::text('employe[]', null, ['class' => 'form-control', ]) }}
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-6" style="margin-top: -20px">
                                        <div class="form-group">
                                            {{ Form::text('course[]', null, ['class' => 'form-control', ]) }}
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2" style="margin-top: -20px">
                                        <div class="form-group">
                                            {{ Form::text('hours[]', null, ['class' => 'form-control', ]) }}
                                            
                                        </div>
                                    </div>
                                        
                                    <div class="col-lg-2 col-md-2" style="margin-top: -20px">
                                        <div class="form-group">
                                            {{ Form::text('employe[]', null, ['class' => 'form-control', ]) }}
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-6" style="margin-top: -20px">
                                        <div class="form-group">
                                            {{ Form::text('course[]', null, ['class' => 'form-control', ]) }}
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2" style="margin-top: -20px">
                                        <div class="form-group">
                                            {{ Form::text('hours[]', null, ['class' => 'form-control', ]) }}
                                            
                                        </div>
                                    </div>
                                        
                                    <div class="col-lg-2 col-md-2" style="margin-top: -20px">
                                        <div class="form-group">
                                            {{ Form::text('employe[]', null, ['class' => 'form-control', ]) }}
                                            
                                        </div>
                                    </div>
                                </div>
                                


                                <p style="margin-left: 15%; font-weight: bold"> Cost ecnomic report</p>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 " style="margin-top: -15px">
                                        <div class="form-group">
                                            {{ Form::text('A', 'A', ['class' => 'form-control', 'disabled' ]) }}
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4" style="margin-top: -15px">
                                        <div class="form-group">
                                            {{ Form::number('Cost_ecnomic_report[]', '0', ['class' => 'form-control calculations', 'step' =>'any' ]) }}
                                            
                                        </div>
                                    </div>
                                        
                                    
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 " style="margin-top: -15px">
                                        <div class="form-group">
                                            {{ Form::text('A*', 'A*', ['class' => 'form-control', 'disabled' ]) }}
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4" style="margin-top: -15px">
                                        <div class="form-group">
                                            {{ Form::number('Cost_ecnomic_report[]', '0', ['class' => 'form-control calculations', 'step' =>'any' ]) }}
                                            
                                        </div>
                                    </div>
                                        
                                    
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 " style="margin-top: -20px">
                                        <div class="form-group">
                                            {{ Form::text('B', 'B', ['class' => 'form-control', 'disabled' ]) }}
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4" style="margin-top: -20px">
                                        <div class="form-group">
                                            {{ Form::number('Cost_ecnomic_report[]', '0', ['class' => 'form-control calculations', 'step' =>'any' ]) }}
                                            
                                        </div>
                                    </div>
                                        
                                    
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 " style="margin-top: -20px">
                                        <div class="form-group">
                                            {{ Form::text('C', 'C', ['class' => 'form-control', 'disabled' ]) }}
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4" style="margin-top: -20px">
                                        <div class="form-group">
                                            {{ Form::number('Cost_ecnomic_report[]', '0', ['class' => 'form-control calculations', 'step' =>'any']) }}
                                            
                                        </div>
                                    </div>
                                        
                                    
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 " style="margin-top: -20px">
                                        <div class="form-group">
                                            {{ Form::text('C*', 'C*', ['class' => 'form-control', 'disabled' ]) }}
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4" style="margin-top: -20px">
                                        <div class="form-group">
                                            {{ Form::number('Cost_ecnomic_report[]', '0', ['class' => 'form-control calculations', 'step' =>'any' ]) }}
                                            
                                        </div>
                                    </div>
                                        
                                    
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 " style="margin-top: -20px">
                                        <div class="form-group">
                                            {{ Form::text('D', 'D', ['class' => 'form-control', 'disabled' ]) }}
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4" style="margin-top: -20px">
                                        <div class="form-group">
                                            {{ Form::number('Cost_ecnomic_report[]', '0', ['class' => 'form-control calculations','step' =>'any' ]) }}
                                            
                                        </div>
                                    </div>
                                        
                                    
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 " style="margin-top: -20px">
                                        <div class="form-group">
                                            {{ Form::text('E', 'E', ['class' => 'form-control', 'disabled' ]) }}
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4" style="margin-top: -20px">
                                        <div class="form-group">
                                            {{ Form::number('Cost_ecnomic_report[]', '0', ['class' => 'form-control calculations', 'step' =>'any']) }}
                                            
                                        </div>
                                    </div>
                                        
                                    
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 " style="margin-top: -20px">
                                        <div class="form-group">
                                            {{ Form::text('F', 'F', ['class' => 'form-control', 'disabled' ]) }}
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4" style="margin-top: -20px">
                                        <div class="form-group">
                                            {{ Form::number('Cost_ecnomic_report[]', '0', ['class' => 'form-control calculations', 'step' =>'any']) }}
                                            
                                        </div>
                                    </div>
                                        
                                    
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 " style="margin-top: -20px">
                                        <div class="form-group">
                                            {{ Form::text('total', 'Total', ['class' => 'form-control', 'disabled' ]) }}
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4" style="margin-top: -20px">
                                        <div class="form-group">
                                            {{ Form::number('total_cost', '0', ['class' => 'form-control total',  'step' =>'any']) }}
                                            
                                        </div>
                                    </div>
                                        
                                    
                                </div>

                                
                                <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('accrued_benefit', 'Accrued Benefit', ['class' => 'form-control-label']) }}
                                        {{ Form::text('accrued_benefit', null, ['class' => 'form-control', ]) }}
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('tribute_6897', 'Tribute 6897', ['class' => 'form-control-label']) }}
                                        {{ Form::text('tribute_6897', null, ['class' => 'form-control', ]) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        {{ Form::label('tribute_6938', 'Tribute 6938', ['class' => 'form-control-label']) }}
                                        {{ Form::text('tribute_6938', null, ['class' => 'form-control', ]) }}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        {{ Form::label('tribute_6939', 'Tribute 6939', ['class' => 'form-control-label']) }}
                                        {{ Form::text('tribute_6939', null, ['class' => 'form-control',]) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        {{ Form::label('tribute_6940', 'Tribute 6940', ['class' => 'form-control-label']) }}
                                        {{ Form::text('tribute_6940', null, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                                
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        {{ Form::label('sdi', 'SDI', ['class' => 'form-control-label']) }}
                                        {{ Form::text('sdi', $file->sdi, ['class' => 'form-control', 'readonly']) }}
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        {{ Form::label('phone', 'phone', ['class' => 'form-control-label']) }}
                                        {{ Form::text('phone', $file->company->phone_number, ['class' => 'form-control', 'readonly']) }}
                                    </div>
                                </div>
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
        jQuery('.calculations').on('keyup', function(){
            var sum = 0;
            jQuery('.calculations').each(function() {
                sum += Number($(this).val()) || 0;            
        });
        jQuery('.total').val(sum);
        })
       
    });

    
  </script>
@endpush
