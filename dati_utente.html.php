

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
        else if(userHasRole('Amministratore'))
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
                <article class="is-post" style="align-content: center">
                    <form method="get" action="" name="dati_utente" id="dati_utente" target="_parent" onsubmit="return false" >
                        <header>
                            <div><h2>I tuoi dati</h2></div>
                        </header>
                        <div class="row">

                            <div class="6u">
                                <p>Nome</p>
                                <input id="name" name="name" placeholder="Nome" type="text" class="text" required="required" value=<?php if(isset($name)) echo $name; ?> disabled />
                            </div>
                        </div>
                        <div class="row">
                            <div class="6u">
                                <p>Cognome</p>
                                <input id="surname" name="surname" placeholder="surname" type="text" class="text" required="required" value=<?php if(isset($surname)) echo $surname; ?>  disabled/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="6u">
                                <p>E-mail</p>
                                <input id="email" name="email" placeholder="email" type="text" class="text" required="required" value=<?php echo $_SESSION['email']; ?> disabled/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="6u">
                                <p>Telefono</p>
                                <input id="tel" name="tel" placeholder="Tel" type="text" class="text" required="required" value=<?php if(isset($tel)) echo $tel; ?> disabled/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="3u">

                                <button id="modificasalva" onclick="ModificaSalva()" class="button button-icon fa fa-edit">Modifica</button>
                            </div>
                            <div class="6u">
                                <p id="modificato"></p>
                            </div>

                        </div>
                    </form>


                </article>

            </div>

        </div>
    </div>

</div>

</div>

</body>
</html>

