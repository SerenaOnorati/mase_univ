<?php
    //include("configuration.php");
    session_start();
    //se non c'è la sessione registrata
    if(isset($_SESSION['autorizzato'])) {
        echo "Area riservata, accesso negato.";
        echo '<script language=javascript>document.location.href="index.php"</script>';
        die;
    }

    //Altrimenti Prelevo il codice identificatico dell’utente loggato
    $cod = $_SESSION['cod']; //id cod recuperato nel file di verifica

?>

<!DOCTYPE HTML>
<!--
	Strongly Typed 1.1 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>Area Privata</title>
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
                <article class="is-post">
                    <header>
                        <h2><a name="news">News</a></h2>
                    </header>
                    <?php
                    //mi collego al database
                        mysql_select_db("$db_name",$connessione);
                        $q_news = "SELECT testo, immagine, data FROM news ORDER BY data;
                        $ris = mysql_query($q_news, $connessione) or die (mysql_error());

                        echo '<div>';

                        if($ris && mysql_num_rows($ris) > 0){
                             while($row = mysql_fetch_assoc($res)){


                             }
                        }
                        echo '</div>';
                    ?>

                </article>

            </div>

        </div>
    </div>

</div>

</div>

</body>
