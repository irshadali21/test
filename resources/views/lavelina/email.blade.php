<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $company_name ?? '' }}</title>
    <link type="text/css" href="{{ asset('bootstrap/css/bootstrap.css') }}" rel="stylesheet" />
    <link type="text/css" href="{{ asset('bootstrap/js/bootstrap.js') }}" rel="stylesheet" />
    {{-- <link type="text/css" href="{{ asset('css/certificate.css') }}" rel="stylesheet" /> --}}
    <link type="text/css" href="{{ asset('css/levelina.css') }}" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prata&family=Roboto:wght@100&display=swap" rel="stylesheet">
    <style>

    </style>
</head>

<div id="footer">
    <table class="w-100" style="background-color: {{ $color }};">
        <tr>
            <td>
                <p
                    style="font-family: 'Prata', serif; margin-left: 65px; color: white; margin-bottom: 0px; font-size:5px;">
                    Powered by</p>
                <img src="{{ $logo }}" alt="" width="80px" height="35px" style="margin-left: 40px;">
            </td>
            <td>
                <div
                    style=" font-family: 'Prata', serif;font-size:10px; text-align: center; color: white; margin-top: -6px;
                margin-bottom: -1px;">
                    Se pensi che hai diritto a usufruire
                    dell’agevolazione o se hai dubbi in merito contattaci: </div>
                <div
                    style="font-family: 'Prata', serif; text-align: center; margin-top: -20px;
                    margin-bottom: -1px; padding: -1px">
                    <a href="mailto:info@solidanetwork.com"
                        style="font-family: 'Prata', serif; font-size:10px; color: white; margin-top: -15px;
                        margin-bottom: -1px; padding: -1px">info@solidanetwork.com</a>
                </div>
                <div
                    style="font-family: 'Prata', serif; font-size:10px; color: white; text-align: center;
        margin-bottom: -1px; padding: -1px">
                    tel 0828307850</div>
            </td>
        </tr>
    </table>
</div>

<body style="margin-top: 0px">

    <div>

        <center class="levelinahead"
            style="
            margin-left: -50px;
            margin-right: -50px;
            margin-top: -70px;
            background-image: url('{{ $background_image }}');
            background-size: cover;">
            <br>
            <strong>
                <br><br>
                <span style="font-family: 'Prata', serif;font-size: 80px; color:{{ $color }}; font-weight:400">LA
                    VELINA </span>
                <br>
                <span style=" font-family: 'Prata', serif;font-size:25px; color:{{ $color }};">DEL TUO
                    COMMERCIALISTA</span>
                <br>
                <br>
                <span style="font-family: 'Prata', serif;font-size:18px;">{{ $advoiser_name }}</span>
                <br>
                <br>
                <span> {{ $date }}</span><br>
            </strong>
            <br>
        </center>
        <br>

        @php

            if ($body) {
                $count = count($body);
                $count = $count - 1;
            }
        @endphp
    </div>
    <div style="clear:both; position:relative;  margin-left: -10px">

        <div style="color:{{ $color }};font-size:25px; width: 100%;">{!! $title !!}</div>
        <br>

        @if ($firms)
            <div style="margin-bottom: 5px; border: 3px solid {{ $color }};padding: 5px; width: 100%;">
                <div style=" text-justify: inter-word">{!! $firms !!}</div>
            </div>
        @endif
        @if ($benefits)
            <div style="margin-bottom: 5px; border: 3px solid {{ $color }};padding: 5px; width: 100%;">
                <div>{!! $benefits !!}</div>
            </div>
        @endif
        @if ($benefits_in_number)
            <div style="margin-bottom: 5px; border: 3px solid {{ $color }};padding: 5px; width: 100%;">
                <div>{!! $benefits_in_number !!}</div>
            </div>
        @endif
        @if ($tax_breack)
            <div style="margin-bottom: 5px; border: 3px solid {{ $color }};padding: 5px; width: 100%;">
                <div>{!! $tax_breack !!}</div>
            </div>
        @endif
    </div>

    <div style="clear:both; position:relative; page-break-after: always; margin-left: -10px">

        <div style="position:absolute; left:0pt; width:270pt; vertical-align: top;">

            <div>
                @if ($count >= 0)
                    {!! $body[0]->lavelina_body !!}
                @endif
            </div>
        </div>
        <div style="position:absolute; margin-left:295pt; vertical-align: top">
            <div style=" width:245pt">
                @if ($count >= 1)
                    {!! $body[1]->lavelina_body !!}
                @endif
            </div>
        </div>
    </div>

    <div
        style="clear:both; position:relative;  vertical-align: top; @if ($count > 3) page-break-after: always; @endif margin-left: -10px;">
        <div style="position:absolute; left:0pt; width:270pt; vertical-align: top;">
            <div>
                @if ($count >= 2)
                    {!! $body[2]->lavelina_body !!}
                @endif
            </div>
        </div>


        <div style="position:absolute; margin-left:295pt; vertical-align: top">
            <div style=" width:245pt">
                @if ($count >= 3)
                    {!! $body[3]->lavelina_body !!}
                @endif
            </div>
        </div>
    </div>

    <div
        style="clear:both; position:relative;  vertical-align: top; @if ($count > 5) page-break-after: always; @endif margin-left: -10px;">
        <div style="position:absolute; left:0pt; width:270pt; vertical-align: top;">
            <div>
                @if ($count >= 4)
                    {!! $body[4]->lavelina_body !!}
                @endif
            </div>
        </div>
        <div style="position:absolute; margin-left:295pt; vertical-align: top">
            <div style=" width:245pt">
                @if ($count >= 5)
                    {!! $body[5]->lavelina_body !!}
                @endif
            </div>
        </div>
    </div>


    <div style="clear:both; position:relative;  vertical-align: top; margin-left: -10px;">
        <div style="position:absolute; left:0pt; width:270pt; vertical-align: top;">
            <div>
                @if ($count >= 6)
                    {!! $body[6]->lavelina_body !!}
                @endif
            </div>
        </div>
        <div style="position:absolute; margin-left:295pt; vertical-align: top">
            <div style=" width:260pt">
                @if ($count >= 7)
                    {!! $body[7]->lavelina_body !!}
                @endif
            </div>
        </div>
    </div>


    <br>
    <br>
    <br>


    @if ($source)
        <div style="clear:both; position:relative;  vertical-align: top;  margin-left: -10px; margin-bottom: 30px;">
            <div class="last" style="width: 100%;">
                <strong>Fonti: </strong>
                <div>{!! $source !!}</div>
            </div>
        </div>
    @endif
</body>
</html>
