@extends('layouts.app')
@push('styles')
    <style>
        .inputfile {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }
    </style>
@endpush
@push('pg_btn')
    <a href="{{ route('users.index') }}" class="btn btn-sm btn-neutral">{{ __('lang.All Users') }}</a>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                    {!! Form::open(['route' => 'users.store', 'files' => true]) !!}
                    <h6 class="heading-small text-muted mb-4">User information</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label('code', 'CODE:', ['class' => 'form-control-label']) }}
                                    <span> {{ $code }}</span>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label('name', __('lang.profileName'), ['class' => 'form-control-label']) }}
                                    {{ Form::text('name', null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            {{-- <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label('advoiser_stamp', 'Advoiser Stamp / signature', ['class' => 'form-control-label']) }}
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <a id="uploadFile" data-input="thumbnail" data-preview="holder"
                                                class="btn btn-secondary">
                                                <i class="fa fa-picture-o"></i> Choose Photo
                                            </a>
                                        </span>
                                        <input id="thumbnail" class="form-control d-none" type="text"
                                            name="advoiser_stamp">
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::label('advoiser_stamp', __('lang.Advisor Stamp/Signature'), ['class' => 'form-control-label']) }}
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <input name="advoiser_stamp" accept="image/*" type='file' id="imgInp"
                                                class="inputfile" />
                                            <label for="imgInp" class="btn btn-secondary">Choose Photo</label>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <span id="avatar_image"><i class="far avatar avatar-xl fa-user"></i> </span>
                                <img alt="Image placeholder" class="avatar avatar-xl" src="#"
                                    id="selected_avatar_image" style="display: none;">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label('ofc_address', __('lang.Office Address'), ['class' => 'form-control-label']) }}
                                    {{ Form::text('ofc_address', null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label('accountant_reg_no', __('lang.REGISTRATION NUMBER IN THE REGISTER OF ACCOUNTANTS'), ['class' => 'form-control-label']) }}
                                    {{ Form::text('accountant_reg_no', null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label('acc_city', __('lang.CITY OF THE REGISTER OF ACCOUNTANTS'), ['class' => 'form-control-label']) }}
                                    {{ Form::text('acc_city', null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label('auditor_reg_no', __('lang.REGISTRATION NUMBER IN THE REGISTER OF AUDITORS'), ['class' => 'form-control-label']) }}
                                    {{ Form::text('auditor_reg_no', null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label('email_pec', __('lang.EMAIL PEC'), ['class' => 'form-control-label']) }}
                                    {{ Form::text('email_pec', null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label('ofc_name', __('lang.OFFICE NAME'), ['class' => 'form-control-label']) }}
                                    {{ Form::text('ofc_name', null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label('insurance_no', __('lang.INSURANCE POLICY NUMBER'), ['class' => 'form-control-label']) }}
                                    {{ Form::text('insurance_no', null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label('insurance_company', __('lang.INSURANCE POLICY COMPANY NAME'), ['class' => 'form-control-label']) }}
                                    {{ Form::text('insurance_company', null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4" />
                    <!-- Address -->
                    <h6 class="heading-small text-muted mb-4">{{ __('lang.Login information') }}</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            {{-- <div class="col-lg-6">
                                    <div class="form-group">
                                        {{ Form::label('phone_number', 'Phone number', ['class' => 'form-control-label']) }}
                                        {{ Form::text('phone_number', null, ['class' => 'form-control']) }}
                                    </div>
                                </div> --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label('email', 'E-mail', ['class' => 'form-control-label']) }}
                                    {{ Form::email('email', null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label('role', __('lang.Select role'), ['class' => 'form-control-label']) }}
                                    {{ Form::select('role', $roles, null, ['class' => 'form-control', 'placeholder' => 'Select role...']) }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('password', 'Password', ['class' => 'form-control-label']) }}
                                    {{ Form::password('password', ['class' => 'form-control']) }}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('password_confirmation', __('lang.Confirm password'), ['class' => 'form-control-label']) }}
                                    {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4" />
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="status" value="1"  checked class="custom-control-input"
                                        id="status">
                                    {{ Form::label('status', 'Status', ['class' => 'custom-control-label']) }}
                                </div>
                            </div>
                            <div class="col-md-12">
                                {{ Form::submit(__('lang.Submit'), ['class' => 'mt-5 btn btn-secondary']) }}
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
       jQuery(document).ready(function() {
            jQuery('#uploadFile').filemanager('file');
            ///adding image preview
            imgInp.onchange = evt => {
                const [file] = imgInp.files;
                if (file) {
                    jQuery('#avatar_image').hide();
                    jQuery('#selected_avatar_image').show();
                    jQuery('#selected_avatar_image').attr('src', URL.createObjectURL(file));
                }
            }


        })
    </script>
@endpush
