@extends('layouts.app')
@push('pg_btn')
    <a href="{{ route('certificate.index') }}" class="btn btn-sm btn-neutral">All Certificate</a>
@endpush
@section('content')
    @php
        $fmt = new NumberFormatter(($locale = 'it_IT'), NumberFormatter::DECIMAL);
    @endphp
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                    {!! Form::open(['route' => ['certificate.update', $certificate->id], 'files' => true, 'method' => 'put']) !!}

                    <h6 class="heading-small text-muted mb-4">Certificate information for
                        <strong>{{ $certificate->file->company->company_name }}</strong> -
                        {{ $certificate->file->benefit->column1 }} - {{ $certificate->file->year }}
                    </h6>
                    <div class="pl-lg-4">
                        <div class="row">

                            <div class="col-lg-4 col-md-6 mt-2">
                                <div class="form-group">
                                    {{ Form::label('course', 'Course Name', ['class' => 'form-control-label']) }}

                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 mt-2">
                                <div class="form-group">
                                    {{ Form::label('hours', 'Number of Hours', ['class' => 'form-control-label']) }}

                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2 mt-2">
                                <div class="form-group">
                                    {{ Form::label('employe', 'Number of employees', ['class' => 'form-control-label']) }}

                                </div>
                            </div>
                        </div>

                        @foreach (json_decode($certificate->course_data) as $course_data)
                            @php
                                $course_data = (array) $course_data;
                            @endphp
                            <div class="row">
                                <div class="col-lg-4 col-md-6" style="margin-top: -20px">
                                    <div class="form-group">
                                        {{ Form::text('course[]', $course_data['course'], ['class' => 'form-control']) }}

                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2" style="margin-top: -20px">
                                    <div class="form-group">
                                        {{ Form::text('hours[]', $course_data['hours'], ['class' => 'form-control']) }}

                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-2" style="margin-top: -20px">
                                    <div class="form-group">
                                        {{ Form::text('employe[]', $course_data['employe'], ['class' => 'form-control']) }}

                                    </div>
                                </div>
                            </div>
                        @endforeach



                        @php
                            $cost_ecnomic_report = json_decode($certificate->cost_ecnomic_report);
                        @endphp
                        <p style="margin-left: 15%; font-weight: bold"> Cost ecnomic report</p>
                        <div class="row">
                            <div class="col-lg-2 col-md-2 " style="margin-top: -15px">
                                <div class="form-group">
                                    {{ Form::text('A', 'A', ['class' => 'form-control', 'disabled']) }}

                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4" style="margin-top: -15px">
                                <div class="form-group">
                                    {{ Form::number('Cost_ecnomic_report[]', json_decode($cost_ecnomic_report[0]), ['class' => 'form-control calculations', 'step' => 'any']) }}

                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-lg-2 col-md-2 " style="margin-top: -15px">
                                <div class="form-group">
                                    {{ Form::text('A*', 'A*', ['class' => 'form-control', 'disabled']) }}

                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4" style="margin-top: -15px">
                                <div class="form-group">
                                    {{ Form::number('Cost_ecnomic_report[]', $cost_ecnomic_report[1], ['class' => 'form-control calculations', 'step' => 'any']) }}

                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-lg-2 col-md-2 " style="margin-top: -20px">
                                <div class="form-group">
                                    {{ Form::text('B', 'B', ['class' => 'form-control', 'disabled']) }}

                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4" style="margin-top: -20px">
                                <div class="form-group">
                                    {{ Form::number('Cost_ecnomic_report[]', $cost_ecnomic_report[2], ['class' => 'form-control calculations', 'step' => 'any']) }}

                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-lg-2 col-md-2 " style="margin-top: -20px">
                                <div class="form-group">
                                    {{ Form::text('C', 'C', ['class' => 'form-control', 'disabled']) }}

                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4" style="margin-top: -20px">
                                <div class="form-group">
                                    {{ Form::number('Cost_ecnomic_report[]', $cost_ecnomic_report[3], ['class' => 'form-control calculations', 'step' => 'any']) }}

                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-lg-2 col-md-2 " style="margin-top: -20px">
                                <div class="form-group">
                                    {{ Form::text('C*', 'C*', ['class' => 'form-control', 'disabled']) }}

                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4" style="margin-top: -20px">
                                <div class="form-group">
                                    {{ Form::number('Cost_ecnomic_report[]', $cost_ecnomic_report[4], ['class' => 'form-control calculations', 'step' => 'any']) }}

                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-lg-2 col-md-2 " style="margin-top: -20px">
                                <div class="form-group">
                                    {{ Form::text('D', 'D', ['class' => 'form-control', 'disabled']) }}

                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4" style="margin-top: -20px">
                                <div class="form-group">
                                    {{ Form::number('Cost_ecnomic_report[]', $cost_ecnomic_report[5], ['class' => 'form-control calculations', 'step' => 'any']) }}

                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-lg-2 col-md-2 " style="margin-top: -20px">
                                <div class="form-group">
                                    {{ Form::text('E', 'E', ['class' => 'form-control', 'disabled']) }}

                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4" style="margin-top: -20px">
                                <div class="form-group">
                                    {{ Form::number('Cost_ecnomic_report[]', $cost_ecnomic_report[6], ['class' => 'form-control calculations', 'step' => 'any']) }}

                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-lg-2 col-md-2 " style="margin-top: -20px">
                                <div class="form-group">
                                    {{ Form::text('F', 'F', ['class' => 'form-control', 'disabled']) }}

                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4" style="margin-top: -20px">
                                <div class="form-group">
                                    {{ Form::number('Cost_ecnomic_report[]', $cost_ecnomic_report[7], ['class' => 'form-control calculations', 'step' => 'any']) }}

                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-lg-2 col-md-2 " style="margin-top: -20px">
                                <div class="form-group">
                                    {{ Form::text('total', 'Total', ['class' => 'form-control', 'disabled']) }}

                                </div>
                            </div>

                            @php
                                $total = 0;
                                foreach ($cost_ecnomic_report as $cost) {
                                    $total += $cost;
                                }
                                
                                $value = $fmt->format($total);
                                if (strpos($value, ',') == false) {
                                    $value = $fmt->format($total) . ',00';
                                }
                                
                            @endphp
                            <div class="col-lg-4 col-md-4" style="margin-top: -20px">
                                <div class="form-group">
                                    {{ Form::text('', $value, ['class' => 'form-control total', 'disabled']) }}

                                </div>
                            </div>


                        </div>


                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    {{ Form::label('accrued_benefit', 'Accrued Benefit', ['class' => 'form-control-label']) }}
                                    {{ Form::number('accrued_benefit', $certificate->accrued_benifits, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    {{ Form::label('tribute_6897', 'Tribute 6897', ['class' => 'form-control-label']) }}
                                    {{ Form::number('tribute_6897', $certificate->tribute_6897, ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label('tribute_6938', 'Tribute 6938', ['class' => 'form-control-label']) }}
                                    {{ Form::number('tribute_6938', $certificate->tribute_6938, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label('tribute_6939', 'Tribute 6939', ['class' => 'form-control-label']) }}
                                    {{ Form::number('tribute_6939', $certificate->tribute_6939, ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label('tribute_6940', 'Tribute 6940', ['class' => 'form-control-label']) }}
                                    {{ Form::number('tribute_6940', $certificate->tribute_6940, ['class' => 'form-control']) }}
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    {{ Form::label('sdi', 'SDI', ['class' => 'form-control-label']) }}
                                    {{ Form::text('sdi', $certificate->file->sdi, ['class' => 'form-control', 'readonly']) }}
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    {{ Form::label('phone', 'phone', ['class' => 'form-control-label']) }}
                                    {{ Form::text('phone', $certificate->file->company->phone_number, ['class' => 'form-control', 'readonly']) }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="status" value="1" class="custom-control-input"
                                    id="status" @if ($certificate->status == 1)
                                        checked
                                    @endif>
                                {{ Form::label('status', 'Certificate Paid', ['class' => 'custom-control-label']) }}
                            </div>
                        </div>

                        {{-- <hr class="my-4" /> --}}

                        <div class="col-md-12">
                            {{ Form::submit('Save File', ['class' => 'mt-5 btn btn-secondary']) }}
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
            jQuery('.calculations').on('keyup', function() {
                var sum = 0;
                jQuery('.calculations').each(function() {

                    let eur = jQuery(this).val().replace(/[^\d.]/g, '');
                    if (eur) {
                        var ct = parseFloat(eur);
                        sum += ct;
                    }
                    // console.log(eur);

                });
                jQuery('.total').val(sum.toLocaleString('it-IT'));
            })



        });
    </script>
@endpush
