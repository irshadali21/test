<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link type="text/css" href="{{ asset('bootstrap/css/bootstrap.css') }}" rel="stylesheet" />
    <link type="text/css" href="{{ asset('bootstrap/js/bootstrap.js') }}" rel="stylesheet" />
    <style>
        td {
            font-size: 10px;
        }

        th {
            font-size: 9px;
        }
    </style>
</head>
{{-- @dd($valina_data) --}}
<body>
    <center>
        <table class="table table-bordered table-sm">
            <thead>
                <tr style="background-color:lightblue ">
                    <th><center> ID</center></th>
                    <th><center> {{ __('lang.VALINA Name') }}</center></th>
                    <th><center>{{ __('lang.CREATION Date') }}</center></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> <center><b><a href="{{ route('lavelina.show', $valina_data['valina_id']) }}">{{ $valina_data['valina_id']}}</a></b></center> </td>
                    <td><center><b> <a href="{{ route('lavelina.show', $valina_data['valina_id']) }}">{{ $valina_data['name'] }}</a> </b></center></td>
                    <td><center><b> <a href="{{ route('lavelina.show', $valina_data['valina_id']) }}">{{ $valina_data['date'] }}</a> </b></center></td>
                </tr>
            </tbody>
        </table>
    </center>


    <table class="table table-bordered table-sm">
        <thead>
            <tr style="background-color:rgb(239, 217, 161) ">
                {{-- <th>#</th> --}}
                <th>{{ __('lang.VAT Number') }}</th>
                <th>{{ __('lang.Company Name') }}</th>
                <th>{{ __('lang.SEND DATE') }}</th>
                <th>{{ __('lang.Cluster') }}</th>

            </tr>
        </thead>
        <tbody>
            {{-- @dd($data) --}}
            @foreach ($data as $file)
                {{-- {{ dd($file) }} --}}

                <tr>
                    {{-- <th>{{ $loop->iteration }}</th> --}}
                    <td><b>{{ $file['vat'] }}</b></td>
                    <td><b>{{ $file['name'] }}</b></td>
                    <td><b>{{ $file['date'] }}</b></td>
                    <td><b>{{ $file['cluster'] }}</b></td>


                </tr>
            @endforeach

        </tbody>
    </table>


</body>

</html>
