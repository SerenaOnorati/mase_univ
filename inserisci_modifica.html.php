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
    <title>Area Privata - Inserisci Libri</title>
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
                <form method="post" action="" name="inserisci" onsubmit="return false">
                    <article class="is-post">

                    <header>
                        <div><br><h2>Cerca, Inserisci e Modifica</h2></div>
                    </header>

                        <form method="post" action="visualizza_distributore.php" name="ricerca_distributore">

                            <div class="row">
                                <div class="3u">
                                    <h3 class="fa fa-user" style="color: #ed786a">&nbsp; Distributore</h3>
                                </div>
                                <div class="3u">
                                    <input id="distributore" name="distributore" placeholder="Distributore" type="text" class="text" value="">

                                </div>
                                <div class="3u">
                                    <a href="visualizza_distributore.php" class="fa fa-edit" title="Modifica">Modifica Distributore </a>
                                </div>
                                <div class="3u">
                                    <a href="inserisci_distributore.html.php" class="fa fa-plus" title="Aggiungi">Aggiungi Distributore </a>
                                </div>

                            </div>

                        <form method="post" action="visualizza_casa_editrice.php" name="ricerca_casa_editrice" id="ricerca_casa_editrice">
                            <div class="row">
                                <div class="3u">
                                    <h3 class="fa fa-building" style="color: #ed786a">&nbsp; Casa Editrice</h3>
                                </div>
                                <div class="3u">
                                    <input id="casaeditrice" name="casaeditrice" placeholder="Casa Editrice" type="text" class="text" value="">
                                </div>
                                <!--<script type="text/javascript">
                                    function submitform()
                                    {
                                        document.getElementById("ricerca_casa_editrice").submit();
                                        //this.document.forms["ricerca_casa_editrice"].submit();
                                    }
                                </script>-->
                                <div class="3u actions">
                                    <!--<a href="javascript: submitform()" class="fa fa-edit" title="Modifica">Modifica Casa Editrice </a>-->
                                    <a href="visualizza_casa_editrice.php" class="fa fa-edit" title="Modifica">Modifica Casa Editrice </a>
                                </div>
                                <div class="3u">
                                    <a href="inserisci_casa_editrice.html.php" class="fa fa-plus" title="Aggiungi">Aggiungi Casa Editrice</a>
                                </div>

                            </div>
                        </form>
                        <!--<a href="visualizza_distributore.php" class="fa fa-toggle-right" title="Aggiungi">Aggiungi e Modifica Distributore </a>
                        <br>
                        <a href="visualizza_casa_editrice.php" class="fa fa-toggle-right" title="Aggiungi">Aggiungi e Modifica Casa Editrice </a>
                        <br>
                        <a href="inserisci_libri.html.php" class="fa fa-toggle-right" title="Aggiungi">Aggiungi e Modifica Libro </a>-->

                        </div>
                </article>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
