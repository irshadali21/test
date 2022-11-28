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
                <p style="margin-left: 40px; color: white; margin-bottom: 0px; font-size:5px;"> Powered by</p>
                <img src="{{ $logo }}" alt="" width="80px" height="35px" style="margin-left: 40px;">
            </td>
            <td>
                <p
                    style="font-size:10px; text-align: center; color: white; margin-top: -6px;
                margin-bottom: -1px;">
                    Se pensi che hai diritto a usufruire
                    dell’agevolazione o se hai dubbi in merito contattaci: </p>
                <p style="text-align: center; margin-top: -6px;
        margin-bottom: -1px; padding: -1px"> <a
                        href="mailto:contact@solidanetwork.com"
                        style="font-size:10px; color: white; margin-top: -6px;
        margin-bottom: -1px; padding: -1px">contact@solidanetwork.com</a>
                </p>
                <p
                    style="font-size:10px; color: white; text-align: center;margin-top: -6px;
        margin-bottom: -1px; padding: -1px">
                    tel 081555655</p>
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
            margin-top: -50px;
            background-image: url('{{ $background_image }}');  
            background-size: cover;">
            <br><br>
            <strong>
                <span style="font-size: 80px; color:{{ $color }}; font-weight:400">LA VELINA </span><br>
                <span style="font-size:25px; color:{{ $color }};">DEL TUO COMMERCIALISTA</span><br>
                <span style="font-size:18px;"> DOTT . {{ $advisor }}</span><br>
            </strong>
            <br>
        </center>
        <br>

        @php
            
            if ($body) {
                $count = count($body);
            }
        @endphp

        {{-- <table style="page-break-after: always;">
            <body>
                <tr>
                    <td style="vertical-align: top;">
                        <div style="color:{{ $color }};font-size:25px;">{!! $title !!}</div>
                        <br>
                        <div style="font-size:15px;">
                            @if ($count > 0)
                                {!! $body[0]->lavelina_body !!}
                            @endif
                        </div>
                    </td>
                    <td style="vertical-align: top;width: 300px;">
                        @if ($firms)
                            <div style="border: 3px solid {{ $color }};margin-left: 10px;padding: 5px;">
                                <strong>Chi può avere l'agevolazione:</strong>
                                <div style="font-size:15px;">{!! $firms !!}</div>
                            </div>
                            <br>
                        @endif
                        @if ($benefits)
                            <div style="border: 3px solid {{ $color }};margin-left: 10px;padding: 5px;">
                                <strong> Per cosa:</strong>
                                <div style="font-size:15px;">{!! $benefits !!}</div>
                            </div>
                            <br>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top;">
                        <div style="font-size:15px;">
                            @if ($count > 1)
                                {!! $body[1]->lavelina_body !!}
                            @endif
                        </div>
                    </td>
                    <td style="vertical-align: top;width: 300px;">
                        @if ($firms)
                            <div style="border: 3px solid {{ $color }};margin-left: 10px;padding: 5px;">
                                <strong>Chi può avere l'agevolazione:</strong>
                                <div style="font-size:15px;">{!! $firms !!}</div>
                            </div>
                            <br>
                        @endif
                        @if ($benefits)
                            <div style="border: 3px solid {{ $color }};margin-left: 10px;padding: 5px;">
                                <strong> Per cosa:</strong>
                                <div style="font-size:15px;">{!! $benefits !!}</div>
                            </div>
                            <br>
                        @endif
                    </td>
                </tr>

            </body>
        </table>
        <div>
            <div style="font-size:15px;">
                @if ($count > 2)
                    {!! $body[2]->lavelina_body !!}
                @endif
                @if ($count > 3)
                    {!! $body[3]->lavelina_body !!}
                @endif
                @if ($count > 4)
                    {!! $body[4]->lavelina_body !!}
                @endif
                @if ($count > 5)
                    {!! $body[5]->lavelina_body !!}
                @endif
                <br>
                <br>
                <br>
            </div>
            <div></div>
            @if ($source)
                <div class="last">
                    <strong>Fonti: </strong>
                    <div style="font-size:12px;">{!! $source !!}</div>
                </div>
            @endif
        </div> --}}
    </div>



    <div style="clear:both; position:relative; page-break-after: always;">
        <div style="position:absolute; left:0pt; width:300pt; vertical-align: top;">
            <div style="color:{{ $color }};font-size:25px; width:300pt">{!! $title !!}</div>
            <br>
            <div style="font-size:15px; width:280pt">
                @if ($count > 0)
                    {!! $body[0]->lavelina_body !!}
                @endif
            </div>
        </div>
        <div style="margin-left:305pt; vertical-align: top">
            @if ($firms)
                <div style="border: 3px solid {{ $color }};margin-left: 10px;padding: 5px;">
                    <div style="font-size:15px; text-justify: inter-word">{!! $firms !!}</div>
                </div>
                <br>
            @endif
            @if ($benefits)
                <div style="border: 3px solid {{ $color }};margin-left: 10px;padding: 5px;">
                    <div style="font-size:15px;">{!! $benefits !!}</div>
                </div>
                <br>
            @endif
        </div>
    </div>


    @if (!empty($benefits_in_number) || !empty($tax_breack))

        <div style="clear:both; position:relative; vertical-align: top; page-break-after: always;">
            <div style="position:absolute; left:0pt; width:300pt;">
                <div>
                    @if ($count > 1)
                        {!! $body[1]->lavelina_body !!}
                    @endif
                </div>
            </div>
            <div style="margin-left:305pt; vertical-align: top;">
                @if ($benefits_in_number)
                    <div style="border: 3px solid {{ $color }};margin-left: 10px;padding: 5px; ">
                        <div>{!! $benefits_in_number !!}</div>
                    </div>
                    <br>
                @endif
                @if ($tax_breack)
                    <div style="border: 3px solid {{ $color }};margin-left: 10px;padding: 5px;">
                        <div>{!! $tax_breack !!}</div>
                    </div>
                    <br>
                @endif
            </div>
        </div>
    @else
        @if ($count > 1)
            <div style="vertical-align: top; page-break-after: always;">
                {!! $body[1]->lavelina_body !!}
            </div>
        @endif
    @endif


    <div>
        <div style="font-size:15px;">
            @if ($count > 2)
                {!! $body[2]->lavelina_body !!}
            @endif
            @if ($count > 3)
                {!! $body[3]->lavelina_body !!}
            @endif
            @if ($count > 4)
                {!! $body[4]->lavelina_body !!}
            @endif
            @if ($count > 5)
                {!! $body[5]->lavelina_body !!}
            @endif
            <br>
            <br>
            <br>
        </div>
        <div></div>
        @if ($source)
            <div class="last">
                <strong>Fonti: </strong>
                <div style="font-size:12px;">{!! $source !!}</div>
            </div>
        @endif
    </div>
</body>


</html>
