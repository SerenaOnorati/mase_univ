
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


                            <!-- Visualizzazione di tutti le case editrici -->
                            <?php foreach ($risultati as $risultato): ?>
                                <form action="" method="post" onsubmit="return false">

                                    <div class="row" id="row<?php echo $risultato['id_casa_editrice']; ?>">
                                        <br>
                                        <input type="hidden" id="id_distributore" value="<?php echo $risultato['id_distributore']; ?>">

                                        <div class="3u">
                                            <label id="nome<?php echo $risultato['id_casa_editrice']; ?>" for="nome<?php echo $risultato['id_casa_editrice']; ?>" class="text">NOME&nbsp;:<strong style="color: lightseagreen"><?php echo $risultato['nome']; ?></strong></label>
                                        </div>
                                        <div class="3u">
                                            <label id="sito_web<?php echo $risultato['id_casa_editrice']; ?>" for="sito_web<?php echo $risultato['id_casa_editrice']; ?>" class="text">SITO&nbsp;:<strong style="color: lightseagreen"><a href="<?php echo $risultato['sito_web_casa_editrice']; ?>"><?php echo $risultato['sito_web_casa_editrice']; ?></a> </strong></label>
                                        </div>
                                        <div class="3u">
                                            <label id="nome_distributore<?php echo $risultato['id_casa_editrice']; ?>" for="nome_distributore<?php echo $risultato['id_casa_editrice']; ?>" class="text">NOME DISTR.&nbsp;:<strong style="color: lightseagreen"><?php echo $risultato['nome_distributore']; ?></strong></label>
                                        </div>
                                        <div class="3u">
                                            <a id="modificacasaedistrice<?php echo ($risultato['id_casa_editrice']); ?>" href="javascript:modificaCasaEditrice(<?php echo ($risultato['id_casa_editrice']); ?>)" class="fa fa-edit" title="Modifica">Modifica</a>
                                            <a href="javascript:cancellaCasaEditrice(<?php echo ($risultato['id_casa_editrice']); ?>)" class="fa fa-times" title="Cancella">Cancella</a>
                                        </div>
                                    </div>
                                </form>
                                <br>
                            <?php endforeach; ?>-->
                        </form>
                    </article>
                </div>
            </div>
        </div>
    </body>
    </html>
