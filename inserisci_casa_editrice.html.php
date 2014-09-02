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
                    <form method="post" action="inserisci_distributore.php" name="inserisci_distributore" onsubmit="return false">
                        <header>
                            <div><br><h2>Inserisci casa editrice</h2></div>
                        </header>
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
                    </form>
                </article>
            </div>
        </div>
    </div>
</body>
</html>
