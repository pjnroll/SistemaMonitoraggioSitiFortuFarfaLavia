<?php
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
date_default_timezone_set('Europe/Rome');

// Pagina index della piattaforma. Verifica inizialmente se l'user è loggato, in caso negativo lo forza a loggarsi,
// altrimenti a seconda del suo ruolo mostra l'area clienti o il pannello di amministrazione.
?>


<html>
	<head>
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
		
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
        
        <title>FortuFarfaLavia</title>

        
    </head>
	
	<body>
    <div class="container" align="center">

        <?php
        // Selettore delle pagine da importare
        // Nel caso in cui l'utente è loggato, può accedere alle varie pagine
        if (isset($_SESSION['UTENTE'])) {
            switch ($_GET['action']) {
                case 'areaclienti' :
                    include 'pagine/areaclienti.php';
                    break;
                case 'pannelloamministratore' :
                    include 'pagine/interfacciaamministratore.php';
                    break;
                // Se non viene esplicitamente chiesta la pagina, viene mostrata la pagina principale relativa
                default:
                    if ($_SESSION['UTENTE']['isAdmin'] == '0')
                        include 'pagine/areaclienti.php';
                    else
                        include 'pagine/interfacciaamministratore.php';
            }
        }
        // Altrimenti se non è loggato, accedi al login o nel caso in cui è stato già tentato, accedi alla pagina con errore
        else {
            if (isset($_GET['action']) && $_GET['action'] == 'loginfailed') {
                //include $_SERVER['DOCUMENT_ROOT'] . '/pagine/login.php';
                include 'pagine/login.php';
            }
            else
                //include $_SERVER['DOCUMENT_ROOT'].'/pagine/login.php';
                include 'pagine/login.php';
        }
        ?>
    </div>
    </body>
</html>
