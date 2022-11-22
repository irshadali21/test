<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $company_name }}</title>
    <link type="text/css" href="{{ asset('bootstrap/css/bootstrap.css') }}" rel="stylesheet" />
    <link type="text/css" href="{{ asset('bootstrap/js/bootstrap.js') }}" rel="stylesheet" />
    <link type="text/css" href="{{ asset('css/certificate2.css') }}" rel="stylesheet" />

</head>
@php
$fmt = new NumberFormatter(($locale = 'it_IT'), NumberFormatter::DECIMAL);
@endphp
<div style="page-break-after: always;">
    <header>
        <img src="{{ $solida_logo }}" style="width: 100%; max-width: 190px; max-height: 60;">
        <br>
        <div style="border-top: 2px solid #681B2C ; margin-top:7px; "></div>
    </header>

    <body>
        <br><br><br>

        <center style="margin-left:100px; width:80%; margin-top:-5px"> 
            <strong>
                CERTIFICAZIONE RELATIVA AL CREDITO D’IMPOSTA <br>
                PER {{ $description }} <br>
                ANNUALITÀ {{ $benefits_year }} <br>
            </strong>
            ( {{ $refrance }} )
        </center>
        <br>
        <p style="margin-left: -5px;">
            Al legale rappresentante della
        </p>

        <p style="margin-left: 5px;"><i> {{ $company_name }} </i></p>
        <p style="margin-left: 5px;"><b> {{ $company_address }} </b></p>
        <p style="margin-left: 5px;">p.iva <b> {{ $vat_number }} </b></p>

        <br>
        <strong>Giudizio</strong>

        <p>
            Abbiamo svolto la revisione contabile dei costi di ricerca e sviluppo sostenuti da
            <b>{{ $company_name }}</b>
            nell’esercizio <b>{{ $benefits_year }}</b> sulla base della documentazione predisposta ai sensi della
            normativa vigente.
        </p>

        <br>
        <p><strong>Elementi alla base del giudizio</strong></p>
        <p>
            Abbiamo svolto la revisione contabile in conformità ai principi di revisione internazionali (ISAs).
            Le nostre responsabilità ai sensi di tali principi sono ulteriormente descritte nella sezione
            Responsabilità della società di revisione per la revisione contabile dei costi di formazione della
            presente relazione. Siamo indipendenti rispetto alla Società in conformità alle norme e ai principi
            in materia di etica e di indipendenza del Code of Ethics for Professional Accountants (IESBA Code)
            emesso dall’International Ethics Standards Board for Accountants applicabili alla revisione
            contabile del Prospetto. Riteniamo di aver acquisito elementi probativi sufficienti ed appropriati su
            cui basare il nostro giudizio.
        </p>
        <p><strong>Responsabilità dell’amministratore </strong></p>
        <p>
            L’amministratore è responsabile per la redazione della documentazione, e, nei termini previsti dalla
            legge, per quella parte del controllo interno dagli stessi ritenuta necessaria per consentire la
            redazione di documenti che non contengano errori significativi dovuti a frodi o a comportamenti o
            eventi non intenzionali.
        </p>
        <p>
            L’amministratore è responsabile per la valutazione della capacità della Società di continuare ad
            operare come un’entità in funzionamento e, nella redazione della documentazione, per
            l’appropriatezza dell’utilizzo del presupposto della continuità aziendale, nonché per una adeguata
            informativa in materia. Gli amministratori utilizzano il presupposto della continuità aziendale nella
            redazione della documentazione a meno che abbiano valutato che sussistono le condizioni per la
            liquidazione della Società o per l’interruzione dell’attività o non abbiano alternative realistiche a tali
            scelte.
        </p>


    </body>

    <footer>
        <div style="border-top: 2px solid #681B2C; margin-bottom: 7px; "></div>
        <div class="footer_setting">
            SOLIDA S.R.L.
        </div>
        <div class="footer_setting">
            Via Stella 1/G - 84091 Battipaglia (Sa) IT
        </div>
        <div class="footer_setting">
            p.iva 05829650653
        </div>
        <div class="footer_setting">
            <a href="mailto:info@solidanetwork.com">info@solidanetwork.com</a>
        </div>
        <div class="footer_setting">
            Capitale sociale 20.000 € i.v. <span style="float:right; font-size: 9px">pagina 1</span>
        </div>
    </footer>
