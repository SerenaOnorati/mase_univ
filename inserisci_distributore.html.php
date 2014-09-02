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
                    </form>
                </article>
            </div>
        </div>
    </div>
</body>
</html>
