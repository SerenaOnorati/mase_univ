<!DOCTYPE HTML>
<html>
<head>
    <title>Area Privata - Inserisci Casa Editrice</title>
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
                            <div><br><h2>Inserisci o Modifica casa editrice</h2></div>
                        </header>
                        <a href="javascript:aggiungiRigaCasaEditrice()" class="fa fa-plus-square" title="Aggiungi">Aggiungi Casa Editrice </a>
                        <br>
                        <div id="aggiungi" style="display: none" onsubmit="return false">
                            <div class="row">
                                <div class="3u">
                                    <h3 style="color: #ed786a">Nome</h3>
                                </div>
                                <div class="3u">
                                    <input id="insnome" name="insnome" placeholder="Inserisci Nome" type="text" class="text" value="" required>
                                </div>

                                <div class="3u">
                                    <h3 style="color: #ed786a">Sito web</h3>
                                </div>
                                <div class="3u">
                                    <input id="inssitoweb" name="inssitoweb" placeholder="Inserisci Sito Web" type="text" class="text" value="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="3u">
                                    <h3 style="color: #ed786a">Distributore</h3>
                                </div>
                                <div class="3u">
                                    <select name ="distributore" id="distributore">
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

                            <br>
                            <ul class="actions" style="align-content: center!important">
                                <li>
                                    <a href="javascript: aggiungiCasaEditrice(distributore)" class="button button-icon fa fa-plus">Inserisci</a>
                                </li>
                            </ul>
                        </div>
                    </form>

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
                                    <label id="sito_web<?php echo $risultato['id_casa_editrice']; ?>" for="sito_web<?php echo $risultato['id_casa_editrice']; ?>" class="text">SITO&nbsp;:<strong style="color: lightseagreen"><a href="<?php echo $risultato['sito_web']; ?>"><?php echo $risultato['sito_web']; ?></a> </strong></label>
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
                    <?php endforeach; ?>
                </article>
            </div>
        </div>
    </div>
</body>
</html>