</div>

<div style="page-break-after: always;">
    <header>
        <img src="{{ $solida_logo }}" style="width: 100%; max-width: 190px; max-height: 60;">
        <br>
        <div style="border-top: 2px solid #681B2C ; margin-top:7px; "></div>
    </header>

    <body>
        <br><br><br>
        <p style="margin-top: -9px">
            L’amministratore è responsabile per la valutazione di carattere tecnico in ordine all'ammissibilità
            al credito d’imposta per le attività di formazione svolte dall'impresa e la prova di dimostrare che le
            spese sostenute attengano effettivamente ad attività di formazione rimane in carico al legale
            rappresentante della società.
        </p>

        <p><strong>Responsabilità della società di revisione per la revisione contabile dei costi di
                formazione. </strong></p>
        <p>
            I nostri obiettivi sono l’acquisizione di una ragionevole sicurezza che la documentazione prodotta
            non contenga errori significativi, dovuti a frodi o a comportamenti o eventi non intenzionali, e
            l’emissione di una <strong> certificazione contabile che attesti che le spese siano state effettivamente
                sostenute e la regolarità formale della documentazione contabile relativa ai costi di
                formazione.
            </strong>
        </p>
        <p>
            Per ragionevole sicurezza si intende un livello elevato di sicurezza che, tuttavia, non fornisce la
            garanzia che una revisione contabile svolta in conformità ai principi di revisione internazionali
            (ISAs) individui sempre un errore significativo, qualora esistente. Gli errori possono derivare da
            frodi o da comportamenti o eventi non intenzionali e sono considerati significativi qualora ci si
            possa ragionevolmente attendere che essi, singolarmente o nel loro insieme, siano in grado di
            influenzare le decisioni economiche degli utilizzatori prese sulla base della documentazione
            prodotta.
        </p>
        <p>
            Nell’ambito della revisione contabile svolta in conformità ai principi di revisione internazionali
        </p>
        <p>
            (ISAs), abbiamo esercitato il giudizio professionale e abbiamo mantenuto lo scetticismo
            professionale per tutta la durata della revisione contabile. Inoltre:
        </p>

        <ul>
            <li>
                <p style="margin-top: -2px">
                    abbiamo identificato e valutato i rischi di errori significativi nel Prospetto, dovuti a frodi o a
                    comportamenti o eventi non intenzionali; abbiamo definito e svolto procedure di revisione
                    in risposta a tali rischi; abbiamo acquisito elementi probativi sufficienti ed appropriati su cui
                    basare il nostro giudizio. Il rischio di non individuare un errore significativo dovuto a frodi è
                    più elevato rispetto al rischio di non individuare un errore significativo derivante da
                    comportamenti o eventi non intenzionali, poiché la frode può implicare l’esistenza di
                    collusioni, falsificazioni, omissioni intenzionali, rappresentazioni fuorvianti o forzature del
                    controllo interno;
                </p>
            </li>
            <li>
                <p style="margin-top: -2px">
                    abbiamo acquisito una comprensione del controllo interno rilevante ai fini della revisione
                    contabile allo scopo di definire procedure di revisione appropriate nelle circostanze e non
                    per esprimere un giudizio sull’efficacia del controllo interno della Società;
                </p>
            </li>
            <li>
                <p style="margin-top: -2px">
                    siamo giunti ad una conclusione sull'appropriatezza dell'utilizzo da parte
                    dell’amministratore del presupposto della continuità aziendale e, in base agli elementi
                    probativi acquisiti, sull’eventuale esistenza di una incertezza significativa riguardo a eventi
                    o circostanze che possono far sorgere dubbi significativi sulla capacità della Società di
                    continuare ad operare come un’entità in funzionamento. In presenza di un'incertezza
                    significativa, siamo tenuti a richiamare l'attenzione nella relazione di revisione sulla relativa
                    informativa di bilancio ovvero, qualora tale informativa sia inadeguata, a riflettere tale
                    circostanza nella formulazione del nostro giudizio. Le nostre conclusioni sono basate sugli
                    elementi probativi acquisiti fino alla data della presente relazione. Tuttavia, eventi o
                    circostanze successivi possono comportare che la Società cessi di operare come un’entità
                    in funzionamento;
                </p>
            </li>

        </ul>

    </body>

    <footer>
        <div style="border-top: 2px solid #681B2C; margin-bottom: 7px; "></div>
        <div class="footer_setting">
            SOLIDA S.R.L.
        </div>
        <div class="footer_setting">
            Via Stella 1/G - 84091 Battipaglia (Sa) IT
        </div>
        <div class="footer_setting">
            p.iva 05829650653
        </div>
        <div class="footer_setting">
            <a href="mailto:info@solidanetwork.com">info@solidanetwork.com</a>
        </div>
        <div class="footer_setting">
            Capitale sociale 20.000 € i.v. <span style="float:right; font-size: 9px">pagina 2</span>
        </div>
    </footer>
