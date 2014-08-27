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
    <title>Area Privata - Ordinato</title>
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
    <script src="js/ordini.js.js"></script>
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
                <article class="is-post" style="align-content: center !important">
                    <form method="get" action="" name="ordinato" id="ordinato" target="_parent" onsubmit="return false" >
                        <header>
                            <div class="row">
                                <div class="10u">
                                    <div><br><h2>Ordinato</h2></div>
                                </div>
                                <div class="2u">
                                    <p>Ordina per</p>
                                    <select name="ordinaper_daordinare">
                                        <option value="Titolo">Titolo</option>
                                        <option value="Autore">Autore</option>
                                        <option value="CasaEditrice">Casa Editrice</option>
                                        <option value="Locazione">Locazione</option>
                                        <option value="Data">Data</option>
                                        <option value="Isbn">ISBN</option>
                                    </select>
                                </div>
                            </div>
                        </header>


                        <div class="row">
                            <div class="5u">
                                <h3 style="color: #ed786a">Info Libro</h3>
                            </div>
                            <div class="3u">
                                <h3 style="color: #ed786a"></h3><br>
                            </div>
                            <div class="2u">
                                <h3 style="color: #ed786a">Qtà</h3>
                            </div>
                            <div class="2u">
                                <h3 style="color: #ed786a">Azioni</h3>
                            </div>

                        </div>
                        <div class="row">
                            <div class="5u">
                                <!--<input id="total" type="text" class="text" value="Titolo" disabled>
                                <input id="total" type="text" class="text" value="Casa Editrice Distributore" disabled>-->
                                <label id="titolo" name="titolo" type="text" class="text">TITOLO:</label>
                                <label id="autore" name="autore" type="text" class="text">AUTORE:</label>
                                <label id="casaeditrice" name="casaeditrice" type="text" class="text">CASA ED.:</label>
                                <label id="distributore" name="distributore" type="text" class="text">DISTR.:</label>
                                <label id="isbn" name="isbn" type="text" class="text">ISBN:</label>

                                <!--<input id="titolo" name="titolo" type="text" class="text">
                                <input id="autore" name="autore" type="text" class="text">
                                <input id="casaeditrice" name="casaeditrice" type="text" class="text">
                                <input id="distributore" name="distributore" type="text" class="text">-->
                            </div>
                            <div class="3u">
                                <label id="locazione" name="locazione" type="text" class="text">Locazione:</label>
                                <label id="prezzo" name="prezzo" type="text" class="text">Prezzo:</label>
                                <label id="prezzoacquisto" name="prezzoacquisto" type="text" class="text">Prezzo acq:</label>
                                <label id="data" name="data" type="text" class="text">DATA:</label>
                                <a href="" class="fa fa-file-o" id="modifica" title="Modifica">Immagine</a><br>

                            </div>
                            <div class="2u">
                                <label id="qtamag" name="qtamag" type="text" class="text">Qta Mag</label>
                                <input id="qtaord" name="qtaord" type="text" class="text" placeholder="Qta Ord">
                            </div>
                            <div class="2u">
                                <a href="" class="fa fa-edit" id="modifica" title="Modifica">Modifica</a><br>
                                <a href="" class="fa fa-times" id="cancella" title="Cancella">Cancella</a><br>
                                <a href="" class="fa fa-plus" id="ordina" title="Ordina">Ordinato</a>
                            </div>

                        </div>
                        <br>

                        <div class="row">
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

