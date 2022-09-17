<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Document</title>
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        
        <style>
            body {
                padding: 0;
                font: 5pt ;
                margin-left: 200px; 
                margin-right: 200px; 
            }
            
            /* @media print {
                .pos { position: relative; z-index: 0; left: 0px; top: 0px }
            } */
            p{
                font: 1pt;
                margin-top: 6px; 
                margin-bottom: 6px; 
            }
            </style>
    </head>
    <body >
        <br><br>
        <div style="page-break-after: always;">
            <center class="pos" style="font-size: 20px"><strong>  SCRITTURA PRIVATA AVENTE AD OGGETTO <br>
                IL CONFERIMENTO DELL’INCARICO PROFESSIONALE </strong></center>
                <br>
                <p>
                    Il sottoscritto Sig. _____________________________________ nato a ___________________
                    il______________, residente a ___________________________________________________
                    in via ____________________________________________________________ n. _________,
                    C.F. ______________________________, in nome e per conto della <strong>{{ $company_name}} </strong>, con
                    sede in  <strong>{{ $company_address }}</strong> , p.iva <b>{{ $vat_number }}</b>,
                    <br>
                    P.E.C._____________________
                    <br>
                    esercente l’attività di ____________________________________________,nella qualità di
                    ___________________________;
                    <br><br><span style="float: right;"><strong>
                        successivamente denominato “Cliente”, 
                    </strong></span>
                </p>
                <br>
                <br>
                <center><strong>CONFERISCE</strong></center>
                <br>
                <br>
                <p>
                    Alla Società di revisione contabile “SOLIDA S.r.l.” in persona del Legale rapp.te p.t. Dott. Marco
                    Sforza, nato a Venezia il 11/09/1964 e residenti in Napoli, alla Via Nicolardi, n. 300 – 80131 -
                    C.F. SFR MRC 64P11 L736M - con sede legale in 84091 - BATTIPAGLIA (SA) alla Via STELLA n.
                    1/G, P.IVA: 05829650653, - PEC: <a href="mailto:solida_srl@pec.it">solida_srl@pec.it</a>;
                    <br><br><span style="float: right;"><strong>
                        successivamente denominata “Società”, 
                    </strong></span>
                </p>
                <br>
                <br>
                <p>
                    il seguente incarico professionale disciplinato dai seguenti articoli ed accettato dalla Solida mediante
                    sottoscrizione della presente lettera di incarico da parte del legale rappresentante.
                </p>
                <p><strong>  1. Oggetto e complessità dell’incarico </strong></p>                
                <p>
                    Certificazione relativa al credito d’imposta per {{ $benefits_name }} annualità {{ $benefits_year }} dell’azienda {{ $company_name}} , {{ $company_address }}, p.iva {{ $vat_number }}.
                </p>
                <p>
                    Nell'espletamento dell'incarico la Società potrà avvalersi di collaboratori e/o di personale dipendente. 
                </p>
                <p>
                    La revisione sarà svolta in conformità ai principi di revisione internazionali ISA Italia, ai principi di
                    revisione SA Italia 250B e SA Italia 720B e al principio ISQC Italia 1 elaborati ai sensi dell’art. 11,
                    comma 3, del D.Lgs. 39/2010 e adottati con determina del Ragioniere Generale dello Stato in data
                    23 dicembre 2014, ovvero ad eventuali ulteriori principi di revisione che saranno adottati in
                    sostituzione di quelli attualmente applicabili o di quelli che dovessero integrare gli stessi in materia
                    di certificazione dle bilancio ovvero di certificazione delle spese in Industria 4.0. 
                    
                </p>
                
                
                <p><strong>1.1. Attività escluse</strong></p>
                <p>
                    Il presente incarico comprende esclusivamente le prestazioni sopra indicate all’art. 1; tutto ciò che
                    non è ivi espressamente indicato non rientra nel presente incarico professionale. 
                </p>
                <p>
                    Qualora il Cliente ravvisasse la necessita di ricevere altre specifiche prestazioni dovrà farne esplicita
                    richiesta e quindi tali prestazioni formeranno oggetto di specifico incarico. 
                </p>
                <br>
                <br>
                <br>
                <br>
                
                <footer><small>
                    <div  style="border-top: 0.5px solid black ; "></div>
                    <p style="font-size: 11px;"> <strong> CLI-Form {{ $benefits_year }}-250722-{{ $vat_number }}</strong> <span style="float:right"><strong>Pag. 1 di 5</strong></span> </p>
                </small></footer>
                
        </div>
            
            
        <div style="page-break-after: always;">
            
            <p><strong>2. Esecuzione dell’incarico </strong></p>
            <p>
                Il Cliente prende atto ed accetta con la sottoscrizione del presente conferimento incarico che
                l’esecuzione dello stesso sarà affidato al Dott./Rag. {{ $auditor }} con studio in {{ $auditor_address }}, iscritto all'Ordine dei Dottori Commercialisti e degli Esperti Contabili
                {{ $auditor_city }}, sez.A / sez.B con il n. {{ $auditor__register_number_accountent }}, e al n. {{ $auditor__register_number_auditor }} del Registro dei Revisori, indirizzo e.mail/pec: <a href="mailto:{{ $auditor_pec_email }}">{{ $auditor_pec_email }}</a>
                che potrà avvalersi, sotto la propria direzione e responsabilità, di ausiliari e, solo
                in relazione a particolari attività caratterizzate da sopravvenute esigenze non prevedibili, di sostituti,
                preventivamente indicati appartenenti al network della Società. 
            </p>
            <p><strong>3. Decorrenza e durata dell’incarico </strong></p>
            <p>
                Il conferimento dell’incarico decorre dalla sottoscrizione della presente lettera di incarico e si intende
                conferito fino alla conclusione della prestazione.
            </p>
            <p><strong>4. Compensi, spese e contributi </strong></p>
            <p>
                In funzione della natura della pratica, del tempo stimato per il suo espletamento, della complessità
                della stessa, avuto riguardo all’importanza dell’opera richiesta e tenuto conto delle prestazioni
                professionali che si rendono necessarie ed indispensabili per una corretta esecuzione dell’incarico
                conferito, si prevede per l’espletamento dell’incarico, oggetto del presente mandato, un compenso
                al revisore legale preconcordato nella misura di {{ $auditor_fee }} (IVA esclusa) da corrispondersi a 30 gg.
                dalla conclusione dell'incarico ovvero dall’emissione della fattura. 
            </p>
            <p>
                Il compenso si intende comprensivo di tutti le spese, oneri ed accessori e dovrà essere corrisposto
                entro e non oltre 60 giorni dalla conclusione dell’incarico dietro presentazione di apposita fattura. 
            </p>
            <p><strong>5. Obblighi della Società</strong></p>
            <p><strong> a) Diligenza.</strong></p>
            <p>
                La Società si impegna a che la prestazione sia resa usando la normale diligenza richiesta dalla
                natura dell’attività esercitata, dalle leggi e dalle norme deontologiche della professione. 
            </p>
            <p><strong>b) Verifica dei documenti. </strong></p>
            <p>
                La Società nell’adempimento dell’incarico ricevuto non è tenuta a svolgere operazioni di verifica volte
                al rinvenimento di frodi, falsi o altre irregolarità, ad eccezione dell’ipotesi in cui ciò costituisca oggetto
                dell’incarico conferito; la documentazione e le informazioni che il Cliente fornirà dovranno essere
                complete e veritiere e, in tal senso, verranno comunque considerate. 
            </p>
            <p><strong>c) Divieto di ritenzione. </strong></p>
            <p>
                La Società trattiene ai sensi dell’art. 2235 del Codice civile, la documentazione fornita dal Cliente
                per il tempo strettamente necessario all’espletamento dell’incarico, salvo diversi accordi con il
                Cliente. 
            </p>
            <p>
                La Società trattiene la documentazione fornita dal Cliente per il tempo strettamente necessario
                all’espletamento dell’incarico, salvo diversi accordi con il Cliente. 
            </p>
            <p><strong>d) Segreto professionale. </strong></p>
            <p>
                La Società rispetta il segreto professionale non divulgando fatti o informazioni di cui è/sono venuto/i
                a conoscenza in relazione all'espletamento dell’incarico; né degli stessi può essere fatto uso, sia nel
                proprio che nell’altrui interesse, curando e vigilando che anche i soci, i collaboratori, i dipendenti e i
                tirocinanti mantengano lo stesso segreto professionale. 
            </p>
            <p><strong>e) Obblighi di informazione. </strong></p>
            <p>
                La Società si impegna a comunicare al Cliente le informazioni in ordine all’esecuzione dell’incarico,
                all’esistenza di conflitti di interesse fra la Società e il Cliente, nonché di comunicare, previamente e
                per iscritto, al Cliente i nominativi di ausiliari e/o di sostituti, diversi rispetto a quelli indicati di cui
                intende avvalersi. 
            </p>
            <br>
            <br>
            <footer><small>
                <div  style="border-top: 0.5px solid black ; "></div>
                <p style="font-size: 11px;"> <strong> CLI-Form {{ $benefits_year }}-250722-{{ $vat_number }}</strong> <span style="float:right"><strong>Pag. 2 di 5</strong></span> </p>
            </small></footer>
        </div>
        <div style="page-break-after: always;">
            
            
            <p><strong>6. Diritti e Obblighi del Cliente </strong></p>
            <p>
                <b>a)</b>  Il Cliente dichiara di essere stato informato che: 
            </p>
            <p>
                − l’incarico può essere eseguito da ciascun socio e/o professionisti appartenenti al network della
                Società in possesso dei requisiti per l’esercizio dell’attività professionale; 
            </p>
            <p>
                − ha diritto di essere informato in ordine all’esistenza di situazioni di conflitto d’interesse tra il Cliente
                e la Società, anche quando siano determinate dalla presenza di soci con finalità d’investimento.
            </p>
            <p>
                <b>v</b> Il Cliente ha l’obbligo di far pervenire tempestivamente presso la sede della Società la
                documentazione necessaria all’espletamento dell’incarico.                 
            </p>
            <p>
                A tal fine, la Società dichiara e il Cliente prende atto che la legge prevede termini e scadenze
                obbligatori per gli adempimenti connessi alla prestazione professionale indicata in oggetto. La
                consegna della documentazione occorrente alla prestazione professionale non sarà oggetto di
                sollecito o ritiro da parte della Società che, pertanto, declina ogni responsabilità per mancata o
                tardiva esecuzione dell’incarico dovuta al ritardo, incuria o inerzia da parte del Cliente. 
            </p>
            <p>
                Il Cliente e la Società convengono che la documentazione ricevuta è conservata dal Professionista
                successivamente incaricato fino alla conclusione dell’incarico. 
            </p>
            <p>
                <b>c) </b>Il Cliente deve collaborare ai fini dell’esecuzione del presente incarico consentendo ogni attività
                di accesso e controllo dei dati necessari per l’espletamento dell’incarico. 
            </p>
            <p>
                <b>d) </b>Il Cliente ha l’obbligo di informare tempestivamente la Società su qualsivoglia variazione che
                abbia inerenza all’incarico conferito mediante atti scritti. 
            </p>
            
            <p><strong>7. Antiriciclaggio</strong></p>
            <p>
                Il Cliente dichiara di essere stato informato che la Società, anche per tramite del responsabile degli
                adempimenti concernenti la normativa antiriciclaggio, è tenuta ad assolvere gli obblighi connessi alla
                prevenzione dell’utilizzo del sistema finanziario a scopo di riciclaggio e di finanziamento del
                terrorismo ai sensi del d.lgs. n. 231/2007 (come modificato dal d.lgs. 25 maggio 2017, n. 90) e, in
                particolare, a procedere all’adeguata verifica della clientela, alla conservazione e alla registrazione
                dei documenti e delle informazioni, nonché, ove necessario, alla segnalazione di operazioni
                sospette; 
            </p>
            <p>
                Si fa presente che, in attuazione di quanto stabilito dal nuovo testo dell’art. 18, co. 2, del d.lgs. n.
                231/2007, il Professionista assolve gli obblighi di identificazione e di verifica dell’identità del cliente,
                dell’esecutore e del titolare effettivo prima del conferimento dell’incarico avente ad oggetto la
                prestazione professionale. 
            </p>
            
            <p><strong>8. Protezione dei dati personali </strong></p>
            <p>
                Ai sensi del d.lgs. 30 giugno 2003, n. 196, il Cliente autorizza la Società e il Professionista e/o gli
                ausiliari e/o sostituti incaricati al trattamento dei propri dati personali per l’esecuzione dell’incarico
                affidato. 
            </p>
            <p>In particolare, il Cliente dichiara di essere stato informato circa:</p>
            <p>a) le finalità e le modalità del trattamento cui sono destinati i dati;</p>
            <p>b) la natura obbligatoria o facoltativa del conferimento dei dati;</p>
            <p>c) le conseguenze di un eventuale rifiuto di rispondere; </p>
            <p>d) i soggetti o le categorie di soggetti ai quali i dati possono essere comunicati e l’ambito di diffusione dei dati medesimi; </p>
            <p>e) i diritti di cui all’art. 7 del d.lgs. n. 196/2003;</p>
            <p>f) il nome, la denominazione o la ragione sociale e il domicilio, la residenza o la sede del responsabile del trattamento.</p>
            
            <p><strong>9. Interessi di mora </strong></p>
            <p>
                Nel caso in cui i pagamenti dei compensi, delle spese e degli acconti non siano effettuati nei termini
                di cui al precedente art. 3, saranno da corrispondere gli interessi di mora determinati ai sensi di
                legge. 
            </p>
            <br>

            <footer><small>
                <div  style="border-top: 0.5px solid black; "></div>
                <p style="font-size: 11px;"> <strong> CLI-Form {{ $benefits_year }}-250722-{{ $vat_number }}</strong> <span style="float:right"><strong>Pag. 3 di 5</strong></span> </p>
            </small></footer>
            
        </div>
        <div style="page-break-after: always;">
            
            <br>
            
            <p><strong>10. Clausola risolutiva espressa </strong></p>
            <p>
                Qualora il ritardo dei pagamenti di quanto dovuto dal cliente in base alla presente lettera di incarico
                si sia protratto per oltre 60 giorni rispetto al termine pattuito, la Società, ai sensi dell’art. 1456 del
                codice civile, ha facoltà di risolvere il contratto comunicando al Cliente, con lettera raccomandata
                A/R o P.E.C., la propria volontà di avvalersi della presente clausola. 
            </p>
            <p>
                In tale caso, la Società si impegna a adempiere agli atti, derivanti dal presente incarico, che avranno
                scadenza nel corso dei 15 giorni successivi all’avvenuta comunicazione al Cliente. 
            </p>
            <p><strong>11. Recesso della Società e Risoluzione del Cliente</strong></p>
            <p>
                La Società può recedere dal contratto per giusta causa, ovvero qualora, a suo insindacabile giudizio,
                ritenga venuto meno il rapporto fiduciario con il Cliente.
            </p>
            <p>Il mancato adempimento degli obblighi di cui all’art. 6 costituisce giusta causa di recesso. </p>
            <p>
                Il diritto di recedere dal contratto deve essere esercitato in modo da non recare pregiudizio al Cliente,
                dandogliene comunicazione per iscritto, a mezzo raccomandata A/R o P.E.C., con un preavviso di
                10 giorni, decorrenti dal ricevimento. 
            </p>
            <p>
                Il Cliente può recedere dal contratto in qualsiasi momento in presenza di una giusta causa che andrà
                comunicata con un preavviso di almeno 10 giorno alla Società. In tal caso il Cliente sarà comunque
                tenuto a rimborsare le spese sostenute ed a pagare il compenso dovuto per l’opera già svolta.
            </p>
            <p><strong>12. Polizza assicurativa ed obbligo di denuncia </strong></p>
            <p>
                La Società attualmente è assicurata per la responsabilità civile contro i rischi professionali, con
                apposita polizza n. GT1C069204P-LB massimale/i pari a euro 1.000.000 stipulata con la Compagnia
                di Assicurazioni Lloyd’s Insurance Company S.A. 
            </p>
            <p>
                La Società si riserva di indicare al Cliente, a richiesta, la polizza assicurativa del Professionista da
                incaricare. 
            </p>
            
            <p>
                La Società declina ogni responsabilità per mancata o tardiva esecuzione del mandato dovuta ad
                incuria o inerzia da parte del Cliente; verificatasi tale circostanza il Cliente non è comunque
                esonerato dal pagamento del compenso concordato. 
            </p>
            <p>
                <strong>Obbligo di denunzia e decadenza dalle azioni.</strong>  Eventuali atti, fatti o circostanze che generano o
                possono generare un danno o un pregiudizio in capo al Cliente, riconducibili, in via diretta o indiretta,
                all’attività svolta dal Professionista incaricato e imputabili a sua incuria, negligenza, inadempimento
                o simili, dovranno essere denunziati per iscritto alla Società entro 15 giorni dalla loro prima
                manifestazione.                 
            </p>
            <p>
                La mancata tempestiva denunzia determina la decadenza, in capo al Cliente, da ogni azione verso
                la Società e verso il Professionista incaricato, a titolo esemplificativo ma non esclusivo rivolta al
                risarcimento dei danni, alla restituzione del compenso pagato o rivolta a non pagare in tutto o in
                parte il compenso pattuito.
            </p>
            <p><strong>13. Legge applicabile e Foro competente </strong></p>
            <p>
                Per tutto quanto non espressamente previsto dal contratto troverà applicazione la legge Italiana
            </p>
            <p>
                Qualsiasi controversia derivante dal presente contratto avente ad oggetto la natura, l’interpretazione,
                l’applicazione e la sua esecuzione sarà di esclusiva competenza del Tribunale di Salerno 
            </p>
            <p><strong>14. Registrazione </strong></p>
            <p>
                Essendo i compensi previsti dalla presente lettera di incarico soggetti ad I.V.A., l’eventuale
                registrazione in caso d’uso deve ritenersi soggetta ad imposta fissa. 
            </p>
            <p><strong>15. Elezione di domicilio</strong></p>
            <p>Per gli effetti della presente, la Società elegge domicilio nei luoghi in precedenza indicati. </p>
            <br>
            <br>
            <footer><small>
                <div  style="border-top: 0.5px solid black; "></div>
                <p style="font-size: 11px;"> <strong> CLI-Form {{ $benefits_year }}-250722-{{ $vat_number }}</strong> <span style="float:right"><strong>Pag. 4 di 5</strong></span> </p>
            </small></footer>
            
        </div>
        <div>
            
            <br>
            <p><strong>16. Rinvio </strong></p>
            <p>
                Per quanto non espressamente previsto dalla presente lettera di incarico, si rinvia alle disposizioni
                del Codice civile sulle professioni intellettuali di cui agli artt. 2229 e seguenti del Codice civile, alla
                normativa vigente in materia, nonché all’ordinamento professionale, agli obblighi deontologici e agli
                usi locali. 
            </p>
            <br>
            <p>
                Battipaglia, lì {{ $date }}
            </p>
           
            <div class="row">
                <div >
                    <table class="w-100" style="height: 230px">
                        <tr>
                            <td class="col-6 p-0">
                                <p>Il Cliente </p> 
                                <b>{{ $company_name }}</b>
                            </td>
                            <td align="right" class="col-6   p-0"> 
                                <span style="float: right">
                                    <p style="text-align: center">La Società</p>
                                    <strong> <center>  SOLIDA SRL </center></strong>
                                    <small><center> L’Amministratore dr. Marco Sforza</center></small>
                                    <center><img src="{{ $signature }}" width="170px" height="90px"></center>
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>
                Ai sensi e per gli effetti degli artt. 1341 e 1342 del Codice civile, si accettano espressamente i
                seguenti articoli: art. 2. “Esecuzione dell’incarico”; art. 4. “Compensi, spese e contributi”; art. 6 “Diritti
                e Obblighi del Cliente”; art. 9 “Interessi di mora”; art. 10 “Clausola risolutiva espressa”; art. 11
                “Recesso”; 12 “Polizza assicurativa ed obbligo di denuncia”; art. 13 “Legge applicabile e Foro
                competente”
                
            </p>
            <div class="row">
                <div >
                    <table class="w-100" style="height: 230px">
                        <tr>
                            <td class="col-6 p-0">
                                <p>Il Cliente </p> 
                                <b>{{ $company_name }}</b>
                            </td>
                            <td align="right" class="col-6   p-0"> 
                                <span style="float: right">
                                    <p style="text-align: center">La Società</p>
                                    <strong> <center>  SOLIDA SRL </center></strong>
                                    <small><center> L’Amministratore dr. Marco Sforza</center></small>
                                    <center><img src="{{ $signature }}" width="170px" height="90px"></center>
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            
            <p>Il presente incarico redatto in duplice originale è stato sottoscritto dal Cliente anche per ricevuta. </p>
            
            <div class="row">
                <div >
                    <table class="w-100" style="height: 230px">
                        <tr>
                            <td class="col-6 p-0">
                                <p>Il Cliente </p> 
                                <b>{{ $company_name }}</b>
                            </td>
                            <td align="right" class="col-6   p-0"> 
                                <span style="float: right">
                                    <p style="text-align: center">La Società</p>
                                    <strong> <center>  SOLIDA SRL </center></strong>
                                    <small><center> L’Amministratore dr. Marco Sforza</center></small>
                                    <center><img src="{{ $signature }}" width="170px" height="90px"></center>
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            
            
          
            
            
            <footer><small>
                <div  style="border-top: 0.5px solid black; " ></div>
                <p style="font-size: 11px;"> <strong> CLI-Form {{ $benefits_year }}-250722-{{ $vat_number }}</strong> <span style="float:right"><strong>Pag. 5 di 5</strong></span> </p>
            </small></footer>
        </div>

    </body>
</html>