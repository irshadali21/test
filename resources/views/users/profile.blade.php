@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-5">
            <div class="card-body">
                @can('update-user')
                {!! Form::open(['route' => ['profile.update'], 'method'=>'post', 'files' => true]) !!}
                @endcan
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                {{ Form::label('code', 'CODE:', ['class' => 'form-control-label']) }}
                                <span> {{ $user->code }}</span>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                {{ Form::label('name', 'Name', ['class' => 'form-control-label']) }}
                                {{ Form::text('name', $user->name, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="col-md-4">
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
                            
                        </div>
                        <div class="col-md-2">
                            @if ($user->advoiser_stamp)
                                <a href="{{ asset($user->advoiser_stamp) }}" target="_blank">
                                    <img alt="Image placeholder"
                                    class="avatar avatar-xl  rounded-circle"
                                    data-toggle="tooltip" data-original-title="{{ $user->name }} Logo"
                                    src="{{ asset($user->advoiser_stamp) }}">
                                </a>
                            @endif
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                {{ Form::label('ofc_address', 'OFFICE ADDRESS ', ['class' => 'form-control-label']) }}
                                {{ Form::text('ofc_address', $user->ofc_address, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                {{ Form::label('accountant_reg_no', 'REGISTRATION NUMBER IN THE REGISTER OF ACCOUNTANTS', ['class' => 'form-control-label']) }}
                                {{ Form::text('accountant_reg_no', $user->accountant_reg_no, ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                {{ Form::label('acc_city', 'CITY OF THE REGISTER OF ACCOUNTANTS ', ['class' => 'form-control-label']) }}
                                {{ Form::text('acc_city', $user->acc_city, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                {{ Form::label('auditor_reg_no', 'REGISTRATION NUMBER IN THE REGISTER OF AUDITORS', ['class' => 'form-control-label']) }}
                                {{ Form::text('auditor_reg_no', $user->auditor_reg_no, ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                {{ Form::label('email_pec', 'EMAIL-PEC ', ['class' => 'form-control-label']) }}
                                {{ Form::text('email_pec', $user->email_pec, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                {{ Form::label('ofc_name', 'OFFICE NAME', ['class' => 'form-control-label']) }}
                                {{ Form::text('ofc_name', $user->ofc_name, ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                {{ Form::label('insurance_no', 'INSURANCE POLICY NUMBER ', ['class' => 'form-control-label']) }}
                                {{ Form::text('insurance_no', $user->insurance_no, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                {{ Form::label('insurance_company', 'INSURANCE POLICY COMPANY NAME ', ['class' => 'form-control-label']) }}
                                {{ Form::text('insurance_company', $user->insurance_company, ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Login information</h6>
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
                                {{ Form::email('email', $user->email, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                {{ Form::label('role', 'Select Role', ['class' => 'form-control-label']) }}
                                    {{ Form::select('role', $roles, $user->roles, [ 'class'=> 'selectpicker form-control', 'placeholder' => 'Select role...']) }}
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
                                {{ Form::label('password_confirmation', 'Confirm password', ['class' => 'form-control-label']) }}
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
                                <input type="checkbox" name="status" value="1" class="custom-control-input"
                                    id="status" checked>
                                {{ Form::label('status', 'Status', ['class' => 'custom-control-label']) }}
                            </div>
                        </div>
                        
                            @can('update-user')
                            <div class="col-md-12">
                                {{ Form::submit('Submit', ['class'=> 'mt-5 btn btn-primary']) }}
                            </div>
                            @endcan
                        </div>
                    </div>
                @can('update-user')
                {!! Form::close() !!}
                @endcan
            </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
        jQuery(document).ready(function(){
            jQuery('#uploadFile').filemanager('file');
        })
    </script>
@endpush
