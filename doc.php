<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Comuni - Guida API</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
        	
        	<div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <?php $host = $_SERVER['HTTP_HOST']; ?>
                    <div class="page-header">
                        <h1>Comuni <small>Guida API</small></h1>
                    </div>
                    <p> Questa guida spiega come utilizzare le API per il reperimento
                        delle informazioni di base inerenti i comuni italiani.
                        Eseguendo una semplice chiamata HTTP GET e specificano il parametro
                        <code>zip_code</code> come mostrato in questo esempio:
                    </p>
                    <pre>GET http://<?=$host;?>/municipalities?zip_code=75100</pre>
                    <p> &Egrave; possibile ottenere un risultato di questo tipo:</p>
                    <pre>{
   "error":false,
   "data":[
      {
         "name":"La Martella",
         "code":"75100",
         "region":"Basilicata",
         "country":"Italy",
         "zip_code":"75100",
         "province":"MT"
      }
   ]
}</pre>
                    <p> Esiste anche il caso in cui il codice specificato, non sia
                        italiano, in questo caso, &egrave; possibile (non certo, poich&egrave; non 
                        tutti i codice di avviamento postale sono presenti in questo sistema),
                        ottenere un output di questo tipo:
                    </p>
                    <pre>{
   "error":false,
   "data":[
      {
         "name":"Miramar",
         "country":"Messico",
         "cap":"24094"
      },
      {
         "name":"Esmeralda II",
         "country":"Messico",
         "cap":"24094"
      },
      ...
      {
         "name":"Goldbond",
         "country":"Stati Uniti",
         "cap":"24094"
      }
   ]
}</pre>
                    <p> Di seguito &egrave; presente una tabella riassuntiva
                        che elenca i campi disponibili nell'output JSON generato (nota bene: i campi
                        non in grassetto non sono obbligatori e potrebbero essere non presenti nell'output
                        finale, questo accade quando il CAP si riferisce ad un comune non italiano):
                    </p>
                    <table class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th>Campo</th>
                                <th>Descrizione</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tbody>
                                <tr>
                                    <td><strong>name</strong></td>
                                    <td>Indica il nome del comune</td>
                                </tr>
                                <tr>
                                    <td><strong>code</strong></td>
                                    <td>Indica il codice identificativo del comune (pu&ograve; essere il CAP oppure il codice identificativo ISTAT)</td>
                                </tr>
                                <tr>
                                    <td>region</td>
                                    <td>Indica la regine di appartenenza del comune</td>
                                </tr>
                                <tr>
                                    <td><strong>country</strong></td>
                                    <td>Indica lo stato di appartenenza del comune (serve per identificare sopratutto
                                        i comuni stranieri).</td>
                                </tr>
                                <tr>
                                    <td><strong>zip_code</strong></td>
                                    <td>Indica il codice di avviamento postale del comune (esatto, proprio
                                        lo stesso che avete passato come parametro di filtro nella richiesta
                                    GET).</td>
                                </tr>
                                <tr>
                                    <td>provincia</td>
                                    <td>Indica la provincia di appartenenza del comune</td>
                                </tr>
                            </tbody>
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>     
    </body>
</html>