</div>

<div style="page-break-after: always;">
    <header>
        <img src="{{ $solida_logo }}" style="width: 100%; max-width: 190px; max-height: 60;">
        <br>
        <div style="border-top: 2px solid #681B2C ; margin-top:7px; "></div>
    </header>

    <body>
        <br><br><br>
        <ul>
            <li>
                <p>
                    abbiamo valutato l'appropriatezza dei criteri di redazione utilizzati nonché la ragionevolezza
                    delle stime contabili effettuate dall’amministratore, inclusa la relativa informativa;
                </p>
            </li>
            <li>
                <p>
                    abbiamo analizzato la documentazione messa a disposizione per un’adeguata analisi contabile.
                </p>
            </li>
        </ul>
        <p>Si precisa che:</p>
        <ul>
            <li>
                <p style="margin-top: -3px">
                    il credito si applica alle spese di formazione sostenute nel periodo d’imposta 2021
                </p>
            </li>
            <li>
                <p style="margin-top: -3px">
                    Sono ammissibili al credito d’imposta le attività di formazione finalizzate all’acquisizione o al
                    consolidamento, da parte del personale dipendente dell’impresa, delle competenze nelle
                    tecnologie rilevanti per la realizzazione del processo di trasformazione tecnologica e digitale
                    delle imprese previsto dal <b>“Piano nazionale Impresa 4.0” </b>.
                </p>
            </li>
            <li>
                <p style="margin-top: -3px">
                    Costituiscono in particolare attività ammissibili al credito d’imposta le attività di formazione
                    concernenti le seguenti tecnologie:
                </p>
            </li>
        </ul>
        <div style="margin-left: 100px">
            <p style="margin-top: -3px">- big data e analisi dei dati; cloud e fog computing; cyber security; </p>
            <p style="margin-top: -3px">- simulazione e sistemi cyber-fisici; prototipazione rapida;</p>
            <p style="margin-top: -3px">- sistemi di visualizzazione, realtà virtuale e realtà aumentata;</p>
            <p style="margin-top: -3px">- robotica avanzata e collaborativa; interfaccia uomo macchina;</p>
            <p style="margin-top: -3px">- manifattura additiva (o stampa tridimensionale);</p>
            <p style="margin-top: -3px">- internet delle cose e delle macchine;</p>
            <p style="margin-top: -3px">- integrazione digitale dei processi aziendali </p>

        </div>
        <ul style="margin-top: 9px">
            <li>che la società ha fornito la documentazione necessaria per un’adeguata analisi, in
                particolare, per ogni corso di formazione regolarmente tenuto, che qui di seguito si
                specificano:
            </li>
        </ul>

        <table class="table table-bordered table-sm" style="margin-left: 5%; width: 95%;">

            <tr>
                <th style="width: 400px; text-align: center; vertical-align: middle;"><b> Corso </b></th>
                <th style="width: 60px; text-align: center; vertical-align: middle"><b>n. Ore </b></th>
                <th style="width: 60px; text-align: center; vertical-align: middle"><b>n. Dipendenti </b></th>
            </tr>
            @foreach ($course_data as $data)
                <tr>
                    @foreach ($data as $key)
                        @if (is_numeric($key))
                            <td style="height: 20px; text-align: center; vertical-align: middle">
                                <b>{{ $key }}</b>
                            </td>
                        @else
                            <td style="height: 20px;; vertical-align: middle"><b>{{ $key }}</b></td>
                        @endif
                    @endforeach
                </tr>
            @endforeach




        </table>
        <ul>
            <li style="margin-top: -3px; margin-left:4px;">Registri presenze firmati dal docente, tutor e discenti;</li>
            <li style="margin-top: -3px; margin-left:4px;">Relazioni tecniche finali firmate dal docente;</li>
            <li style="margin-top: -3px; margin-left:4px;">Buste paga dei partecipanti alla formazione;</li>
            <li style="margin-top: -3px; margin-left:4px;">Costo orario dei dipendenti.</li>
        </ul>

    </body>

    <footer>
        <div style="border-top: 2px solid #681B2C; margin-bottom: 7px; "></div>
        <div class="footer_setting">
            SOLIDA S.R.L.
        </div>
        <div class="footer_setting">
            Via Stella 1/G - 84091 Battipaglia (Sa) IT
        </div>
        <div class="footer_setting">
            p.iva 05829650653
        </div>
        <div class="footer_setting">
            <a href="mailto:info@solidanetwork.com">info@solidanetwork.com</a>
        </div>
        <div class="footer_setting">
            Capitale sociale 20.000 € i.v. <span style="float:right; font-size: 9px">pagina 3</span>
        </div>
    </footer>
