<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ $company_name}}</title>
        
        {{-- <link href="" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous"> --}}
        {{-- <link type="text/css" href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" /> --}}
        <link type="text/css" href="{{ asset("bootstrap/css/bootstrap.css") }}" rel="stylesheet" />
        <link type="text/css" href="{{ asset("bootstrap/js/bootstrap.js") }}" rel="stylesheet" />
        <style>
            
            body {
                padding: 0;
                margin:0;
                /* font-size: smaller; */
            }
            header {
                position: fixed;
                top: -10px;
                left: 0px;
                right: 0px;
                height: 50px;
            }

            footer {
                position: fixed; 
                bottom: -1px; 
                left: 0px; 
                right: 0px;
                height: 60px; 
                color: #911e37;
            }
            p{
                margin-bottom: 4px;
            }
            
            
            </style>
    </head>

            <div style="page-break-after: always;">
                <header>
                    <img src="{{ $solida_logo }}" width="190px" height="60px">
                    <br>
                    <br>
                    <div  style="border-top: 2px solid #681B2C ; "></div>
                </header>
                
                <body>
                    <br><br><br><br>
                    <center> <strong>
                        CERTIFICAZIONE RELATIVA AL CREDITO D’IMPOSTA <br>
                        PER {{ $benefits_name }}<br>
                        ANNUALITÀ {{ $benefits_year }} <br>
                        ( {{ $benefits_requirment }} )
                    </strong></center>
                    <br>
                    <p style="margin-left: -5px;">
                        Al legale rappresentante della
                    </p>
                    
                    <p style="margin-left: 5px;"><b> {{ $company_name }} </b></p>
                    <p style="margin-left: 5px;"><b> {{ $company_address }} </b></p>
                    <p style="margin-left: 5px;">p.iva <b> {{ $vat_number }} </b></p>
                    
                    <strong>Giudizio</strong>
                    
                    <p>
                        Abbiamo svolto la revisione contabile dei costi di ricerca e sviluppo sostenuti da <b>{{ $company_name }}</b>
                        nell’esercizio <b>{{ $benefits_year }}</b>  sulla base della documentazione predisposto ai fini
                        della determinazione del credito d’imposta ricerca e sviluppo ai sensi dall’art. 1, legge
                        n.160 del 27/12/2019 e successive modifiche.  
                        
                    </p>
                    
                    <p><strong>Elementi alla base del giudizio</strong></p>
                    <p>
                        Abbiamo svolto la revisione contabile in conformità ai principi di revisione internazionali
                        (ISAs). Le nostre responsabilità ai sensi di tali principi sono ulteriormente descritte nella
                        sezione Responsabilità della società di revisione per la revisione contabile dei costi di
                        ricerca e sviluppo della presente relazione. Siamo indipendenti rispetto alla Società in
                        conformità alle norme e ai principi in materia di etica e di indipendenza del Code of Ethics
                        for Professional Accountants (IESBA Code) emesso dall’International Ethics Standards
                        Board for Accountants applicabili alla revisione contabile del Prospetto. Riteniamo di aver
                        acquisito elementi probativi sufficienti ed appropriati su cui basare il nostro giudizio. 
                    </p>
                    <p><strong>Responsabilità dell’amministratore</strong></p>
                    <p>
                        L’amministratore è responsabile per la redazione della documentazione, e, nei termini
                        previsti dalla legge, per quella parte del controllo interno dagli stessi ritenuta necessaria
                        per consentire la redazione di documenti che non contengano errori significativi dovuti a
                        frodi o a comportamenti o eventi non intenzionali. 
                    </p>
                    <p>
                        L’amministratore è responsabile per la valutazione della capacità della Società di
                        continuare ad operare come un’entità in funzionamento e, nella redazione della
                        documentazione, 
                    </p>
                    
                    
                </body>
                
                <footer>
                    <small> <div  style="border-top: 2px solid #681B2C ; "></div>
                        <div  style="font-size: 9px;">
                            SOLIDA S.R.L. <br>
                            Via Stella 1/G - 84091 Battipaglia (Sa) IT <br>
                            p.iva 05829650653 <br>
                            <a href="mailto:certificazioni@solidateam.it">certificazioni@solidateam.it</a> <br>
                            Capitale sociale 20.000 € i.v. 
                        </div>
                    </small>
                    <p style="font-size: 11px;"> <strong> </strong> <span style="float:right"><strong>pagina 1</strong></span> </p>
                </footer>
            </div>

            <div style="page-break-after: always;">
                <header>
                    <img src="{{ $solida_logo }}" width="190px" height="60px" >
                    <br>
                    <br>
                    <div  style="border-top: 2px solid #681B2C; "></div>
                </header>
                <body>
                    <br><br><br><br>
                    <p>
                        per l’appropriatezza dell’utilizzo del presupposto della continuità
                        aziendale, nonché per una adeguata informativa in materia. Gli amministratori utilizzano il
                        presupposto della continuità aziendale nella redazione della documentazione a meno che 
                    </p>
                    <p>
                        abbiano valutato che sussistono le condizioni per la liquidazione della Società o per
                        l’interruzione dell’attività o non abbiano alternative realistiche a tali scelte. 
                    </p>
                    <p>
                        L’amministratore è responsabile per la valutazione di carattere tecnico in ordine
                        all'ammissibilità al credito d’imposta per le attività di ricerca e sviluppo svolte dall'impresa
                        e la prova di dimostrare che le spese sostenute attengano effettivamente ad attività di R&S
                        rimane in carico al legale rappresentante della società 
                    </p>
                    <p><strong>Responsabilità della società di revisione per la revisione contabile dei costi di ricerca e sviluppo </strong></p>
                    <p>
                        I nostri obiettivi sono l’acquisizione di una ragionevole sicurezza che la documentazione
                        prodotta non contenga errori significativi, dovuti a frodi o a comportamenti o eventi non
                        intenzionali, e l’emissione di una <strong> certificazione contabile che attesti che le spese siano
                            state effettivamente sostenute e la regolarità formale della documentazione
                            contabile relativa ai costi di ricerca. 
                            </strong>
                    </p>
                    <p>
                        Per ragionevole sicurezza si intende un livello elevato di sicurezza che, tuttavia, non
                        fornisce la garanzia che una revisione contabile svolta in conformità ai principi di revisione
                        internazionali (ISAs) individui sempre un errore significativo, qualora esistente. Gli errori
                        possono derivare da frodi o da comportamenti o eventi non intenzionali e sono considerati
                        significativi qualora ci si possa ragionevolmente attendere che essi, singolarmente o nel
                        loro insieme, siano in grado di influenzare le decisioni economiche degli utilizzatori prese
                        sulla base della documentazione prodotta. 

                    </p>
                    <p>
                        Nell’ambito della revisione contabile svolta in conformità ai principi di revisione internazionali 
                    </p>
                    <p>
                        (ISAs), abbiamo esercitato il giudizio professionale e abbiamo mantenuto lo scetticismo
                        professionale per tutta la durata della revisione contabile. Inoltre: 
                    </p>

                    <ul>
                        <li><p>
                            abbiamo identificato e valutato i rischi di errori significativi nel Prospetto, dovuti a
                            frodi o a comportamenti o eventi non intenzionali; abbiamo definito e svolto
                            procedure di revisione in risposta a tali rischi; abbiamo acquisito elementi probativi
                            sufficienti ed appropriati su cui basare il nostro giudizio. Il rischio di non individuare
                            un errore significativo dovuto a frodi è più elevato rispetto al rischio di non
                            individuare un errore significativo derivante da comportamenti o eventi non
                            intenzionali, poiché la frode può implicare l’esistenza di collusioni, falsificazioni,
                            omissioni intenzionali, rappresentazioni fuorvianti o forzature del controllo interno;
                        </p></li>
                        
                    </ul>
                    
                </body>
                
                <footer>
                    <small> <div  style="border-top: 2px solid #681B2C ; "></div>
                        <div  style="font-size: 9px;">
                            SOLIDA S.R.L. <br>
                            Via Stella 1/G - 84091 Battipaglia (Sa) IT <br>
                            p.iva 05829650653 <br>
                            <a href="mailto:certificazioni@solidateam.it">certificazioni@solidateam.it</a> <br>
                            Capitale sociale 20.000 € i.v. 
                        </div>
                    </small>
                    <p style="font-size: 11px;"> <strong> </strong> <span style="float:right"><strong>pagina 2</strong></span> </p>
                </footer>
            </div>

            <div style="page-break-after: always;">
                <header>
                    <img src="{{ $solida_logo }}" width="190px" height="60px">
                    <br>
                    <br>
                    <div  style="border-top: 2px solid #681B2C ; "></div>
                </header>
                
                <body>
                    <br><br><br><br><br>
                    <ul>
                        <li><p>
                            abbiamo acquisito una comprensione del controllo interno rilevante ai fini della
                            revisione contabile allo scopo di definire procedure di revisione appropriate nelle
                            circostanze e non per esprimere un giudizio sull’efficacia del controllo interno della
                            Società; 
                        </p></li>
                        <li><p>  
                            siamo giunti ad una conclusione sull'appropriatezza dell'utilizzo da parte
                            dell’amministratore del presupposto della continuità aziendale e, in base agli
                            elementi probativi acquisiti, sull’eventuale esistenza di una incertezza significativa riguardo a eventi o circostanze che possono far sorgere dubbi significativi sulla
                            capacità della Società di continuare ad operare come un’entità in funzionamento.
                            In presenza di un'incertezza significativa, siamo tenuti a richiamare l'attenzione
                            nella relazione di revisione sulla relativa informativa di bilancio ovvero, qualora tale
                            informativa sia inadeguata, a riflettere tale circostanza nella formulazione del nostro
                            giudizio. Le nostre conclusioni sono basate sugli elementi probativi acquisiti fino
                            alla data della presente relazione. Tuttavia, eventi o circostanze successivi
                            possono comportare che la Società cessi di operare come un’entità in
                            funzionamento;5- 6
                        </p></li>
                        <li><p>
                            abbiamo valutato l'appropriatezza dei criteri di redazione utilizzati nonché la
                            ragionevolezza delle stime contabili effettuate dall’amministratore, inclusa la
                            relativa informativa;
                        </p></li>
                        <li><p>
                            abbiamo analizzato la documentazione messa a disposizione per un’adeguata
                            analisi contabile. 
                        </p></li>
                    </ul>


                </body>
                
                <footer>
                    <small> <div  style="border-top: 2px solid #681B2C ; "></div>
                        <div  style="font-size: 9px;">
                            SOLIDA S.R.L. <br>
                            Via Stella 1/G - 84091 Battipaglia (Sa) IT <br>
                            p.iva 05829650653 <br>
                            <a href="mailto:certificazioni@solidateam.it">certificazioni@solidateam.it</a> <br>
                            Capitale sociale 20.000 € i.v. 
                        </div>
                    </small>
                    <p style="font-size: 11px;"> <strong> </strong> <span style="float:right"><strong>pagina 3</strong></span> </p>
                </footer>
            </div>
            <div style="page-break-after: always;">
                <header>
                    <img src="{{ $solida_logo }}" width="190px" height="60px">
                    <br>
                    <br>
                    <div  style="border-top: 2px solid #681B2C ; "></div>
                </header>
                
                <body>
                    <br><br><br><br><br>
                @php
                $total = 0;
                foreach($cost_ecnomics as $cost){
                    $total += $cost;
                }
                // dd($total);
                @endphp
                    <center><p><strong> SI ATTESTA </strong></p></center>
                    <p>
                        Che la società <b>{{ $company_name }}</b> ha sostenuto spese relative ad attività di ricerca e
                        sviluppo, di seguito elencate, per un importo complessivo pari a <b>{{ $total }}</b>
                    </p>
                    <p>
                        In particolare, l’impresa ha sostenuto le seguenti spese agevolabili: 
                    </p>
                    <div >
                    <table class="table table-bordered table-sm" style="margin-left: 5%; width: 85%; font-weight: normal; font-size: 14px;" >
                        <head>
                            <tr>
                                <th class="square"><b> TIPOLOGIA DI SPESA </b></th>
                                <th ><b>IMPORTO</b></th>
                            </tr>
                        </head>
                        <body>
                            <tr>
                                <td>A) PERSONALE</td>
                                <td><b>€ {{ $cost_ecnomics[0] }}</b></td>
                            </tr>
                            
                            <tr>
                                <td>A*) PERSONALE U35 AL PRIMO IMPIEGO CON DOTTORATO DI RICERCA O CON
                                    LAUREA MAGISTRALE IN DISCIPLINE TECNICHE O SCIENTIFICHE
                                    </td>
                                <td><b>€ {{ $cost_ecnomics[1] }}</b></td>
                            </tr>
                            <tr>
                                <td>B) SPESE STRUMENTI ED ATTREZZATURE</td>
                                <td><b>€ {{ $cost_ecnomics[2] }}</b></td>
                            </tr>
                            <tr>
                                <td>C) SPESE PER CONTRATTI DI RICERCA “EXTRA-MUROS” </td>
                                <td><b>€ {{ $cost_ecnomics[3] }}</b></td>
                            </tr>
                            <tr>
                                <td>C*) SPESE PER CONTRATTI DI RICERCA “EXTRA-MUROS” CON UNIVERSITA' O
                                    ENTI DI RICERCA 
                                    </td>
                                <td><b>€ {{ $cost_ecnomics[4] }}</b></td>
                            </tr>
                            <tr>
                                <td>D) COMPETENZE TECNICHE E PRIVATIVE INDUSTRIALI</td>
                                <td><b>€ {{ $cost_ecnomics[5] }}</b></td>
                            </tr>
                            <tr>
                                <td>E) SERVIZI DI CONSULENZA ED AFFINI</td>
                                <td><b>€ {{ $cost_ecnomics[6] }}</b></td>
                            </tr>
                            <tr>
                                <td>F) MATERIALI </td>
                                <td><b>€ {{ $cost_ecnomics[7] }}</b></td>
                            </tr>
                            <tr>
                                <th>
                                    TOTALE
                                </th>
                                <th><b>€ {{ $total }}</b></th>

                            </tr>
                        </body>
                    </table>
                </div>
                    
                <p>
                    Tali spese si considerano effettivamente sostenute nell’esercizio sociale chiuso in data
                    31 dicembre <b>{{ $benefits_year }}</b> ai sensi dell’art. 109 del TUIR.
                </p>
                <p>
                    Si attesta, inoltre, la regolarità formale della documentazione contabile relativa ai costi di
                    ricerca e sviluppo sostenuti. 
                </p>
                <p>
                    Battipaglia, <b>{{ $date }}</b>
                </p>

                    <div class="row">
                        <div >
                            <table class="w-100" style="height: 230px">
                                <tr>
                                    <td class="col-6 p-0">
                                        <p style="text-align: center">REVISORE</p>
                                        <strong>  Dr. {{ $auditor }} -(n° {{ $auditor_reg_no }} )  </strong>
                                        <center><img src="{{ $auditor_signature }}" style="width: 100%; max-width: 170px; height: auto;" ></center>
                                    </td>
                                    <td align="right" class="col-6   p-0"> 
                                        <span style="float: right">
                                            <p style="text-align: center">SOCIETÀ DI REVISONE </p>
                                            <strong> <center>  SOLIDA SRL </center></strong>
                                            <small><center> Il legale rappresentante</center></small>
                                            <small><center> dr. Marco Sforza</center></small>
                                            <center><img src="{{ $signature }}" style="width: 100%; max-width: 170px; height: auto;" ></center>
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </body>
                
                <footer>
                    <small> <div  style="border-top: 2px solid #681B2C ; "></div>
                        <div  style="font-size: 9px;">
                            SOLIDA S.R.L. <br>
                            Via Stella 1/G - 84091 Battipaglia (Sa) IT <br>
                            p.iva 05829650653 <br>
                            <a href="mailto:certificazioni@solidateam.it">certificazioni@solidateam.it</a> <br>
                            Capitale sociale 20.000 € i.v. 
                        </div>
                    </small>
                    <p style="font-size: 11px;"> <strong> </strong> <span style="float:right"><strong>pagina 4</strong></span> </p>
                </footer>
            </div>
            <div>
                <header>
                    <img src="{{ $solida_logo }}" width="190px" height="60px">
                    <br>
                    <br>
                    <div  style="border-top: 2px solid #681B2C ; "></div>
                </header>
                
                <body>
                    <br><br><br>

                    <center><strong>NOTE OPERATIVE</strong></center>
                    
                    <p>
                        Credito d’imposta spettante: .......................................................... <b>$BENEFIT_total ACCRUED AFTER BALANCE OF THE AUDITOR INVOICE</b>
                    </p>
                    <p><strong>Codici tributo da utilizzare per compensazioni F24: </strong></p>
                    <p>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        Codice Tributo 6938 anno di riferimento <b>{{ $benefits_year }}</b> ................................. <b>$total1</b> 
                    </p>
                    <p>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        Codice Tributo 6939 anno di riferimento <b>{{ $benefits_year }}</b> ................................ <b>$total2</b> 
                    </p>
                    <p style="margin-bottom: 0px">
                        N.B. il credito d’imposta spettante di EURO  <b>$BENEFIT_total</b>è comprensivo dei costi di
                        certificazione per <b>$file_price</b>
                    </p>
                    <p>
                        La normativa prevede che il credito d’imposta relativo ai costi di certificazione sopra riportati,
                        debba essere sostenuto prima di essere utilizzato (anche il giorno dopo il pagamento). 
                    </p>
                    <strong><center><p style="text-decoration: underline;">
                        DICHIARAZIONE DEI REDDITI: QUADRO RU 
                    </p></center></strong>
                    <p><strong style="text-decoration: underline;">RU1:</strong> Dati identificativi del credito d’imposta – CODICE “L1” </p>
                    <p><strong style="text-decoration: underline;">RU5: </strong></p>
                    <p style="margin-left: 15px; margin-bottom: 0px">
                        
                        <strong > - colonna 1</strong> la maggiorazione del credito d’imposta spettante per gli investimenti in
                        attività di ricerca e sviluppo effettuate nelle <strong>Regioni Abruzzo, Basilicata, Calabria,
                            Campania, Molise, Puglia, Sardegna e Sicilia  </strong>  <b>$total1</b> 
                    </p>
                    <p style="margin-left: 15px; margin-bottom: 0px">
                        
                        <strong > - colonna 2</strong> la maggiorazione del credito d’imposta spettante per gli investimenti in
                        attività di ricerca e sviluppo effettuate nelle <strong>R Regioni Lazio, Marche e Umbria colpite
                            dagli eventi sismici degli anni 2016 e 2017  </strong>
                    </p>
                    <p style="margin-left: 15px; margin-bottom: 0px">
                        
                        <strong > - colonna 3</strong>  l’ammontare complessivo del credito d’imposta maturato incluso gli importi
                        delle colonne 1 e 2 <b>$total</b> <strong> </strong>
                    </p>
                    <p><strong style="text-decoration: underline;">RU12: </strong> Credito d’imposta residuo – riportare il beneficio complessivo come da Rigo RU5
                        colonna 3 
                    </p>
                    <p style="margin-bottom: 0px"><strong>SEZ. IV</strong></p>
                    <p style="margin-bottom: 0px"><strong style="text-decoration: underline;">RU100: </strong> <strong>Colonna 1</strong>   L’ammontare complessivo delle spese agevolabili, incluse le
                        maggiorazioni e le limitazioni (vedere relazione economica) 
                        
                       <div style="margin-left: 40px; margin-bottom: 0px"> <strong> Colonna 2 </strong> Spese per contratti di Ricerca extra-muros (vedere relazione
                        economica) </div> 
                        <div style="margin-left: 40px; margin-bottom: 0px"> <strong> Colonna 3 </strong> Spese per il personale (vedere relazione economica)
                        </div><div style="margin-left: 40px; margin-bottom: 0px"> <strong> Colonna 4 </strong> Numero dei dipendenti neoassunti di età non superiore a
                        trentacinque anni al primo impiego di cui alla lettera a), ultimo periodo;
                        </div><div style="margin-left: 40px; margin-bottom: 0px"> <strong> Colonna 5 </strong> Spese per attività di ricerca e sviluppo direttamente afferenti a
                        strutture produttive ubicate nelle regioni del MEZZOGIORNO, già comprese
                        nell’importo di colonna 1, sulle quali va calcolata la maggiorazione del credito
                        d’imposta indicata nella colonna 1 del rigo RU5
                        </div><div style="margin-left: 40px; margin-bottom: 0px"> <strong> Colonna 6 </strong> Spese per attività di ricerca e sviluppo direttamente afferenti a
                        strutture produttive ubicate nelle regioni del SISMA, già comprese nell’importo di
                        colonna 1, sulle quali va calcolata la maggiorazione del credito d’imposta indicata
                        nella colonna 2 del rigo RU5
                    </p>
                    
                </body>

                
                <footer>
                    <small> <div  style="border-top: 2px solid #681B2C ; "></div>
                        <div  style="font-size: 9px;">
                            SOLIDA S.R.L. <br>
                            Via Stella 1/G - 84091 Battipaglia (Sa) IT <br>
                            p.iva 05829650653 <br>
                            <a href="mailto:certificazioni@solidateam.it">certificazioni@solidateam.it</a> <br>
                            Capitale sociale 20.000 € i.v. 
                        </div>
                    </small>
                    <p style="font-size: 11px;"> <strong> </strong> <span style="float:right"><strong>pagina 5</strong></span> </p>
                </footer>
            </div>
            
</html>