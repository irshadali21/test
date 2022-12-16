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
                <span style="font-family: 'Prata', serif;font-size: 80px; color:{{ $color }}; font-weight:400">LA
                    VELINA </span><br>
                <span style="font-family: 'Prata', serif;font-size:25px; color:{{ $color }};">DEL TUO
                    COMMERCIALISTA</span><br>
                <span style="font-family: 'Prata', serif;font-size:18px;"> FIRM ADVISOR NAME </span><br>
                <span style="font-size:15px;"> {{ $date }}</span><br>
            </strong>
            <br>
        </center>
        <br>

        @php
            
            if ($body) {
                $count = count($body);
                $count = $count-1;
                
            }
        @endphp
    </div>
    <div style="clear:both; position:relative; page-break-after: always; margin-left: -20px">

        <div style="color:{{ $color }};font-size:25px;">{!! $title !!}</div> 
        <br>

        @if ($firms)
            <div style="border: 3px solid {{ $color }};padding: 5px;">
                <div style="font-size:15px; text-justify: inter-word">{!! $firms !!}</div>
            </div>
            <br>
        @endif
        @if ($benefits)
            <div style="border: 3px solid {{ $color }};padding: 5px;">
                <div style="font-size:15px;">{!! $benefits !!}</div>
            </div>
            <br>
        @endif
        @if ($benefits_in_number)
            <div style="border: 3px solid {{ $color }};padding: 5px; ">
                <div>{!! $benefits_in_number !!}</div>
            </div>
            <br>
        @endif
        @if ($tax_breack)
            <div style="border: 3px solid {{ $color }};padding: 5px;">
                <div>{!! $tax_breack !!}</div>
            </div>
            <br>
        @endif


        <div style="position:absolute; left:0pt; width:300pt; vertical-align: top;">

            <div style="font-size:15px; width:280pt">
                @if ($count >= 0)
                    {!! $body[0]->lavelina_body !!}
                @endif
            </div>
        </div>
        <div style="position:absolute; margin-left:305pt; vertical-align: top">
            <div style="font-size:15px; width:260pt">
                @if ($count >= 1)
                    {!! $body[1]->lavelina_body !!}
                @endif
            </div>
        </div>
    </div>

    @if ($count > 3)
        <div style="vertical-align: top; page-break-after: always; margin-left: -20px;">
        @else
            <div style="margin-left: -20px;">
    @endif
    <div style="position:absolute; left:0pt; width:280pt; vertical-align: top;">
        <div style="font-size:15px; width:280pt">
            @if ($count >= 2)
                {!! $body[2]->lavelina_body !!}
            @endif
        </div>
    </div>
    <div style="position:absolute; margin-left:305pt; vertical-align: top">
        <div style="font-size:15px; width:260pt">
            @if ($count >= 3)
                {!! $body[3]->lavelina_body !!}
            @endif
        </div>
    </div>
    </div>

    @if ($count > 5)
        <div style="vertical-align: top; page-break-after: always; margin-left: -20px;">
        @else
            <div style="margin-left: -20px;">
    @endif
    <div style="position:absolute; left:0pt; width:280pt; vertical-align: top;">
        <div style="font-size:15px; width:280pt">
            @if ($count >= 4)
                {!! $body[4]->lavelina_body !!}
            @endif
        </div>
    </div>
    <div style="position:absolute; margin-left:305pt; vertical-align: top">
        <div style="font-size:15px; width:260pt">
            @if ($count >= 5)
                {!! $body[5]->lavelina_body !!}
            @endif
        </div>
    </div>
    </div>


    <div style="margin-left: -20px">
        <div style="position:absolute; left:0pt; width:280pt; vertical-align: top;">
            <div style="font-size:15px; width:280pt">
                @if ($count >= 6)
                    {!! $body[6]->lavelina_body !!}
                @endif
            </div>
        </div>
        <div style="position:absolute; margin-left:305pt; vertical-align: top">
            <div style="font-size:15px; width:260pt">
                @if ($count >= 7)
                    {!! $body[7]->lavelina_body !!}
                @endif
            </div>
        </div>
    </div>


    <br>
    <br>
    <br>
    </div>

    @if ($source)
        <div class="last">
            <strong>Fonti: </strong>
            <div>{!! $source !!}</div>
        </div>
    @endif
    </div>
</body>
</html>
