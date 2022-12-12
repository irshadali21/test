@extends('layouts.app')
@push('styles')
    <style>
        .link-black:link {
  color: #32325d;
}
    </style>
@endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <center>
            <div class="row mb-2">
                <div class="col-xl-3 col-md-6">
                        <h1 style="margin-top: -20px">{{ __('lang.Restricted area') }}</h1>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <img src="{{ asset('image/signature/Solida_footer.png') }}" width="150px" height="70px" class="mb-1" style="margin-top: -40px">
                    </div>
                </div>
            </div>
        </center>
    </section>

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats" style="background-color: #e4e3e3">
                <div class="card-body" style="height: 110px">
                    <center class="h2 font-weight-bold mt-2"><a href="{{ route('firms.index') }}" class="text-black link-black">{{ __('lang.imported_compnies') }}</a>  </center>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats" style="background-color: #e4e3e3">
                <div class="card-body" style="height: 110px">
                    <center class="h2 font-weight-bold mt-2">{{  __('lang.imported_compnies_count1')  }}{{ $total_firms }} {!! __('lang.imported_compnies_count2') !!}</center>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats" style="background-color: #e4e3e3">
                <div class="card-body" style="height: 110px">
                    <center class="h2 font-weight-bold mt-2"><a href="{{ route('certificate.index') }}" class="text-black link-black">{{ __('lang.practices') }}</a></center>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats" style="background-color: #e4e3e3">
                <div class="card-body" style="height: 110px">
                    <center class="h2 font-weight-bold mt-2">{{  __('lang.files1')  }}{{ $total_files }} {!! __('lang.files2') !!}</center>
                </div>
            </div>
        </div>

        {{-- <div class="col-xl-3 col-md-6">
            <div class="card card-stats" style="background-color: #e4e3e3">
                <!-- Card body -->
                <div class="card-body" style="height: 110px">
                    <center class="h2 font-weight-bold mt-2" >Le tue aziende</center>
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0" >
                                Le tue aziende</h5>
                            <span class="h2 font-weight-bold mb-0">350,897</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                <i class="ni ni-active-40"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats" style="background-color: #F0F1F5">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">New users</h5>
                            <span class="h2 font-weight-bold mb-0">2,356</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                <i class="ni ni-chart-pie-35"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats" style="background-color: #F0F1F5">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Sales</h5>
                            <span class="h2 font-weight-bold mb-0">924</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                <i class="ni ni-money-coins"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats" style="background-color: #F0F1F5">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
                            <span class="h2 font-weight-bold mb-0">49,65%</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                <i class="ni ni-chart-bar-32"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div>
            </div>
        </div> --}}
    </div>


    {{-- ============= --}}



    <div class="card">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <center>
                        <h1>{{ __('lang.dashboard_help') }}</h1>
                    </center>
                </div>

            </div>
        </div>

    </div>
@endsection

@section('script')
    {{-- @if (Session('success'))
        <script>
            $(document).ready(function() {

                Snackbar.show({
                    text: '{{ Session('success') }}',
                    pos: 'top-right',
                    actionText: 'X',
                    // showAction: false,
                    textColor: '#00ff00', //green
                    textColor: '#ff0000', //red
                });
            });
        </script>
    @endif --}}
@endsection
