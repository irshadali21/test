<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('assets/img/brand/favicon.ico') }}" rel="shortcut icon" type="image/x-icon" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Revman') }}</title>

    <link rel="stylesheet" href="{{asset('assets/fonts/stylesheet.css')}}">
    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}"type="text/css">
    <link rel="stylesheet" href="{{asset('assets/vendor/fontawesome4/css/font-awesome.min.css')}}"type="text/css">
    <!-- Page plugins -->
    {{-- <link rel="stylesheet" href="{{asset('assets/vendor/fullcalendar/dist/fullcalendar.min.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('assets/vendor/sweetalert2/dist/sweetalert2.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-select.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/jquery-confirm.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/dashboard.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" type="text/css">

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/node-snackbar@latest/src/js/snackbar.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/node-snackbar@latest/dist/snackbar.min.css" />

    {{-- select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    @stack('styles')
    @stack('third_party_stylesheets')
    @yield('style')
    <style>
       .select2-selection__rendered {
    line-height: 20px !important;
}
.select2-container .select2-selection--single {
    height: 45px !important;
}
.select2-selection__arrow {
    height: 34px !important;
}
    </style>
</head>

<body >

@include('includes.navbar')
<div class="main-content" id="panel" style="background-color: white">
    @include('includes.header')
    @include('includes.page-header')
    <div class="container-fluid mt--6" >
        <div style="background-color: white">

            @yield('content')
        </div>
    </div>
    <script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/js-cookie/js.cookie.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>

    <script src="{{asset('assets/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-confirm.min.js')}}"></script>
    <script src="{{asset('assets/js/dashboard.js')}}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    {{-- select2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script>
    $('#flash-overlay-modal').modal();
    jQuery(document).ready(function() {
        jQuery('.select2').select2();
    });

function changeLanguage(locale) {
        event.preventDefault();
        document.getElementById('current-language').value = locale;
        document.getElementById('languages-form').submit();
    }

    $('.datatable').DataTable({
                language: {
                    lengthMenu: '{{ __("lang.lengthMenu") }}',
                    zeroRecords: '{{ __("lang.zeroRecords") }}',
                    info: '{{ __("lang.info") }}',
                    infoEmpty: '{{ __("lang.infoEmpty") }}',
                    infoFiltered: '{{ __("lang.infoFiltered") }}',
                },
            });
</script>
    @stack('scripts')
    @stack('third_party_scripts')
    @yield('script')
</body>
</html>
