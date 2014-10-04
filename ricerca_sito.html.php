<!DOCTYPE HTML>

<html>
    <head>
        <title>Risultato ricerca libri</title>
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
        <script src="js/mail.js"></script>

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
                include 'menu.php';
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
                                    <?php
                                        if(isset($checkError))
                                        {
                                            echo "<h3 style=\"color: #ed786a\">".$checkError."</h3>";
                                        }
                                    ?>

                                    <div class="10u">
                                        <div><br><h2>Risultato ricerca titoli</h2></div>
                                        <br>
                                    </div>
                                </div>
                            </header>
                            <?php if(!isset($checkError)){?>
                            <div class="row">
                                <div class="8u">
                                    <h3 style="color: #ed786a">Info Libro</h3>
                                </div>
                            </div>
                            <?php } ?>
                            <?php if(!isset($checkError)){foreach ($risultati as $risultato): ?>
                                <form action="" method="post" onsubmit="return false">
                                    <div class="row" id="row<?php echo $risultato['isbn']; ?>">
                                        <div class="2u">
                                            <input type="hidden" id="copertina<?php echo $risultato['isbn']; ?>" value="<?php echo $risultato['copertina']; ?>">
                                            <div id="copertinalink<?php echo $risultato['isbn']; ?>"  class="image">
                                                <?php
                                                include 'configuration.php';
                                                    $copertina = $risultato['copertina'];
                                                    if(strcmp($copertina, "") != 0)
                                                    {
                                                        echo "
                                                                            <a href=\"".$image_libro_path.$copertina."\" target=\"_blank\">
                                                                                <img src=\"".$image_libro_path.$copertina."\">
                                                                            </a>
                                                                            ";
                                                    }
                                                    else
                                                    {
                                                        $copertina = "non_trovata.jpg" ;
                                                        echo "
                                                                            <a href=\"".$image_libro_path.$copertina."\" target=\"_blank\">
                                                                                <img src=\"".$image_libro_path.$copertina."\">
                                                                            </a>
                                                                            ";
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="4u">
                                            <label id="titolo<?php echo $risultato['isbn']; ?>" for="titolo<?php echo $risultato['isbn']; ?>" class="text">TITOLO&nbsp;:<strong style="color: lightseagreen"><?php echo $risultato['titolo']; ?></strong></label>
                                            <label id="autore<?php echo $risultato['isbn']; ?>" for="autore<?php echo $risultato['isbn']; ?>" class="text">AUTORE&nbsp;:<strong style="color: lightseagreen"><?php echo $risultato['autore']; ?></strong></label>
                                            <label id="casaeditrice<?php echo $risultato['isbn']; ?>" for="casaeditrice<?php echo $risultato['isbn']; ?>" class="text">CASA ED.&nbsp;:<strong style="color: lightseagreen"><?php echo $risultato['nome']; ?></strong></label>
                                        </div>
                                        <div class="2u">
                                            <label id="isbn<?php echo $risultato['isbn']; ?>" for="isbn<?php echo $risultato['isbn']; ?>" class="text">ISBN&nbsp;:<strong style="color: lightseagreen"><?php echo $risultato['isbn']; ?></strong></label>
                                            <label id="prezzo<?php echo $risultato['isbn']; ?>" for="prezzo<?php echo $risultato['isbn']; ?>" class="text">Prezzo&nbsp;:<strong style="color: lightseagreen"><?php echo $risultato['prezzo']; ?></strong></label>
                                            <label id="data<?php echo $risultato['isbn']; ?>" for="data<?php echo $risultato['isbn']; ?>" class="text">DATA&nbsp;:<strong style="color: lightseagreen"><?php echo $risultato['anno_acquisto']; ?></strong></label>

                                        </div>
                                        <!--
                                        <div class="2u">
                                            <a href="javascript: modificaLibroDaordinare(<?php echo $risultato['isbn']; ?>)" class="fa fa-edit" id="modifica" title="Modifica">Modifica Libro</a><br>
                                            <a href="javascript: cancellaLibro(<?php echo $risultato['isbn']; ?>)" class="fa fa-times" id="cancella" title="Cancella">Cancella Libro</a><br>
                                            <a href="javascript: preparaOrdina(<?php echo $risultato['isbn']; ?>)" class="fa fa-plus" id="daordinare" title="Da Ordinare">Da Ordinare</a>
                                        </div>-->

                                    </div>
                                </form>
                                <br>
                            <?php endforeach;} ?>
                        </form>
                    </article>
                </div>
            </div>
        </div>
    </div>
    <?php
        include 'footer.php';
    ?>
    </body>
</html>