</div>
<div style="page-break-after: always;">
    <header>
        <img src="{{ $solida_logo }}" style="width: 100%; max-width: 190px; max-height: 60;">
        <br>
        <div style="border-top: 2px solid #681B2C ; margin-top:7px; "></div>
    </header>

    <body>
        <br><br><br>
        @php
          $total = 0;
        foreach ($cost_ecnomics as $cost) {
            $total += $cost;
        }
        $value = $fmt->format($total);
        // dd(strpos($value, ','), $value);
        
        if (strpos($value, ',') == false) {
            $value = $fmt->format($total) . ',00';
        }
        
    @endphp
        <center>
            <strong style="font-size: 20px"> SI ATTESTA </strong>
        </center>
        <p>
            Che la società <span style="font-style: italic"><b>{{ $company_name }}</b> </span>ha sostenuto spese,
            relative al personale dipendente
            impegnato nelle attività di {{ $description }} ammissibili, limitatamente al costo aziendale riferito
            alle ore o alle giornate di formazione, di seguito elencate, per un importo complessivo pari
            a  <img src="{{ $euro }}"
            alt=""
            style="width: 100%; max-width: 10px; height: auto; margin-top: 5px; margin-right: 4px"><b>{{ $value }}</b>
        </p>
        <p>
            In particolare, l’impresa ha sostenuto le seguenti spese agevolabili:
        </p>
        <div>
            <table class="table table-bordered table-sm" style="margin-left: 5%; width: 95%;">

                <head>
                    <tr>
                        <th class=""><b> TIPOLOGIA DI SPESA </b></th>
                        <th><b>IMPORTO</b></th>
                    </tr>
                </head>

                <body>
                    <tr>
                        <td>A - Spese di personale relative ai formator</td>
                        <td><img src="{{ $euro }}"
                                style="width: 100%; max-width: 10px; height: auto; margin-top: 5px; margin-right: 4px"><b>{{ $fmt->format($cost_ecnomics[0]) }}</b>
                        </td>
                    </tr>
                    <tr>
                        <td>B - Costi di esercizio</td>
                        <td><img src="{{ $euro }}"
                                style="width: 100%; max-width: 10px; height: auto; margin-top: 5px; margin-right: 4px"><b>{{ $fmt->format($cost_ecnomics[2]) }}</b>
                        </td>
                    </tr>
                    <tr>
                        <td>C - Costi dei servizi di consulenza connessi al progetto di formazione</td>
                        <td><img src="{{ $euro }}"
                                style="width: 100%; max-width: 10px; height: auto; margin-top: 5px; margin-right: 4px"><b>{{ $fmt->format($cost_ecnomics[3]) }}</b>
                        </td>
                    </tr>
                    <tr>
                        <td>D - Spese di personale relative ai partecipanti e spese generali </td>
                        <td><img src="{{ $euro }}"
                                style="width: 100%; max-width: 10px; height: auto; margin-top: 5px; margin-right: 4px"><b>{{ $fmt->format($cost_ecnomics[5]) }}</b>
                        </td>
                    </tr>


                    <tr>
                        <th>
                            TOTALE
                        </th>
                        <th><img src="{{ $euro }}"
                                style="width: 100%; max-width: 10px; height: auto; margin-top: 5px; margin-right: 4px"><b>{{ $value }}</b>
                        </th>

                    </tr>
                </body>
            </table>
        </div>

        <p>
            Tali spese si considerano effettivamente sostenute nell’esercizio sociale chiuso in data
            31 dicembre <b>{{ $benefits_year }}</b> ai sensi dell’art. 109 del TUIR.
        </p>
        <p>
            Si attesta, inoltre, la regolarità formale della documentazione contabile relativa ai costi per
            le spese di formazione del personale dipendente, finalizzate all'acquisizione o al
            consolidamento delle competenze nelle tecnologie rilevanti per la trasformazione
            tecnologica e digitale previste dal <span style="font-style: italic"> Piano Nazionale Impresa 4.0.</span>

        </p>
        <p>
            Battipaglia, <b>{{ $date }}</b>
        </p>

        <div class="row">
            <div>
                <table class="w-100" style="height: 230px">
                    <tr>
                        <td class="col-6">
                            <p style="margin-left: 33px">REVISORE</p>
                            <strong style="margin-left: 33px"> Dr. {{ $auditor }} -(n° {{ $auditor_reg_no }} )
                            </strong>
                            <center><img src="{{ $auditor_signature }}"
                                    style="width: 100%; max-width: 170px; height: auto;"></center>
                        </td>
                        <td align="right" class="col-6   p-0">
                            <span style="float: right">
                                <p style="text-align: center">SOCIETÀ DI REVISONE </p>
                                <strong>
                                    <center> SOLIDA SRL </center>
                                </strong>
                                <small>
                                    <center> Il legale rappresentante</center>
                                </small>
                                <small>
                                    <center> dr. Marco Sforza</center>
                                </small>
                                <center><img src="{{ $signature }}"
                                        style="width: 100%; max-width: 170px; height: auto;"></center>
                            </span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </body>

    <footer>
        <div style="border-top: 2px solid #681B2C; margin-bottom: 7px; "></div>
        <div class="footer_setting">
            SOLIDA S.R.L.
        </div>
        <div class="footer_setting">
            Via Stella 1/G - 84091 Battipaglia (Sa) IT
        </div>
        <div class="footer_setting">
            p.iva 05829650653
        </div>
        <div class="footer_setting">
            <a href="mailto:info@solidanetwork.com">info@solidanetwork.com</a>
        </div>
        <div class="footer_setting">
            Capitale sociale 20.000 € i.v. <span style="float:right; font-size: 9px">pagina 4</span>
        </div>
    </footer>
