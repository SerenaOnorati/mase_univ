<!DOCTYPE HTML>

<html>
<head>
    <title>Area Privata - Libri arrivati</title>
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
        <?php
        if(isset($no_ordini))
            echo "<h3 style=\"color: #ed786a\">".$no_ordini."</h3>";
        ?>
        <div class="row">

            <!-- Content -->
            <div id="content" class="12u skel-cell-important">

                <!-- Post -->
                <article class="is-post" style="align-content: center !important">
                    <form method="get" action="" name="form_arrivati" id="form_arrivati" target="_parent" onsubmit="return false" >
                        <header>
                            <div class="row">
                                <div class="10u">
                                    <div><br><h2>Libri arrivati</h2></div>
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
                            <div class="8u">
                                <h3 style="color: #ed786a">Info Libro</h3>
                            </div>
                            <div class="2u">
                                <h3 style="color: #ed786a">Qtà</h3>
                            </div>
                            <div class="2u">
                                <h3 style="color: #ed786a">Azioni</h3>
                            </div>

                        </div>
                        <br>
                        <div id="daordinare">
                            <?php
                            if(!isset($no_ordini))
                            {
                                foreach ($risultati as $risultato): ?>
                                    <?php
                                    $id = $risultato['isbn'].$risultato['id_ordine'];
                                    ?>
                                    <form action="" method="post" onsubmit="return false">
                                        <div class="row" id="row<?php echo $id; ?>">
                                            <div class="2u">
                                                <input type="hidden" id="copertina<?php echo $id; ?>" value="<?php echo $risultato['copertina']; ?>">
                                                <div id="copertinalink<?php echo $id; ?>"  class="image">
                                                    <?php
                                                    $slash = "\\";
                                                    $copertina = $risultato['copertina'];
                                                    if(strcmp($copertina, $slash) != 0)
                                                    {
                                                        echo "
                                                                    <a href=\"upload/images/copertina".$copertina."\" target=\"_blank\">
                                                                        <img src=\"upload/images/copertina".$copertina."\">
                                                                    </a>
                                                                    ";
                                                    }
                                                    else
                                                    {
                                                        $copertina = "\\non_trovata.jpg" ;
                                                        echo "
                                                                    <a href=\"upload/images/copertina".$copertina."\" target=\"_blank\">
                                                                        <img src=\"upload/images/copertina".$copertina."\">
                                                                    </a>
                                                                    ";
                                                    }
                                                    ?>

                                                </div>
                                            </div>
                                            <div class="4u">
                                                <label id="titolo<?php echo $id; ?>" for="titolo<?php echo $id; ?>" class="text"><strong style="color: lightseagreen">TITOLO&nbsp;:</strong><?php echo $risultato['titolo']; ?></label>
                                                <label id="autore<?php echo $id; ?>" for="autore<?php echo $id; ?>" class="text"><strong style="color: lightseagreen">AUTORE&nbsp;:</strong><?php echo $risultato['autore']; ?></label>
                                                <label id="casaeditrice<?php echo $id; ?>" for="casaeditrice<?php echo $id; ?>" class="text"><strong style="color: lightseagreen">CASA ED.&nbsp;:</strong><?php echo $risultato['nome']; ?></label>
                                                <label id="distributore<?php echo $id; ?>" for="distributore<?php echo $id; ?>" class="text"><strong style="color: lightseagreen">DISTR.&nbsp;:</strong><?php echo $risultato['nome_distributore']; ?></label>
                                                <label id="isbn<?php echo $id; ?>" for="isbn<?php echo $id; ?>" class="text"><strong style="color: lightseagreen">ISBN&nbsp;:</strong><?php echo $risultato['isbn']; ?></label>
                                            </div>
                                            <div class="2u">
                                                <label id="locazione<?php echo $id; ?>" for="locazione<?php echo $id; ?>" class="text"><strong style="color: lightseagreen">Locazione&nbsp;:</strong><?php echo $risultato['locazione']; ?></label>
                                                <label id="prezzo<?php echo $id; ?>" for="prezzo<?php echo $id; ?>" class="text"><strong style="color: lightseagreen">Prezzo&nbsp;:</strong><?php echo $risultato['prezzo']; ?></label>
                                                <label id="prezzoacquisto<?php echo $id; ?>" for="prezzoacquisto<?php echo $id; ?>" class="text"><strong style="color: lightseagreen">Prezzo acq&nbsp;:</strong><?php echo $risultato['prezzo_acquisto']; ?></label>
                                                <label id="data<?php echo $id; ?>" for="data<?php echo $id; ?>" class="text"><strong style="color: lightseagreen">DATA&nbsp;:</strong><?php echo $risultato['anno_acquisto']; ?></label>
                                                <label id="dataordina<?php echo $id; ?>" for="data<?php echo $id; ?>" class="text"><strong style="color: lightseagreen">DATA ORD&nbsp;:</strong><?php echo $risultato['data_ordine']; ?></label>
                                            </div>
                                            <div class="2u">
                                                <label id="qtamag<?php echo $id; ?>" for="qtamag<?php echo $id; ?>"><strong style="color: lightseagreen">Qta Mag&nbsp;:</strong><?php echo $risultato['quantita']; ?></label>
                                                <input id="qtaord<?php echo $id; ?>" name="qtaord<?php echo $id; ?>" type="text" class="text" placeholder="Qta Ord" value="<?php echo $risultato['quantita_ordine']; ?>" disabled>
                                                <input id="qtaord_old<?php echo $id; ?>" name="qtaord_old<?php echo $id; ?>" type="hidden" class="text" placeholder="Qta Ord" value="<?php echo $risultato['quantita_ordine']; ?>" disabled>

                                            </div>
                                            <div class="2u">
                                                <a href="javascript: arrivatoLibro(<?php echo $risultato['id_ordine']; ?>,<?php echo $id; ?>)" class="fa fa-plus" id="arrivato<?php echo $id; ?>" title="Libro Arrivato">Libro Arrivato</a><br>
                                                <a href="javascript: cancellaOrdine(<?php echo $risultato['id_ordine']; ?>)" class="fa fa-times" id="cancella<?php echo $id; ?>" title="Cancella">Cancella Ordine</a>
                                            </div>

                                        </div>
                                    </form>
                                    <br>
                                <?php endforeach;
                            }
                            ?>
                        </div>
                        <br>
                        <ul class="actions" style="align-content: center!important">
                            <li>
                                <?php
                                if(isset($id_ordini_array))
                                {
                                    echo "<a href=\"\" class=\"button button-icon fa fa-print\">Stampa</a>&nbsp;";
                                    echo "<script language=\"JavaScript\">
                                                      var id_ordini =". json_encode(array('id' => $id_ordini_array)).";
                                                        </script>";
                                    echo "<a href=\"javascript: svuota(id_ordini)\" class=\"button button-icon fa fa-trash-o\">Svuota</a>";
                                }
                                ?>
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