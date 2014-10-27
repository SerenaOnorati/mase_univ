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
                                    <div class="7u">
                                        <div><h2 id="titolo_stampa">Risultato Ricerca</h2></div>

                                    </div>
                                    <div class="2u">
                                        <p><strong style="color: lightseagreen">Distributore:</strong></p>
                                    </div>
                                    <div class="3u">
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

                            <?php foreach ($risultati as $risultato): ?>
                                <form action="" method="post" onsubmit="return false">
                                    <div class="row" id="row<?php echo $risultato['isbn']; ?>">
                                        <div class="1u">
                                            <input type="hidden" id="copertina<?php echo $risultato['isbn']; ?>" value="<?php echo $risultato['copertina']; ?>">
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
                                        <div class="7u">
                                            <label id="titolo<?php echo $risultato['isbn']; ?>" for="titolo<?php echo $risultato['isbn']; ?>" class="text"><strong style="color: #3333CC">"&nbsp;<a href="javascript: modificaLibroDaordinare(<?php echo $risultato['isbn']; ?>)" style="color: #3333CC"><?php echo $risultato['titolo']; ?></a>&nbsp;"</strong></label>
                                            <input id="titolo<?php echo $risultato['isbn']; ?>" name="titolo<?php echo $risultato['isbn']; ?>" type="hidden" class="text" value="<?php echo $risultato['titolo']; ?>" disabled>

                                            <label id="autore<?php echo $risultato['isbn']; ?>" for="autore<?php echo $risultato['isbn']; ?>" class="text" style="display: inline"><strong style="color: #FF3300"><?php echo $risultato['autore']; ?></strong>,&nbsp;</label>
                                            <input id="autore<?php echo $risultato['isbn']; ?>" name="autore<?php echo $risultato['isbn']; ?>" type="hidden" class="text" value="<?php echo $risultato['autore']; ?>" disabled>

                                            <label id="casaeditrice<?php echo $risultato['isbn']; ?>" for="casa_editrice<?php echo $risultato['isbn']; ?>" class="text" style="display: inline"><strong style="color: #CC3399"><i><?php echo $risultato['nome']; ?></i></strong>,&nbsp;</label>
                                            <input id="casa_editrice<?php echo $risultato['isbn']; ?>" name="casa_editrice<?php echo $risultato['isbn']; ?>" type="hidden" class="text" value="<?php echo $risultato['nome']; ?>" disabled>

                                            <label id="distributore<?php echo $risultato['isbn']; ?>" for="distributore<?php echo $risultato['isbn']; ?>" class="text" style="display: inline"><strong style="color: #FF6666"><?php echo $risultato['nome_distributore']; ?></strong></label>
                                            <!--<label id="preferenza<?php echo $risultato['isbn']; ?>" for="preferenza<?php echo $risultato['isbn']; ?>" class="text">Preferenza invio ordine&nbsp;:<strong style="color: lightseagreen"><?php echo $risultato['preferenza_ordine']; ?></strong></label>-->
                                            <br>
                                            <label id="isbn<?php echo $risultato['isbn']; ?>" for="isbn<?php echo $risultato['isbn']; ?>" class="text" style="display: inline">ISBN&nbsp;:<strong style="color: lightseagreen"><?php echo $risultato['isbn']; ?></strong></label>
                                            <input id="isbn<?php echo $risultato['isbn']; ?>" name="isbn<?php echo $risultato['isbn']; ?>" type="hidden" class="text" value="<?php echo $risultato['isbn']; ?>" disabled>

                                            <label id="prezzoacquisto<?php echo $risultato['isbn']; ?>" for="prezzoacquisto<?php echo $risultato['isbn']; ?>" class="text" style="display: inline">Prezzo acq&nbsp;:<strong style="color: #FFCC99"><?php echo $risultato['prezzo_acquisto']; ?></strong></label>
                                            <input id="prezzoacquisto<?php echo $risultato['isbn']; ?>" name="prezzoacquisto<?php echo $risultato['isbn']; ?>" type="hidden" class="text" value="<?php echo $risultato['prezzo_acquisto']; ?>"disabled>

                                            <label id="prezzo<?php echo $risultato['isbn']; ?>" for="prezzo<?php echo $risultato['isbn']; ?>" class="text" style="display: inline">Prezzo&nbsp;:<strong style="color: lightseagreen"><?php echo $risultato['prezzo']; ?></strong></label>
                                            <input id="prezzo<?php echo $risultato['isbn']; ?>" name="prezzo<?php echo $risultato['isbn']; ?>" type="hidden" class="text" value="<?php echo $risultato['prezzo']; ?>" disabled>

                                            <label id="locazione<?php echo $risultato['isbn']; ?>" for="locazione<?php echo $risultato['isbn']; ?>" class="text" style="display: inline">,<strong style="color: red">&nbsp;[<?php echo $risultato['locazione']; ?>&nbsp;]</strong></label>
                                            <input id="locazione<?php echo $risultato['isbn']; ?>" name="locazione<?php echo $risultato['isbn']; ?>" type="hidden" class="text" value="<?php echo $risultato['locazione']; ?>" disabled>
                                            <input id="anno_acquisto<?php echo $risultato['isbn']; ?>" name="anno_acquisto<?php echo $risultato['isbn']; ?>" type="hidden" class="text" value="<?php echo $risultato['anno_acquisto']; ?>" disabled>

                                        </div>

                                        <div class="2u">
                                            <label id="qtamag<?php echo $risultato['isbn']; ?>" for="qtamag<?php echo $risultato['isbn']; ?>">Qta Mag&nbsp;:<strong style="color: lightseagreen"><?php echo $risultato['quantita']; ?></strong></label>
                                            <input id="qtamag<?php echo $risultato['isbn']; ?>" name="qtamag<?php echo $risultato['isbn']; ?>" type="hidden" class="text" value="<?php echo $risultato['quantita']; ?>" disabled>

                                            <!--<label id="stato_ordine<?php echo $risultato['isbn']; ?>" for="stato_ordine<?php echo $risultato['isbn']; ?><?php echo $risultato['isbn']; ?>">Stato Ordine&nbsp;:<strong style="color: lightseagreen"><?php include 'utilita.php'; if(ordinato($risultato['isbn']))  echo 'Si'; else echo 'No'; ?></strong></label>-->
                                            <?php
                                                if(isset($risultato['quantita_ordine']))
                                                {
                                                    echo "<label id=\"qtaordine".$risultato['isbn']."\" for=\"qtaordine".$risultato['isbn']."\">Qta Ordinata&nbsp;:<strong style=\"color: lightseagreen\">".$risultato['quantita_ordine']."</strong></label>";
                                                }
                                            ?>
                                            <input id="qtaord<?php echo $risultato['isbn']; ?>" name="qtaord<?php echo $risultato['isbn']; ?>" type="text" class="text" placeholder="Ord" style="width: 40%; margin-top: 10px;">
                                        </div>
                                        <div class="2u">
                                            <a href="javascript: modificaLibroDaordinare(<?php echo $risultato['isbn']; ?>)" class="fa fa-edit" id="modifica" title="Modifica">Modifica Libro</a><br>
                                            <a href="javascript: cancellaLibro(<?php echo $risultato['isbn']; ?>)" class="fa fa-times" id="cancella" title="Cancella">Cancella Libro</a><br>
                                            <a href="javascript: preparaOrdine(<?php echo $risultato['isbn']; ?>)" class="fa fa-plus" id="daordinare" title="Da Ordinare" style="color: #339933">Da Ordinare</a>
                                        </div>


                                    </div>
                                </form>
                                <br>
                            <?php endforeach; ?>

                            <br>
                            <!--<ul class="actions" style="align-content: center!important">
                                <li>
                                    <a href="" class="button button-icon fa fa-print">Stampa</a>
                                    <a href="" class="button button-icon fa fa-trash-o">Svuota</a>
                                </li>
                            </ul>-->
                        </form>
                    </article>


                </div>
            </div>
        </div>
    </div>
    </body>
</html>
