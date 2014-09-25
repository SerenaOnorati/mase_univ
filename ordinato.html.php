<!DOCTYPE HTML>

<html>
    <head>
        <title>Area Privata - Libri ordinati</title>
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
        <script src="js/stampa.js"></script>

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
                        <form method="get" action="" name="form_daordinare" id="form_ordinati" target="_parent" onsubmit="return false" >
                            <header>
                                <div class="row">
                                    <div class="10u">
                                        <div><br><h2 id="titolo_stampa">Libri ordinati</h2></div>
                                        <br>
                                    </div>
                                    <div class="2u">
                                        <p><strong style="color: lightseagreen">Seleziona per distributore</strong></p>
                                        <select name ="select" id="select" onchange="ordinaRicercaPerDistributore(select)">
                                            <!--<option selected="selected">Nome distributore</option>-->
                                            <option value="id_none">...</option>
                                            <?php
                                            include 'db.inc.php';
                                            try
                                            {
                                                $sql = 'SELECT * FROM distributore';
                                                $s = $pdo->prepare($sql);
                                                $s->execute();
                                            }

                                            catch (PDOException $e)
                                            {
                                                $error = 'Errore nella ricerca del distributore.';
                                                echo "<script language=\"JavaScript\">\n";
                                                echo "alert(\"$error\");\n";
                                                echo "</script>";
                                                exit();
                                            }

                                            $distributori = $s->fetchAll();

                                            if(!empty($distributori))
                                            {
                                                foreach ($distributori as $distributore):
                                                    if(strcmp($_SESSION['old_nome_distributore'],$distributore['nome_distributore']) == 0 )
                                                    {
                                                        echo "<option value=\"".$distributore['id_distributore']."\"selected=\"selected\" >".$distributore['nome_distributore']."</option>";
                                                    }
                                                    else
                                                        echo "<option value=\"".$distributore['id_distributore']."\">".$distributore['nome_distributore']."</option>";
                                                endforeach;
                                            }
                                            else{
                                                $error = 'La ricerca dei distributori non ha prodotto risultati.';
                                                echo "<script language=\"JavaScript\">\n";
                                                echo "alert(\"$error\");\n";
                                                echo "</script>";
                                                exit();
                                            }
                                            ?>

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
                            <div id="ordinati">
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
                                                    <label id="titolo<?php echo $id; ?>" for="titolo<?php echo $id; ?>" class="text">TITOLO&nbsp;:<strong style="color: lightseagreen"><?php echo $risultato['titolo']; ?></strong></label>
                                                    <input id="titolo<?php echo $risultato['id_ordine']; ?>" name="titolo<?php echo $risultato['id_ordine'];; ?>" type="hidden" class="text" value="<?php echo $risultato['titolo']; ?>" disabled>
                                                    <label id="autore<?php echo $id; ?>" for="autore<?php echo $id; ?>" class="text">AUTORE&nbsp;:<strong style="color: lightseagreen"><?php echo $risultato['autore']; ?></strong></label>
                                                    <input id="autore<?php echo $risultato['id_ordine']; ?>" name="autore<?php echo $risultato['id_ordine'];; ?>" type="hidden" class="text" value="<?php echo $risultato['autore']; ?>" disabled>
                                                    <label id="casaeditrice<?php echo $id; ?>" for="casaeditrice<?php echo $id; ?>" class="text">CASA ED.&nbsp;:<strong style="color: lightseagreen"><?php echo $risultato['nome']; ?></strong></label>
                                                    <input id="casa_editrice<?php echo $risultato['id_ordine']; ?>" name="casa_editrice<?php echo $risultato['id_ordine'];; ?>" type="hidden" class="text" value="<?php echo $risultato['nome']; ?>" disabled>
                                                    <label id="distributore<?php echo $id; ?>" for="distributore<?php echo $id; ?>" class="text">DISTR.&nbsp;:<strong style="color: lightseagreen"><?php echo $risultato['nome_distributore']; ?></strong></label>
                                                    <input id="distributoreval<?php echo $risultato['id_ordine']; ?>" name="distributoreval<?php echo $risultato['id_ordine'];; ?>" type="hidden" class="text" value="<?php echo $risultato['nome_distributore']; ?>" disabled>
                                                    <input id="indirizzo<?php echo $risultato['id_ordine']; ?>" name="indirizzo<?php echo $risultato['id_ordine'];; ?>" type="hidden" class="text" value="<?php echo $risultato['indirizzo']; ?>" disabled>
                                                    <input id="citta<?php echo $risultato['id_ordine']; ?>" name="citta<?php echo $risultato['id_ordine'];; ?>" type="hidden" class="text" value="<?php echo $risultato['citta']; ?>" disabled>
                                                    <input id="telefono<?php echo $risultato['id_ordine']; ?>" name="telefono<?php echo $risultato['id_ordine'];; ?>" type="hidden" class="text" value="<?php echo $risultato['telefono']; ?>" disabled>
                                                    <input id="fax<?php echo $risultato['id_ordine']; ?>" name="fax<?php echo $risultato['id_ordine'];; ?>" type="hidden" class="text" value="<?php if(isset($risultato['fax']))echo $risultato['fax']; ?>" disabled>
                                                    <input id="email<?php echo $risultato['id_ordine']; ?>" name="email<?php echo $risultato['id_ordine'];; ?>" type="hidden" class="text" value="<?php echo $risultato['email']; ?>" disabled>
                                                    <input id="cap<?php echo $risultato['id_ordine']; ?>" name="cap<?php echo $risultato['id_ordine'];; ?>" type="hidden" class="text" value="<?php if(isset($risultato['cap']))echo $risultato['cap']; ?>" disabled>
                                                    <input id="sito_web<?php echo $risultato['id_ordine']; ?>" name="sito_web<?php echo $risultato['id_ordine'];; ?>" type="hidden" class="text" value="<?php if(isset($risultato['sito_web']))echo $risultato['sito_web']; ?>" disabled>
                                                    <input id="codice_libreria<?php echo $risultato['id_ordine']; ?>" name="codice_libreria<?php echo $risultato['id_ordine'];; ?>" type="hidden" class="text" value="<?php if(isset($risultato['codice_libreria']))echo $risultato['codice_libreria']; ?>" disabled>
                                                    <input id="preferenza_ordine<?php echo $risultato['id_ordine']; ?>" name="preferenza_ordine<?php echo $risultato['id_ordine'];; ?>" type="hidden" class="text" value="<?php if(isset($risultato['preferenza_ordine']))echo $risultato['preferenza_ordine']; ?>" disabled>

                                                    <label id="preferenza<?php echo $id; ?>" for="preferenza<?php echo $id; ?>" class="text">Preferenza invio ordine&nbsp;:<strong style="color: lightseagreen"><?php echo $risultato['preferenza_ordine']; ?></strong></label>
                                                    <label id="isbn<?php echo $id; ?>" for="isbn<?php echo $id; ?>" class="text">ISBN&nbsp;:<strong style="color: lightseagreen"><?php echo $risultato['isbn']; ?></strong></label>
                                                    <input id="isbn<?php echo $risultato['id_ordine']; ?>" name="isbn<?php echo $risultato['id_ordine'];; ?>" type="hidden" class="text" value="<?php echo $risultato['isbn']; ?>" disabled>

                                                </div>
                                                <div class="2u">
                                                    <label id="locazione<?php echo $id; ?>" for="locazione<?php echo $id; ?>" class="text">Locazione&nbsp;:<strong style="color: lightseagreen"><?php echo $risultato['locazione']; ?></strong></label>
                                                    <label id="prezzo<?php echo $id; ?>" for="prezzo<?php echo $id; ?>" class="text">Prezzo&nbsp;:<strong style="color: lightseagreen"><?php echo $risultato['prezzo']; ?></strong></label>
                                                    <label id="prezzoacquisto<?php echo $id; ?>" for="prezzoacquisto<?php echo $id; ?>" class="text">Prezzo acq&nbsp;:<strong style="color: lightseagreen"><?php echo $risultato['prezzo_acquisto']; ?></strong></label>
                                                    <label id="data<?php echo $id; ?>" for="data<?php echo $id; ?>" class="text">DATA&nbsp;:<strong style="color: lightseagreen"><?php echo $risultato['anno_acquisto']; ?></strong></label>
                                                    <label id="dataordina<?php echo $id; ?>" for="data<?php echo $id; ?>" class="text">DATA ORDINE&nbsp;:<br><strong style="color: lightseagreen"><?php echo $risultato['data_ordine']; ?></strong></label>
                                                </div>
                                                <div class="2u">
                                                    <label id="qtamag<?php echo $id; ?>" for="qtamag<?php echo $id; ?>">Qta Mag&nbsp;:<strong style="color: lightseagreen"><?php echo $risultato['quantita']; ?></strong></label>
                                                    <input id="qtaord<?php echo $id; ?>" name="qtaord<?php echo $id; ?>" type="text" class="text" placeholder="Qta Ord" value="<?php echo $risultato['quantita_ordine']; ?>" disabled>
                                                    <input id="qtaord<?php echo $risultato['id_ordine']; ?>" name="qtaord<?php echo $risultato['id_ordine'];; ?>" type="hidden" class="text" value="<?php echo $risultato['quantita_ordine']; ?>" disabled>
                                                    <input id="qtaord_old<?php echo $id; ?>" name="qtaord_old<?php echo $id; ?>" type="hidden" class="text" placeholder="Qta Ord" value="<?php echo $risultato['quantita_ordine']; ?>" disabled>

                                                </div>
                                                <div class="2u">
                                                    <a href="javascript: modificaOrdine(<?php echo $risultato['isbn']; ?>, <?php echo $risultato['id_ordine']; ?>)" class="fa fa-edit" id="modifica<?php echo $risultato['isbn']; ?><?php echo $risultato['id_ordine']; ?>" title="Modifica">Modifica Ordine</a><br>
                                                    <a href="javascript: arrivatoLibro(<?php echo $risultato['id_ordine']; ?>,<?php echo $risultato['isbn']; ?>,<?php echo $risultato['quantita_ordine']; ?>,<?php echo $id; ?>)" class="fa fa-plus" id="arrivato<?php echo $id; ?>" title="Libro Arrivato">Libro Arrivato</a><br>
                                                    <a href="javascript: cancellaOrdine(<?php echo $risultato['id_ordine']; ?>, true)" class="fa fa-times" id="cancella<?php echo $id; ?>" title="Cancella">Cancella Ordine</a>
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
                                        echo "<script language=\"JavaScript\">
                                                      var id_ordini =". json_encode(array('id' => $id_ordini_array)).";
                                                        </script>";
                                        echo "<a href=\"javascript: stampa(id_ordini)\" class=\"button button-icon fa fa-print\">Stampa</a>&nbsp;";
                                        echo "<a href=\"javascript: ArrivatiTuttiOrdinati(id_ordini)\" class=\"button button-icon fa fa-truck\">Arrivati tutti</a>&nbsp;";
                                        echo "<a href=\"javascript: svuota(id_ordini, 'ordinati')\" class=\"button button-icon fa fa-trash-o\">Svuota</a>";
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

