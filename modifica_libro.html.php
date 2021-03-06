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
        <title>Area Privata - Modifica Libro</title>
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
        <script src="js/upclick.js"></script>

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
                        <form method="post" action="" name="modifica_libro" onsubmit="return false">
                            <header>
                                <div><br><h2>Modifica libro</h2></div>
                            </header>
                            <div class="row">
                                <div class="3u">
                                    <h3 style="color: #ed786a">Autore</h3>
                                </div>
                                <div class="3u">
                                    <input type="hidden" id="autore_old" value="<?php echo $_GET['autore']; ?>">
                                    <input id="autore" name="autore"  type="text" class="text" value="<?php echo $_GET['autore'] ?>">
                                </div>

                                <div class="3u">
                                    <h3 style="color: #ed786a">ISBN</h3>
                                </div>
                                <div class="3u">
                                    <input type="hidden" id="isbn_old" value="<?php echo $_GET['isbn']; ?>">
                                    <input id="isbn" name="isbn" type="text" class="text" value="<?php echo $_GET['isbn'] ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="3u">
                                    <h3 style="color: #ed786a">Titolo</h3>
                                </div>
                                <div class="3u">
                                    <input type="hidden" id="titolo_old" value="<?php echo $_GET['titolo']; ?>">
                                    <input id="titolo" name="titolo" type="text" class="text" value="<?php echo $_GET['titolo'] ?>">
                                </div>
                                <div class="3u">
                                    <h3 style="color: #ed786a">Locazione</h3>
                                </div>
                                <div class="3u">
                                    <input type="hidden" id="locazione_old" value="<?php echo $_GET['locazione']; ?>">
                                    <input id="locazione" name="locazione"  type="text" class="text" value="<?php echo $_GET['locazione'] ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="3u">
                                    <h3 style="color: #ed786a">Casa Editrice</h3>
                                </div>
                                <div class="3u">
                                    <?php
                                    include 'db.inc.php';
                                    try
                                    {
                                        $sql = 'SELECT * FROM casa_editrice';
                                        $s = $pdo->prepare($sql);
                                        $s->execute();
                                    }

                                    catch (PDOException $e)
                                    {
                                        $error = 'Errore nella ricerca delle case editrici.';
                                        echo "<script language=\"JavaScript\">\n";
                                        echo "alert(\"$error\");\n";
                                        echo "</script>";
                                        exit();
                                    }

                                    $case_editrici = $s->fetchAll();

                                    if(!empty($case_editrici))
                                    {
                                        echo "<select id=\"case_editrici\" name=\"case_editrici\">";
                                        $casa_editrice ="";
                                        foreach ($case_editrici as $case_editrice):
                                            if(strcmp($_GET['casa_editrice'],$case_editrice['nome']) == 0 )
                                            {
                                                echo "<option value=\"".$case_editrice['id_casa_editrice']."\"selected=\"selected\" >".$case_editrice['nome']."</option>";
                                                $casa_editrice = $case_editrice['id_casa_editrice'];
                                            }
                                            else
                                                echo "<option value=\"".$case_editrice['id_casa_editrice']."\">".$case_editrice['nome']."</option>";
                                        endforeach;
                                        echo "</select>";
                                        echo "<input type = \"hidden\" id=\"id_casa_editrice_old\" value=\"".$casa_editrice."\">";

                                    }
                                    else{
                                        $error = 'La ricerca delle case editrici non ha prodotto risultati.';
                                        echo "<script language=\"JavaScript\">\n";
                                        echo "alert(\"$error\");\n";
                                        echo "</script>";
                                        exit();
                                    }
                                    ?>
                                </div>
                                <div class="3u">
                                    <h3 style="color: #ed786a">Anno Acquisto</h3>
                                </div>
                                <div class="3u">
                                    <input type="hidden" id="anno_acquisto_old" value="<?php echo $_GET['anno_acquisto']; ?>">
                                    <input id="anno_acquisto" name="anno_acquisto" type="text" class="text" value="<?php echo $_GET['anno_acquisto'] ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="3u">
                                    <h3 style="color: #ed786a">Quantita'</h3>
                                </div>
                                <div class="3u">
                                    <input type="hidden" id="quantita_old" value="<?php echo $_GET['quantita']; ?>">
                                    <input id="quantita" name="quantita" type="text" class="text" value="<?php echo $_GET['quantita'] ?>">
                                </div>
                                <div class="3u">
                                    <h3 style="color: #ed786a">Prezzo</h3>
                                </div>
                                <div class="3u">
                                    <input type="hidden" id="prezzo_old" value="<?php echo $_GET['prezzo']; ?>">
                                    <input id="prezzo" name="prezzo" type="text" class="text" value="<?php echo $_GET['prezzo'] ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="3u">
                                    <h3 style="color: #ed786a">Prezzo Acquisto</h3>
                                </div>
                                <div class="3u">
                                    <input type="hidden" id="prezzo_acquisto_old" value="<?php echo $_GET['prezzo_acquisto']; ?>">
                                    <input id="prezzo_acquisto" name="prezzo_acquisto" type="text" class="text" value="<?php echo $_GET['prezzo_acquisto']?>">
                                </div>
                                <div class="3u">
                                    <h3 style="color: #ed786a">Copertina</h3>
                                </div>
                                <div class="3u">
                                    <input type="hidden" id="copertina_old" value="<?php echo $_GET['copertina']; ?>"><br>
                                    <a href="javascript: cambiaCopertina()" class="fa fa-picture-o">Cambia</a>
                                    <div id="div_copertina" style="display: none">
                                        <label id="file_nuovo" for="uploader" class="floated">Inserisci una copertina per il libro: </label>
                                        <input type="button" id="uploader" value="Upload" onclick="upload_copertina()">
                                        <input type="hidden" id="nomeimmagine" name="nomeimmagine" value="">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <ul class="actions" style="align-content: center!important">
                                <li>
                                    <a href="javascript: modificaSalvaLibro(case_editrici)" class="button button-icon fa fa-save">Salva Modifica</a>
                                </li>
                                <script language="javascript">
                                    var isbni = "<?php echo $_SESSION['isbn']; ?>";
                                    var titoloi = "<?php echo $_SESSION['titolo']; ?>";
                                    var autorei = "<?php echo $_SESSION['autore']; ?>";
                                    var casa_editricei = "<?php echo $_SESSION['casa_editrice']; ?>";
                                    var locazionei = "<?php echo $_SESSION['locazione']; ?>";
                                    var anno_acquistoi = "<?php echo $_SESSION['anno_acquisto']; ?>";
                                    var paginai = "<?php echo $_GET['pagina']; ?>";
                                </script>
                                <li>
                                    <a href="javascript: back_Ricerca(isbni, titoloi, autorei, casa_editricei, locazionei, anno_acquistoi, paginai)" class="button button-icon fa fa-backward">Indietro</a>
                                </li>
                            </ul>
                        </form>
                    </article>
                </div>
            </div>
        </div>
    </body>
</html>