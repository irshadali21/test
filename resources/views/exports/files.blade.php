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
    td{
        font-size: 10px;
    }
    th{
        font-size: 9px;
    }
</style>
</head>

<body>
    <table class="table table-bordered table-sm" style="margin-left: -20px">
        <thead>
            <th>{{ __('lang.VAT Number') }}</th>
            <th>{{ __('lang.COMPANY') }}</th>
            <th>{{ __('lang.Phone Number') }}</th>
            <th>{{ __('lang.Email Address') }}</th>
            <th>{{ __('lang.Benefit') }}</th>
            <th>{{ __('lang.Year') }}</th>
            <th>{{ __('lang.Certificat status') }}</th>
            <th>{{ __('lang.SEND DATE') }}</th>
            <th>{{ __('lang.CERTIFI:DATE') }}</th>
            <th>FEE</th>

        </thead>
        <tbody>
            @for ($i = 1; $i < count($data); $i++)
            <tr>
                <td>{{ $data[$i]['vat'] }}</td>
                <td>{{ $data[$i]['name'] }}</td>
                <td>{{ $data[$i]['phone'] }}</td>
                <td>{{ $data[$i]['cemail'] }}</td>
                <td>{{ $data[$i]['benefit'] }}</td>
                <td>{{ $data[$i]['year'] }}</td>
                <td>{{ $data[$i]['status'] }}</td>
                <td>{{ $data[$i]['send'] }}</td>
                <td>{{ $data[$i]['issue'] }}</td>
                {{-- <td>{{ $data[$i]['payment'] }}</td> --}}
                <td>{{ $data[$i]['fee'] }}</td>
                {{-- <td>{{ $files['adname'] }}</td>
                <td>{{ $files['opration'] }}</td> --}}
            </tr>
            @endfor

        </tbody>
    </table>


</body>

</html>
