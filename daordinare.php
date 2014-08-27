<?php
include 'access.inc.php';
include 'configuration.php';

if(!userIsLoggedIn())
{
    $GLOBALS['loginError'] = "Non hai effettuato il login. Inserire email e password";
    include 'index.php';
}
if(!userHasRole('Amministratore'))
{

    $GLOBALS['loginError'] = "Non sei autorizzato ad accedere alla pagina di amministrazione";
    include 'index.php';
}
?>
<!DOCTYPE HTML>

<html>
<head>
    <title>Area Privata - Da ordinare</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=1040" />
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600|Arvo:700" rel="stylesheet" type="text/css" />
    <!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.dropotron.min.js"></script>
    <script src="js/config.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-panels.min.js"></script>
    <script src="js/utilità.js"></script>
    <noscript>
        <link rel="stylesheet" href="css/skel-noscript.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/style-desktop.css" />
    </noscript>
</head>
<body class="no-sidebar">

<!-- Header Wrapper -->
<div id="header-wrapper">

    <!-- Header -->
    <div id="header" class="container">

        <?php

            include 'menuAdmin.php';

        ?>

    </div>

</div>

<!-- Main Wrapper -->
<div id="main-wrapper">

    <!-- Main -->
    <div id="main" class="container">
        <div class="row">

            <!-- Content -->
            <div id="content" class="12u skel-cell-important">

                <!-- Post -->
                <article class="is-post" style="align-content: center">
                    <form method="get" action="" name="dati_utente" id="dati_utente" target="_parent" onsubmit="return false" >
                        <header>
                            <div><br><h2>Da ordinare</h2></div>
                        </header>
                        <div class="row">
                            <div class="3u">
                                <h3 style="color: #ed786a">Titolo</h3>
                            </div>
                            <div class="3u">
                                <h3 style="color: #ed786a">Casa Ed /Distr</h3><br>
                            </div>
                            <div class="1u">
                                <h3 style="color: #ed786a">Qtà Mag.</h3>
                            </div>
                            <div class="1u">
                                <h3 style="color: #ed786a">Qtà Ord.</h3>
                            </div>
                            <div class="2u">
                                <h3 style="color: #ed786a">Data Ord.</h3>
                            </div>
                            <div class="2u">
                                <h3 style="color: #ed786a">Azioni</h3>
                            </div>
                        </div>
                        <div class="row image">
                            <div class="3u">
                                <input id="titolo" name="titolo" type="text" class="text">
                                <input id="autore" name="autore" type="text" class="text">
                                <input id="casaeditrice" name="casaeditrice" type="text" class="text">
                                <input id="distributore" name="distributore" type="text" class="text">
                            </div>
                            <div class="3u">
                                <input id="prezzo" name="prezzo" type="text" class="text">
                                <input id="prezzoacquisto" name="prezzoacquisto" type="text" class="text">
                            </div>
                            <div class="1u">
                                <input id="qtamag" name="qtamag" type="text" class="text">
                            </div>
                            <div class="1u">
                                <input id="qtaord" name="qtaord" type="text" class="text">
                            </div>
                            <div class="2u">
                                <input id="dataord" name="dataord" placeholder="0" type="text" class="text">
                            </div>
                            <div class="2u">
                                <a href="" class="fa fa-edit" id="modifica" title="Modifica">Modifica</a><br>
                                <a href="" class="fa fa-times" id="cancella" title="Cancella">Cancella</a><br>
                                <a href="" class="fa fa-plus" id="ordina" title="Ordina">Ordinato</a>
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <button class="button button-icon fa fa-print">Stampa</button>
                            <button class="button button-icon fa fa-trash-o">Svuota</button>
                        </div>
                    </form>
                </article>
            </div>
        </div>
    </div>
</div>
</body>
</html>

