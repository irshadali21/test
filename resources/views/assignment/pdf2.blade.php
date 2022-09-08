<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ $company_name}}</title>
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        
        <style>
            
            body {
                padding: 0;
                margin:0;
                font-size: smaller;
            }

            p{
                font: 1pt;
                margin-top: 6px; 
                margin-bottom: 10px; 
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
            .square {
                border: solid 1px black;
                height: 25px;
                width: 25px;
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
                    <br><br><br><br><br>
                    <center> <strong>
                        LETTERA DI INCARICO PROFESSIONALE PER L’AFFIDAMENTO DI SERVIZI LEGATI <br>
                        ALL’ATTIVITÀ DI REVISIONE PER NOSTRO CONTO IN MATERIA DI INDUSTRIA 4.0 <br>    
                        OVVERO DI CERTIFICAZIONE DEI BILANCI DELLE SOCIETÀ NOSTRE CLIENTI.  <br>
                    </strong></center>
                    <br><br><br>
                    <p>
                        Ilsottoscritto Dott. Marco Sforza, nato a Venezia il 11/09/1964 e residenti in Napoli, alla Via Nicolardi,
                        n. 300 – 80131 - C.F. SFR MRC 64P11 L736M - con sede legale in 84091 - BATTIPAGLIA (SA) alla
                        Via STELLA n. 1/G, P.IVA: 05829650653, esercente l’attività di amministratore successivamente
                        denominato "Società di revisione" 
                    </p>
                    <br>
                    <center><strong>
                        AFFIDA 
                    </strong></center>
                    <br>
                    <p>
                        al Dott./Rag. {{ $auditor }} con studio in {{ $auditor_address }}, iscritto all'Ordine dei Dottori
                        Commercialisti e degli Esperti Contabili di {{ $auditor_city }}, sez.A / sez.B
                        con il n. {{ $accountant_reg_no }}, e al n. {{ $auditor_reg_no }} del Registro dei Revisori, indirizzo e.mail/pec: {{ $auditor_pec_email }}  che opera in proprio/quale associato dello studio {{ $auditor_office_no }} successivamente denominato
                        "Professionista", 
                        
                    </p>
                    <p>
                        il seguente incarico professionale, disciplinato dai seguenti articoli ed accettato dal Professionista mediante
                        sottoscrizione della presente lettera d'incarico. 
                    </p>
                    <p><strong>1) Oggetto dell'incarico </strong></p>
                    <p>
                        Certificazione relativa al credito d’imposta per {{ $benefits_name }} annualità {{ $benefits_year }}, dell’azienda {{ $company_name }} , {{ $company_address }}, p.iva {{ $vat_number }}
                    </p>
                    <p>
                        Nell'espletamento dell'incarico il Professionista può avvalersi, sotto la propria direzione e responsabilità, di
                        collaboratori e/o di personale dipendente. 
                    </p>
                    <p>
                        La revisione sarà svolta in conformità ai principi di revisione internazionali ISA Italia, ai principi di revisione
                        SA Italia 250B e SA Italia 720B e al principio ISQC Italia 1 elaborati ai sensi dell’art. 11, comma 3, del D.Lgs.
                        39/2010 e adottati con determina del Ragioniere Generale dello Stato in data 23 dicembre 2014, ovvero ad
                        eventuali ulteriori principi di revisione che saranno adottati in sostituzione di quelli attualmente applicabili o
                        di quelli che dovessero integrare gli stessi in materia di certificazione dle bilancio ovvero di certificazione
                        delle spese in Industria 4.0. 
                    </p>
                    <p><strong>2) Decorrenza e durata dell'incarico </strong></p>
                    <p>
                        L'incarico decorre dalla sottoscrizione del presente documento e si intende conferito fino alla conclusione
                        della prestazione. 
                    </p>
                    <p><strong>3) Compenso</strong></p>
                    <p>
                        Per lo svolgimento delle prestazioni oggetto del presente incarico, al Professionista spettano, oltre al
                        rimborso delle spese documentate e sostenute in nome e per conto del cliente, gli onorari preconcordati
                        nella misura del 50% del compenso fatturato dalla Società al Cliente finale da corrispondersi a 30 gg .
                        dall’incasso totale del predetto compenso. 
                    </p>
                 
                    <p>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        L'onorario preconcordato nella misura che precede
                    </p>
                  
                    <div >
                        <p >
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <img src="{{ $square }}" alt="" height="30px"  > 
                    </div>
                  
                    <p>
                        la maggiorazíone di cui all'articolo 23 e le indennità di cui all'articolo 19 della Tariffa
                        professionale. 
                    </p>
                    <p>
                        Per le eventuali prestazioni specifiche diverse da quelle indicate nella presente lettera d’incarico i
                        corrispondenti onorari saranno determinati come segue: 
                    </p>
                </body>
                
                <footer>
                    <small> <div  style="border-top: 2px solid #681B2C ; "></div>
                    <p style="font-size: 11px;"> <strong> REV-{{ $benefits_year }}-{{ $code_date }}-{{ $vat_number }}</strong> <span style="float:right"><strong>Pag. 1 di 5</strong></span> </p>
                        <div  style="font-size: 10px;">
                            SOLIDA S.R.L. <br>
                            Via Stella 1/G - 84091 Battipaglia (Sa) IT <br>
                            p.iva 05829650653 <br>
                            <a href="mailto:certificazioni@solidateam.it">certificazioni@solidateam.it</a> <br>
                            Capitale sociale 20.000 € i.v. 
                        </div></small>
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
                    <br><br><br><br><br>
                    <img src="{{ $square2 }}" alt="" height="50px" style=" margin-left: 10px">

                    <p>
                        I compensi indicati e gli eventuali compensi accessori si intendono sempre al netto dell'I.V.A. e del contributo
                        previdenziale. 
                    </p>
                    <p>
                        I collaboratori sia autonomi sia subordinati che il professionista dovesse assumere per il miglior espletamento
                        della sua attività dipenderanno esclusivamente dal professionista stesso. La Società non avrà rapporto di
                        alcun genere con loro. Costi ed i compensi afferenti al punto precedente che il Professionista dovesse
                        sostenere sono a suo completo carico. 
                    </p>
                    <p><strong>4) Non esclusività</strong></p>
                    <p>
                        Il Professionista incaricato non ha alcuna esclusività territoriale e la Società è libera di conferire incarico ad
                        altri Professionisti appartenenti al proprio network 
                    </p>
                    <p><strong>5) Obblighi del Professionista</strong></p>
                    <p>
                        a) Con l'assunzione dell'incarico il Professionista si impegna a prestare la propria opera usando la diligenza
                        richiesta dalla natura dell'attività esercitata, dalle leggi e dalle norme deontologiche della professione.
                    </p>
                    <p>
                        b) Il Professionista, ai sensi dell'art. 2235 del c.c., trattiene la documentazione fornita dal Cliente per il
                        tempo strettamente necessario all’espletamento dell’incarico, salvo diversi accordi con il Cliente.
                    </p>
                    <p>
                        c) Il Professionista deve rispettare il segreto professionale non divulgando fatti o informazioni di cui è
                        venuto a conoscenza in relazione all'espletamento dell'incarico; né degli stessi può fare uso, sia nel proprio
                        che nell'altrui interesse, curando e vigilando che anche i collaboratori, i dipendenti ed i tirocinanti
                        mantengano lo stesso segreto professionale. 
                        
                    </p>
                    <p>
                        d) Ai sensi dell’art. 2399 c.c. e delle regole deontologiche che disciplinano la professione contabile, nonché
                        delle disposizioni sull’indipendenza del revisore contenute nel D.Lgs. 39/2010, dichiaro sin d’ora la mia
                        indipendenza nei confronti della società e l’insussistenza di cause di incompatibilità per l’assunzione di questo
                        mandato. 
                    </p>
                    <p><strong>6) Obblighi della Società</strong></p>
                    <p>
                        a) La Società ha l'obbligo di far pervenire tempestivamente presso lo studio del Professionista la
                        documentazione necessaria all’espletamento dell’incarico. 
                    </p>
                    <p>
                        b) la Società deve collaborare con il Professionista ai fini dell'esecuzione del presente incarico consentendo
                        allo stesso ogni attività di accesso e controllo dei dati necessari per l'espletamento del mandato. 
                    </p>
                    <p>
                        c) La Società ha l'obbligo di informare tempestivamente il Professionista su qualsivoglia variazione che
                        abbia inerenza all'incarico conferito mediante atti scritti. 
                    </p>
                    <p><strong>7) Antiriciclaggio</strong></p>
                    <p>
                        In attuazione di quanto previsto dal D.Lgs. 21 novembre 2007, n. 231 il professioniata incaricato ha
                        adempiuto agli obblighi di adeguata verifica della clientela previsti dagli articoli 16 e seguenti, attenendosi 
                        alla indicazioni contenute nelle linee guida emanate dal Consiglio Nazionale dei Dottori Commercialisti e degli
                        Esperti Contabili e adempie a tutti gli altri obblighi previsti dal citato decreto. 
                    </p>
                    <p><strong>8) Recesso</strong></p>
                    <p>
                        Il Professionista può recedere dal contratto per giusta causa. Il diritto di recedere dal contratto deve essere
                        esercitato dal Professionista in modo da non recare pregiudizio né alla Società né al Cliente finale, mediante
                        comunicazione per iscritto a mezzo raccomandata a/r e/o a mezzo pec, con un preavviso di 30 giorni. 
                    </p>
                    <p>
                        La Società può recedere dal contratto in qualsiasi momento, revocando l’incarico, senza alcun obbligo di
                        motivazione venuto meno il rapporto di fiducia. In tal caso la Società sarà tenuta a rimborsare le eventuali
                        spese sostenute ed a pagare il compenso dovuto per l’opera già svolta laddove la Società abbia incassato dal
                        Cliente finale.     
                    </p>
                </body>
                
                <footer>
                    <small> <div  style="border-top: 2px solid #681B2C ; "></div>
                    <p style="font-size: 11px;"> <strong> REV-{{ $benefits_year }}-{{ $code_date }}-{{ $vat_number }}</strong> <span style="float:right"><strong>Pag. 2 di 5</strong></span> </p>
                        <div  style="font-size: 9px;">
                            SOLIDA S.R.L. <br>
                            Via Stella 1/G - 84091 Battipaglia (Sa) IT <br>
                            p.iva 05829650653 <br>
                            <a href="mailto:certificazioni@solidateam.it">certificazioni@solidateam.it</a> <br>
                            Capitale sociale 20.000 € i.v. 
                        </div></small>
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
                    <br><br><br><br><br>
                    
                    <p><strong>9) Polizza assicurativa</strong></p>
                    <p>
                        Si dà atto che il Professionista attualmente è assicurato per la responsabilità civile contro i rischi professionali,
                        con apposita polizza n. contratta con la Compagnia di Assicurazioni 
                    </p>
                    <p><strong>10) Foro competente</strong></p>
                    <p>
                        Le parti convengono che ogni controversia che dovesse insorgere in relazione al presente contratto,
                        comprese quelle relative alla sua validità, interpretazione, esecuzione, risoluzione e revoca sarà competente
                        esclusivamente il Foro di Salerno 
                    </p>
                    <p><strong>11) Elezione di domicilio</strong></p>
                    <p>
                        Per gli effetti della presente, le parti eleggono domicilio nei luoghi in precedenza indicati. 
                    </p>
                    <p><strong>12) Rinvio</strong></p>
                    <p>
                        Per quanto non espressamente previsto dalla presente lettera di incarico, si fa esplicito rimando alle norme
                        del Codice Civile che disciplinano il lavoro autonomo (art. 2229 e seguenti), alle altre norme vigenti in materia
                        nonché all'ordinamento professionale, agli obblighi deontologici ed agli usi locali. 
                    </p>
                    <p><strong>13) Protezione dei dati personali </strong></p>
                    <p>
                        Il Professionista incaricato si impegna - per se stesso e per i suoi eventuali colalboratori - nei confronti della
                        Società a trattare i dati del Cliente finale nel rispetto della normativa vigente in materia. 
                    </p>
                    <p>Battipaglia, lì «DATA»</p>

                    <div class="row">
                        <div >
                            <table class="w-100" style="height: 230px">
                                <tr>
                                    <td class="col-6 p-0">
                                        <strong><p style="text-align: center">La Società</p></strong>
                                        <strong> <center>  SOLIDA SRL </center></strong>
                                        <small><center> Il legale rappresentante</center></small>
                                        <small><center> dr. Marco Sforza</center></small>
                                        <center><img src="{{ $signature }}" width="170px" height="90px"></center>
                                    </td>
                                    <td align="right" class="col-6   p-0"> 
                                        <span style="float: right">
                                            <strong><p style="text-align: left">Il Professionista</p>

                                                <p style="text-align: left">dott.</p>
                                                <p style="text-align: left">{{ $auditor }}</p>
                                                <img style="text-align: left" src="{{ public_path($auditor_signature) }}" width="170px" height="90px">
                                                {{-- <p>{{ $auditor_signature }}</p> --}}
                                            </strong>
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <p>
                        Il presente conferimento incarico viene redatto in duplice copia, consegnato alle parti, le quali dichiarano di
                        averlo letto in ogni suo punto, di condividerne il contenuto e di accettarlo per intero escludendo, pertanto,
                        l’applicazione al caso di specie della disciplina sulle clausole vessatorie                         
                    </p>

                    <div class="row">
                        <div >
                            <table class="w-100" style="height: 230px">
                                <tr>
                                    <td class="col-6 p-0">
                                        <strong><p style="text-align: center">La Società</p></strong>
                                        <strong> <center>  SOLIDA SRL </center></strong>
                                        <small><center> Il legale rappresentante</center></small>
                                        <small><center> dr. Marco Sforza</center></small>
                                        <center><img src="{{ $signature }}" width="170px" height="90px"></center>
                                    </td>
                                    <td align="right" class="col-6   p-0"> 
                                        <span style="float: right">
                                            <strong><p style="text-align: left">Il Professionista</p>

                                                <p style="text-align: left">dott.</p>
                                                <p style="text-align: left">{{ $auditor }}</p>
                                                <img style="text-align: left" src="{{ public_path($auditor_signature) }}" width="170px" height="90px">
                                                {{-- <p>{{ $auditor_signature }}</p> --}}
                                            </strong>
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </body>
                
                <footer>
                    <small> <div  style="border-top: 2px solid #681B2C ; "></div>
                    <p style="font-size: 11px;"> <strong> REV-{{ $benefits_year }}-{{ $code_date }}-{{ $vat_number }}</strong> <span style="float:right"><strong>Pag. 3 di 5</strong></span> </p>
                        <div  style="font-size: 9px;">
                            SOLIDA S.R.L. <br>
                            Via Stella 1/G - 84091 Battipaglia (Sa) IT <br>
                            p.iva 05829650653 <br>
                            <a href="mailto:certificazioni@solidateam.it">certificazioni@solidateam.it</a> <br>
                            Capitale sociale 20.000 € i.v. 
                        </div></small>
                </footer>
            </div>
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</html>