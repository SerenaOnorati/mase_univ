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
        <title>Area Privata - Amministratore</title>
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
            <?php
                if(isset($_GET['ricercafallita']))
                    echo "<h3 style=\"color: #ed786a\">".$_GET['ricercafallita']."</h3>";
                if(isset($_GET['ricercavuota']))
                    echo "<h3 style=\"color: #ed786a\">".$_GET['ricercavuota']."</h3>";
                include 'ricerca.html.php';

            ?>
        </div>
    </body>
</html>
