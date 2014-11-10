
<!DOCTYPE HTML>
    <html>
    <head>
        <title>Area Privata - Modifica Casa Editrice</title>
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
                        <form method="post" action="inserisci_casa_editrice.php" name="inserisci_casa_edistrice" onsubmit="return false">

                            <header>
                                <div><br><h2>Modifica casa editrice</h2></div>
                            </header>


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
                                            <a href="javascript:cancellaDistributore(<?php echo ($risultato['id_distributore']); ?>)" class="fa fa-times" title="Cancella" style="color:red">Cancella</a>
                                        </div>
                                    </div>
                                </form>
                                <br>
                            <?php endforeach; ?>
                        </form>
                    </article>
                </div>
            </div>
        </div>
    </body>
    </html>
