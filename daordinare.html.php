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
        <script src="js/utente.js"></script>
        <script src="js/ordini.js"></script>

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
                        <form method="get" action="" name="dati_utente" id="dati_utente" target="_parent" onsubmit="return false" >
                            <header>
                                <div class="row">
                                    <div class="10u">
                                        <div><br><h2>Risultato ricerca titoli</h2></div>
                                        <br>
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
                            <?php foreach ($risultati as $risultato): ?>
                                <form action="" method="post" onsubmit="return false">
                                    <div class="row">
                                        <div class="5u">
                                            <label id="titolo<?php echo $risultato['isbn']; ?>" for="titolo<?php echo $risultato['isbn']; ?>" class="text">TITOLO:&nbsp;<?php echo $risultato['titolo']; ?></label>
                                            <label id="autore<?php echo $risultato['isbn']; ?>" for="autore<?php echo $risultato['isbn']; ?>" class="text">AUTORE:&nbsp;<?php echo $risultato['autore']; ?></label>
                                            <label id="casaeditrice<?php echo $risultato['isbn']; ?>" for="casaeditrice<?php echo $risultato['isbn']; ?>" class="text">CASA ED.:&nbsp;<?php echo $risultato['nome']; ?></label>
                                            <label id="distributore<?php echo $risultato['isbn']; ?>" for="distributore<?php echo $risultato['isbn']; ?>" class="text">DISTR.:&nbsp;<?php echo $risultato['nome_distributore']; ?></label>
                                            <label id="isbn<?php echo $risultato['isbn']; ?>" for="isbn<?php echo $risultato['isbn']; ?>" class="text">ISBN:&nbsp;<?php echo $risultato['isbn']; ?></label>

                                            <!--<input id="titolo<?php echo $risultato['isbn']; ?>" name="titolo" type="text" class="text" value="<?php echo $risultato['titolo']; ?>">
                                            <input id="autore<?php echo $risultato['isbn']; ?>" name="autore" type="text" class="text" value="<?php echo $risultato['autore']; ?>">
                                            <input id="casaeditrice<?php echo $risultato['isbn']; ?>" name="casaeditrice" type="text" class="text" value="<?php echo $risultato['nome']; ?>">
                                            <input id="distributore<?php echo $risultato['isbn']; ?>" name="distributore" type="text" class="text" value="<?php echo $risultato['isbn']; ?>">-->

                                        </div>
                                        <div class="3u">
                                            <label id="locazione<?php echo $risultato['isbn']; ?>" for="locazione<?php echo $risultato['isbn']; ?>" class="text">Locazione:&nbsp;<?php echo $risultato['locazione']; ?></label>
                                            <label id="prezzo<?php echo $risultato['isbn']; ?>" for="prezzo<?php echo $risultato['isbn']; ?>" class="text">Prezzo:&nbsp;<?php echo $risultato['prezzo']; ?></label>
                                            <label id="prezzoacquisto<?php echo $risultato['isbn']; ?>" for="prezzoacquisto<?php echo $risultato['isbn']; ?>" class="text">Prezzo acq:&nbsp;<?php echo $risultato['prezzo_acquisto']; ?></label>
                                            <label id="data<?php echo $risultato['isbn']; ?>" for="data<?php echo $risultato['isbn']; ?>" class="text">DATA:&nbsp;<?php echo $risultato['anno_acquisto']; ?></label>
                                            <a href="upload/images/copertina<?php echo $risultato['copertina']; ?>" target="_blank" class="fa fa-file-o" id="copertina<?php echo $risultato['isbn']; ?>" title="Modifica">Copertina</a><br>

                                        </div>
                                        <div class="2u">
                                            <label id="qtamag<?php echo $risultato['isbn']; ?>" for="qtamag<?php echo $risultato['isbn']; ?>">Qta Mag:&nbsp;<?php echo $risultato['quantita']; ?></label>
                                            <input id="qtaord<?php echo $risultato['isbn']; ?>" name="qtaord" type="text" class="text" placeholder="Qta Ord">
                                        </div>
                                        <div class="2u">
                                            <a href="javascript: modificaLibroDaordinare(<?php echo $risultato['isbn']; ?>)" class="fa fa-edit" id="modifica" title="Modifica">Modifica</a><br>
                                            <a href="" class="fa fa-times" id="cancella" title="Cancella">Cancella</a><br>
                                            <a href="" class="fa fa-plus" id="ordina" title="Ordina">Ordinato</a>
                                        </div>

                                    </div>
                                </form>
                                <br>
                            <?php endforeach; ?>

                            <br>
                            <ul class="actions" style="align-content: center!important">
                                <li>
                                    <a href="" class="button button-icon fa fa-print">Stampa</a>
                                    <a href="" class="button button-icon fa fa-trash-o">Svuota</a>
                                </li>
                            </ul>
                        </form>
                    </article>


                </div>
            </div>
        </div>
    </div>
    </body>
</html>

