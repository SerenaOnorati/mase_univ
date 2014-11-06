<!DOCTYPE HTML>
    <html>
    <head>
        <title>Area Privata - Inserisci Distributore</title>
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
        <script src="js/ordini.js"></script>
        <script src="js/utente.js"></script>
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
                include 'menuAdmin.php'
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
                        <form method="post" action="inserisci_distributore.php" name="inserisci_distributore" onsubmit="return false">

                            <header>
                                <div><br><h2>Inserisci distributore</h2></div>
                            </header>
                            <div id="aggiungi">
                                <div class="row">
                                    <div class="3u">
                                        <h3 style="color: #ed786a">Nome</h3>
                                    </div>
                                    <div class="3u">
                                        <input id="insnome" name="insnome" placeholder="Inserisci Nome" type="text" class="text" value="" required>
                                    </div>

                                    <div class="3u">
                                        <h3 style="color: #ed786a">Indirizzo</h3>
                                    </div>
                                    <div class="3u">
                                        <input id="insindirizzo" name="insindirizzo" placeholder="Inserisci Indirizzo" type="text" class="text" value="" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="3u">
                                        <h3 style="color: #ed786a">Citt&aacute;</h3>
                                    </div>
                                    <div class="3u">
                                        <input id="inscitta" name="inscitta" placeholder="Inserisci Citta" type="text" class="text" value="" required>
                                    </div>
                                    <div class="3u">
                                        <h3 style="color: #ed786a">CAP</h3>
                                    </div>
                                    <div class="3u">
                                        <input id="inscap" name="inscap" placeholder="Inserisci CAP" type="text" class="text" value="" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="3u">
                                        <h3 style="color: #ed786a">Telefono</h3>
                                    </div>
                                    <div class="3u">
                                        <input id="instelefono" name="instelefono" placeholder="Inserisci Telefono" type="text" class="text" value="" required>
                                    </div>
                                    <div class="3u">
                                        <h3 style="color: #ed786a">Fax</h3>
                                    </div>
                                    <div class="3u">
                                        <input id="insfax" name="insfax" placeholder="Inserisci Fax" type="text" class="text" value="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="3u">
                                        <h3 style="color: #ed786a">Sito web</h3>
                                    </div>
                                    <div class="3u">
                                        <input id="inssitoweb" name="inssitoweb" placeholder="Inserisci Sito Web" type="text" class="text" value="">
                                    </div>
                                    <div class="3u">
                                        <h3 style="color: #ed786a">Codice Libreria</h3>
                                    </div>
                                    <div class="3u">
                                        <input id="inscodlibreria" name="inscodlibreria" placeholder="Inserisci Codice Libreria" type="text" class="text" value="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="3u">
                                        <h3 style="color: #ed786a">Preferenza invio ordine</h3>
                                    </div>
                                    <div class="3u">
                                        <select name="preferenza" id="preferenza">
                                            <option value="1">Nessuna</option>
                                            <option value="2">Email</option>
                                            <option value="3">Telefono</option>
                                            <option value="4">Sito web</option>
                                            <option value="5">In sede</option>
                                        </select>
                                    </div>
                                    <div class="3u">
                                        <h3 style="color: #ed786a">Email</h3>
                                    </div>
                                    <div class="3u">
                                        <input id="insemail" name="insemail" placeholder="Inserisci Email" type="text" class="text" value="">
                                    </div>
                                </div>
                                <br>
                                <ul class="actions" style="align-content: center!important">
                                    <li>
                                        <a href="javascript: aggiungiDistributore(preferenza)" class="button button-icon fa fa-plus">Inserisci</a>
                                    </li>
                                </ul>
                            </div>
                        </form>

                        <!-- Visualizzazione di tutti i ditributori -->
                        <?php foreach ($risultati as $risultato): ?>
                            <form action="" method="post" onsubmit="return false">
                                <div class="row" id="row<?php echo $risultato['id_distributore']; ?>">
                                    <br>

                                    <div class="3u">
                                        <label id="nome_distributore<?php echo $risultato['id_distributore']; ?>" for="titolo<?php echo $risultato['id_distributore']; ?>" class="text">NOME&nbsp;:<strong style="color: lightseagreen"><?php echo $risultato['nome_distributore']; ?></strong></label>
                                        <label id="sito_web<?php echo $risultato['id_distributore']; ?>" for="autore<?php echo $risultato['id_distributore']; ?>" class="text">SITO&nbsp;:<strong style="color: lightseagreen"><?php echo $risultato['sito_web']; ?></strong></label>
                                        <label id="email<?php echo $risultato['id_distributore']; ?>" for="casaeditrice<?php echo $risultato['id_distributore']; ?>" class="text">EMAIL&nbsp;:<strong style="color: lightseagreen"><?php echo $risultato['email']; ?></strong></label>

                                    </div>
                                    <div class="2u">
                                        <label id="telefono<?php echo $risultato['id_distributore']; ?>" for="distributore<?php echo $risultato['id_distributore']; ?>" class="text">TELEFONO&nbsp;:<strong style="color: lightseagreen"><?php echo $risultato['telefono']; ?></strong></label>
                                        <label id="fax<?php echo $risultato['id_distributore']; ?>" for="preferenza<?php echo $risultato['id_distributore']; ?>" class="text">FAX&nbsp;:<strong style="color: lightseagreen"><?php echo $risultato['fax']; ?></strong></label>
                                    </div>
                                    <div class="3u">
                                        <label id="indirizzo<?php echo $risultato['id_distributore']; ?>" for="indirizzo<?php echo $risultato['id_distributore']; ?>" class="text">INDIRIZZO&nbsp;:<strong style="color: lightseagreen"><?php echo $risultato['indirizzo']; ?></strong></label>
                                        <label id="citta<?php echo $risultato['id_distributore']; ?>" for="citta<?php echo $risultato['id_distributore']; ?>" class="text">CITTA'&nbsp;:<strong style="color: lightseagreen"><?php echo $risultato['citta']; ?></strong></label>
                                        <label id="cap<?php echo $risultato['id_distributore']; ?>" for="cap<?php echo $risultato['id_distributore']; ?>" class="text">CAP&nbsp;:<strong style="color: lightseagreen"><?php echo $risultato['cap']; ?></strong></label>

                                    </div>
                                    <div class="2u">
                                        <label id="codice_libreria<?php echo $risultato['id_distributore']; ?>" for="distributore<?php echo $risultato['id_distributore']; ?>" class="text">CODICE LIBRERIA&nbsp;:<strong style="color: lightseagreen"><?php echo $risultato['codice_libreria']; ?></strong></label>
                                        <label id="preferenza_ordine<?php echo $risultato['id_distributore']; ?>" for="preferenza<?php echo $risultato['id_distributore']; ?>" class="text">PREFERENZA&nbsp;:<strong style="color: lightseagreen"><?php echo $risultato['preferenza_ordine']; ?></strong></label>
                                    </div>
                                    <div class="2u">
                                        <a id="modificadistributore<?php echo ($risultato['id_distributore']); ?>" href="javascript:modificaDistributore(<?php echo ($risultato['id_distributore']); ?>)" class="fa fa-edit" title="Modifica">Modifica</a><br>
                                        <a href="javascript:cancellaDistributore(<?php echo ($risultato['id_distributore']); ?>)" class="fa fa-times" title="Cancella">Cancella</a>
                                    </div>
                                </div>
                            </form>
                            <br>
                        <?php endforeach; ?>
                    </article>
                </div>
            </div>
        </div>
    </body>
</html>
