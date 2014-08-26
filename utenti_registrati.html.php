<?php
    include 'access.inc.php';
    include 'configuration.php';

    if(!IsLogged())
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
        <title>Area Privata - Utenti registrati</title>
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
        <script src="js/utilità.js"></script>
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
                    if(userHasRole('Amministratore'))
                    {
                        include 'menuAdmin.php';
                    }
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
                                <div><br><h2 style="text-align: left !important">Utenti registrati</h2></div>
                            </header>
                            <div class="row">
                                <div class="3u">
                                    <h3 style="color: #ed786a">Nome</h3>
                                </div>
                                <div class="2u">
                                    <h3 style="color: #ed786a">Cognome</h3>
                                </div>
                                <div class="3u">
                                    <h3 style="color: #ed786a">E-mail</h3>
                                </div>
                                <div class="2u">
                                    <h3 style="color: #ed786a">Tel</h3>
                                </div>
                                <div class="2u">
                                    <h3 style="color: #ed786a">Azioni</h3>
                                </div>
                            </div>
                            <br>
                            <?php foreach ($users as $user): ?>
                                <form action="" method="post" onsubmit="return false">
                                    <div class="row">
                                        <input type="hidden" name="id_user" value="<?php echo $user['id_user']?>">
                                        <div class="3u">
                                            <input id="name<?php echo $user['id_user']?>" type="text" name="name" class="text" required="required" value=" <?php echo htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8'); ?>" disabled>
                                        </div>
                                        <div class="2u">
                                            <input id="surname<?php echo $user['id_user']?>" type="text" name="surname" class="text" required="required" value=" <?php echo htmlspecialchars($user['surname'], ENT_QUOTES, 'UTF-8'); ?>" disabled>
                                        </div>
                                        <div class="3u">
                                            <input id="email<?php echo $user['id_user']?>" type="text" name="email" class="text" required="required" value=" <?php echo htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8'); ?>" disabled>
                                        </div>
                                        <div class="2u">
                                            <input id="tel<?php echo $user['id_user']?>" type="text" name="tel" class="text" required="required" value=" <?php echo htmlspecialchars($user['tel'], ENT_QUOTES, 'UTF-8'); ?>" disabled>
                                        </div>
                                        <div class="2u">
                                            <a id="modificautente<?php echo $user['id_user']?>" href="javascript:modificaUtente(<?php echo $user['id_user']?>)" class="fa fa-edit" title="Modifica">Modifica</a><br>
                                            <a href="javascript:cancellaUtente(<?php echo $user['id_user']?>)" class="fa fa-times" title="Cancella"> Cancella</a>
                                        </div>
                                    </div>
                                </form>
                                <br>
                            <?php endforeach; ?>
                        </article>
                    </div>
                </div>
            </div>

        </div>
    </body>
</html>

