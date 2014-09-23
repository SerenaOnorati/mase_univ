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
        <title>Area Privata - Aggiungi/Modifica Casa Editrice</title>
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
        <script src="js/utente.js"></script>
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
                        <form method="post" action="" name="modifica_Casa_editrice" onsubmit="return false">
                            <header>
                                <div><br><h2>Aggiungi o Modifica Casa Editrice</h2></div>
                            </header>
                            <div class="row">
                                <div class="3u">
                                    <h3 style="color: #ed786a">Nome</h3>
                                </div>
                                <div class="3u">
                                    <input type="hidden" id="id_casa_editrice" value="<?php echo $_GET['id_casa_editrice']; ?>">
                                    <input type="hidden" id="nome_old" value="<?php echo $_GET['nome']; ?>">
                                    <input id="nome" name="nome"  type="text" class="text" value="<?php echo $_GET['nome'] ?>">
                                </div>

                                <div class="3u">
                                    <h3 style="color: #ed786a">Sito Web</h3>
                                </div>
                                <div class="3u">
                                    <input type="hidden" id="sito_web_old" value="<?php echo $_GET['sito_web']; ?>">
                                    <input id="sito_web" name="sito_web" type="text" class="text" value="<?php echo $_GET['sito_web'] ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="3u">
                                    <h3 style="color: #ed786a">Distributore</h3>
                                </div>
                                <div class="3u">
                                    <input type="hidden" id="id_distributore_old" value="<?php echo $_GET['id_distributore']; ?>">
                                    <select name ="preferenza" id="preferenza" onchange="ordinaRicercaPerDistributore(select)">

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
                                                if(strcmp($_GET['nome_distributore'],$distributore['nome_distributore']) == 0 )
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



                            <br>
                            <ul class="actions" style="align-content: center!important">
                                <li>
                                    <a href="javascript: modificaSalvaCasaEditrice(preferenza)" class="button button-icon fa fa-save">Salva Modifica</a>
                                </li>
                                <!--<script language="javascript">
                                    var id_distributorei = "<?php echo $_SESSION['id_distributore']; ?>";
                                    var nome_distributorei = "<?php echo $_SESSION['nome_distributore']; ?>";
                                    var indirizzoi = "<?php echo $_SESSION['indirizzo']; ?>";
                                    var cittai = "<?php echo $_SESSION['citta']; ?>";
                                    var telefonoi = "<?php echo $_SESSION['telefono']; ?>";
                                    var faxi = "<?php echo $_SESSION['fax']; ?>";
                                    var emaili = "<?php echo $_SESSION['email']; ?>";
                                    var capi = "<?php echo $_SESSION['cap']; ?>";
                                    var sito_webi = "<?php echo $_SESSION['sito_web']; ?>";
                                    var codice_libreriai = "<?php echo $_SESSION['codice_libreria']; ?>";
                                    var preferenza_ordinei = "<?php echo $_SESSION['preferenza_ordine']; ?>";
                                </script>
                                <li>
                                    <a href="javascript: back_Distributore(id_distributorei, nome_distributorei, indirizzoi, cittai, telefonoi, faxi, emaili, capi, sito_webi, codice_libreriai, preferenza_ordinei)" class="button button-icon fa fa-backward">Indietro</a>
                                </li>-->
                            </ul>
                        </form>
                    </article>
                </div>
            </div>
        </div>
    </body>
</html>