</div>
<div>
    <header>
        <img src="{{ $solida_logo }}" style="width: 100%; max-width: 190px; max-height: 60;">
        <br>
        <div style="border-top: 2px solid #681B2C ; margin-top:7px; "></div>
    </header>

    <body class="last">
        <br><br><br>

        <center><strong>NOTE OPERATIVE</strong></center>

        <p>
            Credito d’imposta spettante: .......................................................... <img
                src="{{ $euro }}" alt=""
                style="width: 100%; max-width: 10px; height: auto; margin-top: 5px; margin-right: 4px"><b>{{ $fmt->format($accrued_benifits) }}</b>
        </p>
        <p>
           
            Codice Tributo  .....................................................................................<b>6897</b>
        <p>
           
            Anno di riferimento  .............................................................................<b>{{ $benefits_year }}</b>
        </p>
        <p style="margin-bottom: 0px">
            N.B. il credito d’imposta spettante di EURO <img src="{{ $euro }}" alt=""
                style="width: 100%; max-width: 10px; height: auto; margin-top: 5px; margin-right: 4px"><b>{{ $fmt->format($accrued_benifits) }}</b>
            è comprensivo dei costi di
            certificazione per <img src="{{ $euro }}" alt=""
                style="width: 100%; max-width: 10px; height: auto; margin-top: 5px; margin-right: 4px"><b>{{ $fmt->format($fee) }}</b>
        </p>
        <p>
            La normativa prevede che il credito d’imposta relativo ai costi di certificazione sopra riportati,
            debba essere sostenuto prima di essere utilizzato (anche il giorno dopo il pagamento).
        </p>
        <strong>
            <strong>
                <p style="text-decoration: underline; text-align: center; font-size: large; ">
                    DICHIARAZIONE DEI REDDITI: QUADRO RU
                </p>
            </strong>
        </strong>
        <p class="lastp"><strong style="text-decoration: underline;">RU1:</strong> Dati identificativi del credito
            d’imposta – CODICE “F7” </p>

        <p class="lastp"><strong style="text-decoration: underline;">RU5: </strong> Credito d’imposta spettante nel
            periodo – riportare beneficio complessivo
            comprensivo della certificazione (vedere beneficio complessivo indicato nella relazione
            economica):<img src="{{ $euro }}"
                style="width: 100%; max-width: 10px; height: auto; margin-top: 5px; margin-right: 4px"><b>{{ $fmt->format($accrued_benifits) }}</b>
        </p>

        <p class="lastp"><strong style="text-decoration: underline;">RU6:</strong> COMPENSAZIONI EFFETTUATE NELL’ANNO
        </p>
        <p class="lastp"><strong style="text-decoration: underline;">RU12:</strong> COMPENSAZIONI EFFETTUATE
            NELL’ANNO </p>



        <p class="lastp"><strong style="text-decoration: underline;">RU12: </strong> Credito d’imposta residuo –
            riportabile al periodo successivo</p>
        <p style="margin-bottom: 0px" class="lastp"><strong>SEZ. IV</strong></p>
        <p style="margin-bottom: 0px" class="lastp"><strong style="text-decoration: underline;">RU100: </strong>


        <div style="margin-left: 40px; margin-bottom: 5px" class="lastli"> <strong> Colonna 1 </strong>
            – NUMERO ORE COMPLESSIVE dei lavoratori dipendenti nelle
            attività di formazione agevolabili, <b>, in qualità sia di discenti, sia di docenti o tutor.</b>

        </div>
        <div style="margin-left: 40px; margin-bottom: 5px" class="lastli"> <strong> Colonna 2 </strong> – NUMERO
            DIPENDENTI che hanno preso parte alle attività di
            formazione agevolabili,
            <b>in qualità sia di discenti, sia di docenti o tutor, in
                tutte le attività di {{ $description }} svolte nel periodo d’imposta.
            </b>

        </div>
        <strong>*** Importantissimo:</strong>
        <p>Se l’azienda ha usufruito del credito d’imposta l’anno precedente, il Quadro RU deve
            essere compilato anche nei campi relativi ai crediti da riportare e utilizzati.</p>
        <p>Qualora l’azienda volesse recuperare una annualità pregressa, il credito spetta a
            condizione che si sia inviata una dichiarazione integrativa.
        </p>
        <p>Qualora l’azienda volesse recuperare annualità pregresse, oltre la precedente, la
            dichiarazione integrativa va intesa come “ultrannuale” e il credito spettante, può essere
            utilizzato a partire dall’anno successivo all’invio della dichiarazione e, “SOLO” per i debiti
            sorti nell’esercizio di utilizzo</p>


    </body>


    <footer>
        <div style="border-top: 2px solid #681B2C; margin-bottom: 7px; "></div>
        <div class="footer_setting">
            SOLIDA S.R.L.
        </div>
        <div class="footer_setting">
            Via Stella 1/G - 84091 Battipaglia (Sa) IT
        </div>
        <div class="footer_setting">
            p.iva 05829650653
        </div>
        <div class="footer_setting">
            <a href="mailto:info@solidanetwork.com">info@solidanetwork.com</a>
        </div>
        <div class="footer_setting">
            Capitale sociale 20.000 € i.v. <span style="float:right; font-size: 9px">pagina 5</span>
        </div>
    </footer>
</div>

</html>
