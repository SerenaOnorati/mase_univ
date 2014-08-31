<!DOCTYPE HTML>

<html>
    <head>
        <title>Area Privata - Dati utente</title>
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
                if(userHasRole('Amministratore'))
                {
                    include 'menuAdmin.php';
                }
                else if(userHasRole('Utente'))
                {
                    include 'menuUser.php';
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
                        <article class="is-post" style="align-content: center">
                            <form method="get" action="" name="dati_utente" id="dati_utente" target="_parent" onsubmit="return false" >
                                <header>
                                    <div><br><h2>I tuoi dati</h2></div>
                                </header>
                                <div class="row">

                                    <div class="6u">
                                        <p>Nome</p>
                                        <input id="name" name="name" placeholder="Nome" type="text" class="text" value="<?php if(isset($name)) echo $name; ?>" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="6u">
                                        <p>Cognome</p>
                                        <input id="surname" name="surname" placeholder="Cognome" type="text" class="text" value="<?php if(isset($surname)) echo $surname; ?>"  disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="6u">
                                        <p>E-mail</p>
                                        <input id="email" name="email" placeholder="Email" type="text" class="text" value="<?php echo $_SESSION['email']; ?>" disabled>                                                            </div>
                                </div>
                                <div class="row">
                                    <div class="6u">
                                        <p>Telefono</p>
                                        <input id="tel" name="tel" placeholder="Tel" type="text" class="text" value="<?php if(isset($tel)) echo $tel; ?>" disabled >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="6u">
                                        <a href="javascript: cambiaPassword()" class="fa fa-toggle-right" id="cambia_psw">Cambia Password</a>
                                    </div>
                                </div>
                                <div class="row" id="row_password_old" style="display: none">
                                    <div class="6u">
                                        <p>Inserisci la password attuale</p>
                                        <input id="password_old" name="password_old" placeholder="Inserisci la password attuale" type="password" class="text" disabled/>
                                    </div>
                                </div>
                                <div class="row" id="row_password_new" style="display: none">
                                    <div class="6u">
                                        <p>Inserisci la nuova password</p>
                                        <input id="password_new" name="password_new" placeholder="Inserisci la nuova password" type="password" class="text" disabled/>
                                    </div>
                                </div>
                                <div class="row" id="row_password_new1" style="display: none">
                                    <div class="6u">
                                        <p>Inserisci un'altra volta la nuova password</p>
                                        <input id="password_new1" name="password_new1" placeholder="Inserisci un'altra volta la nuova password" type="password" class="text" disabled/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="3u">
                                        <button id="modificasalva" onclick="ModificaSalva()" class="button button-icon fa fa-edit">Modifica</button>
                                    </div>
                                    <div class="6u">
                                        <p style="color: #ed786a" id="modificato"></p>
                                    </div>

                                </div>
                            </form>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

