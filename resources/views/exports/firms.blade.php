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
            <th>Advisor Name</th>
            <th>COMPANY</th>
            <th>VAT</th>
            <th>Type</th>
            <th>Province</th>
            <th>Category</th>
            <th>Phone</th>
            <th>Contact Person</th>
            <th>Email</th>
            {{-- <th>Emai2</th> --}}
            <th>Sector</th>
            <th>Ateco Code</th>
        </thead>
        <tbody>
            @for ($i = 0; $i < count($data); $i++)
            <tr>
                <td>{{ $data[$i]['advisor'] }}</td>
                <td>{{ $data[$i]['name'] }}</td>
                <td>{{ $data[$i]['vat'] }}</td>
                <td>{{ $data[$i]['type'] }}</td>
                <td>{{ $data[$i]['province'] }}</td>
                <td>{{ $data[$i]['category'] }}</td>
                <td>{{ $data[$i]['phone'] }}</td>
                <td>{{ $data[$i]['contact_person'] }}</td>
                <td>{{ $data[$i]['email'] }}</td>
                {{-- <td>{{ $data[$i]['email2'] }}</td> --}}
                <td>{{ $data[$i]['sector'] }}</td>
                <td>{{ $data[$i]['ateco'] }}</td>
            </tr>
            @endfor

        </tbody>
    </table>


</body>

</html>
