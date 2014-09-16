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
        <title>Area Privata - Modifica Distributore</title>
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
                        <form method="post" action="" name="modifica_distributore" onsubmit="return false">
                            <header>
                                <div><br><h2>Modifica distributore</h2></div>
                            </header>
                            <div class="row">
                                <div class="3u">
                                    <h3 style="color: #ed786a">Nome</h3>
                                </div>
                                <div class="3u">
                                    <input type="hidden" id="id_distributore" value="<?php echo $_GET['id_distributore']; ?>">
                                    <input type="hidden" id="nome_distributore_old" value="<?php echo $_GET['nome_distributore']; ?>">
                                    <input id="nome_distributore" name="nome_distributore"  type="text" class="text" value="<?php echo $_GET['nome_distributore'] ?>">
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
                                    <h3 style="color: #ed786a">Email</h3>
                                </div>
                                <div class="3u">
                                    <input type="hidden" id="email_old" value="<?php echo $_GET['email']; ?>">
                                    <input id="email" name="email" type="text" class="text" value="<?php echo $_GET['email'] ?>">
                                </div>
                                <div class="3u">
                                    <h3 style="color: #ed786a">Telefono</h3>
                                </div>
                                <div class="3u">
                                    <input type="hidden" id="telefono_old" value="<?php echo $_GET['telefono']; ?>">
                                    <input id="telefono" name="telefono"  type="text" class="text" value="<?php echo $_GET['telefono'] ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="3u">
                                    <h3 style="color: #ed786a">citta</h3>
                                </div>
                                <div class="3u">
                                    <input type="hidden" id="citta_old" value="<?php echo $_GET['citta']; ?>">
                                    <input id="citta" name="citta" type="text" class="text" value="<?php echo $_GET['citta'] ?>">
                                </div>

                                <div class="3u">
                                    <h3 style="color: #ed786a">Fax</h3>
                                </div>
                                <div class="3u">
                                    <input type="hidden" id="fax_old" value="<?php echo $_GET['fax']; ?>">
                                    <input id="fax" name="fax" type="text" class="text" value="<?php echo $_GET['fax'] ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="3u">
                                    <h3 style="color: #ed786a">Indirizzo</h3>
                                </div>
                                <div class="3u">
                                    <input type="hidden" id="indirizzo_old" value="<?php echo $_GET['indirizzo']; ?>">
                                    <input id="indirizzo" name="indirizzo" type="text" class="text" value="<?php echo $_GET['indirizzo'] ?>">
                                </div>
                                <div class="3u">
                                    <h3 style="color: #ed786a">Preferenza Ordine</h3>
                                </div>
                                <div class="3u">
                                    <input type="hidden" id="prefereza_ordine_old" value="<?php echo $_GET['preferenza_ordine']; ?>">
                                    <select name="preferenza" id="preferenza">
                                        <option value="1">Nessuna</option>
                                        <option value="2">Email</option>
                                        <option value="3">Telefono</option>
                                        <option value="4">Sito web</option>
                                        <option value="5">In sede</option>
                                        <option value="5" selected><?php echo $_GET['preferenza_ordine']; ?></option>
                                    </select>

                                </div>
                            </div>
                            <div class="row">
                                <div class="3u">
                                    <h3 style="color: #ed786a">cap</h3>
                                </div>
                                <div class="3u">
                                    <input type="hidden" id="cap_old" value="<?php echo $_GET['cap']; ?>">
                                    <input id="cap" name="cap" type="text" class="text" value="<?php echo $_GET['cap']?>">
                                </div>
                                <div class="3u">
                                    <h3 style="color: #ed786a">Codice Libreria</h3>
                                </div>
                                <div class="3u">
                                    <input type="hidden" id="codice_libreria_old" value="<?php echo $_GET['codice_libreria']; ?>">
                                    <input id="codice_libreria" name="codice_libreria" type="text" class="text" value="<?php echo $_GET['codice_libreria']?>">

                                </div>
                            </div>
                            <br>
                            <ul class="actions" style="align-content: center!important">
                                <li>
                                    <a href="javascript: modificaSalvaDistributore(preferenza)" class="button button-icon fa fa-save">Salva Modifica</a>
                                </li>
                                <script language="javascript">
                                    var isbni = "<?php echo $_SESSION['isbn']; ?>";
                                    var titoloi = "<?php echo $_SESSION['titolo']; ?>";
                                    var autorei = "<?php echo $_SESSION['autore']; ?>";
                                    var casa_editricei = "<?php echo $_SESSION['casa_editrice']; ?>";
                                    var locazionei = "<?php echo $_SESSION['locazione']; ?>";
                                    var anno_acquistoi = "<?php echo $_SESSION['anno_acquisto']; ?>";
                                </script>
                                <li>
                                    <a href="javascript: back_Ricerca(isbni, titoloi, autorei, casa_editricei, locazionei, anno_acquistoi)" class="button button-icon fa fa-backward">Indietro</a>
                                </li>
                            </ul>
                        </form>
                    </article>
                </div>
            </div>
        </div>
    </body>
</html>