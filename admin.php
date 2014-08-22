<?php
    include 'access.inc.php';
    if(!IsLogged())
    {
        header("Location: index.php#login");
    }
    if(!userHasRole('Amministratore'))
    {
        $GLOBALS['loginError'] = 'Non sei Amministratore';
        echo $GLOBALS['loginError'];
        //header("Location: index.php#login");
    }
?>

<!DOCTYPE HTML>

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


                    </header>
                </article>

            </div>

        </div>
    </div>

</div>

</div>

</body>
