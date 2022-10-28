@extends('layouts.app')
@push('pg_btn')
    @can('update-file')
        <div class="btn-group ">
            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="true">Assignment Options</button>
            <div class="dropdown-menu "
                style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -183px, 0px);"
                x-placement="top-start">
                <a class="dropdown-item" href="{{ route('files.client_assignment', $file->id) }}">Email to Client</a>
                <a class="dropdown-item" href="{{ route('files.client_assignment_download', $file->id) }}">Download for
                    Client</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('files.advoiser_assignment', $file->id) }}">Email to Advoiser</a>
                <a class="dropdown-item" href="{{ route('files.advoiser_assignment_download', $file->id) }}">Download for
                    Advoiser</a>
            </div>
        </div>
        <a class="btn btn-info btn-sm m-1" href="{{ route('files.edit', $file->id) }}">
            <i class="fa fa-edit" aria-hidden="true"></i> Edit File
        </a>
    @endcan
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            Name
                        </div>
                        <div class="col-sm-6">
                            <strong>{{ $file->company->company_name }}</strong>
                        </div>
                        <div class="col-sm-8 text-right">
                            {{-- @if ($file->profile_photo)
                                <a href="{{ asset($file->profile_photo) }}" target="_blank">
                                    <img width="100" height="100" class="img-fluid rounded-pill" src="{{ asset($file->profile_photo) }}" alt="">
                                </a>
                            @endif --}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            Customer Email
                        </div>
                        <div class="col-sm-6">
                            <strong>{{ $file->customer_email }}</strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            Phone
                        </div>
                        <div class="col-sm-6">
                            <strong>{{ $file->company->phone_number }}</strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            Creditsafe Rating
                        </div>
                        <div class="col-sm-6">
                            <strong>{{ $file->company->creditsafe_rating }}</strong>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            Credits
                        </div>
                        <div class="col-sm-6">
                            <strong>{{ $file->company->credit }}</strong>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            Company Address
                        </div>
                        <div class="col-sm-6">
                            <strong>{{ $file->company->company_address }}</strong>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            Company Aadministrator
                        </div>
                        <div class="col-sm-6">
                            <strong>{{ $file->company->company_administrator }}</strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            Year
                        </div>
                        <div class="col-sm-6">
                            <strong>{{ $file->year }}</strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            Benefits
                        </div>
                        <div class="col-sm-6">
                            <strong>{{ $file->benefit->column1 }}</strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            Advisor
                        </div>
                        <div class="col-sm-6">
                            @if ($advisor->deleted_at)
                                <strong style="color: red"> This Advisor is deleted please change it before sending/creating files  </strong>
                            @else
                            <strong>{{ $advisor->name }}</strong>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            FILE CREATION DATE
                        </div>
                        <div class="col-sm-6">
                            @php
                              $date=  \Carbon\Carbon::createFromFormat('Y-m-d H:m:s', $file->created_at)->format('d/m/Y H:m:s');
                            // dd($date);
                            @endphp
                            <strong>{{ $date }}</strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            INCARICO_CLI SEND DATE
                        </div>
                        <div class="col-sm-6">
                            @foreach ($EmailTrackCLI as $item)
                                <strong> {{ $item->date }}</strong> <br>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            INCARICO_REV SEND DATE
                        </div>
                        <div class="col-sm-6">
                            @foreach ($EmailTrackREV as $item)
                                <strong> {{ $item->date }}</strong> <br>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            CERTIFICATE SEND DATE
                        </div>
                        <div class="col-sm-6">
                            @foreach ($EmailTrackCertificate as $item)
                                <strong> {{ $item->created_at }}</strong> <br>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            CERTIFICATE PAYIED
                        </div>
                        <div class="col-sm-6">
                            @if ($file->certificate)
                                @if ($file->certificate->status == 1)
                                    <strong>Paid</strong>
                                @else
                                    <strong>Not Paid</strong>
                                @endif
                            @else
                                <strong>Certificate Not created</strong>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            DATE PAYMENT
                        </div>
                        <div class="col-sm-6">
                            @if ($file->certificate)
                                @if ($file->certificate->status == 1)
                                    <strong>{{ $file->certificate->paid_date }}</strong>
                                @else
                                    <strong>Not Paid</strong>
                                @endif
                            @else
                                <strong>Certificate Not created</strong>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endsection
