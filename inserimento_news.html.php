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
                    <header>
                        <div><h2>News Inserite</h2></div>
                    </header>

                    <div class="12u">
                        <?php foreach ($news as $new): ?>
                            <li>
                                <form action="" method="post">
                                    <div class="row">
                                        <?php $id = htmlspecialchars($new['id_news'], ENT_QUOTES, 'UTF-8');?>
                                        <input type="hidden" name="id_news" value="<?php echo $id?>">
                                        <input type="hidden" name="titolo" value="<?php echo $new['titolo']; ?>"> <?php echo htmlspecialchars($new['titolo'], ENT_QUOTES, 'UTF-8'); ?>
                                        <input type="hidden" name="testo" value="<?php echo $new['testo']; ?>"> <?php echo htmlspecialchars($new['testo'], ENT_QUOTES, 'UTF-8'); ?>
                                        <!--<input type="hidden" name="immagine" value="<?php echo $new['immagine']; ?>">-->
                                        <input type="hidden" name="data" value="<?php echo $new['data']; ?>"> <?php echo htmlspecialchars($new['data'], ENT_QUOTES, 'UTF-8'); ?>

                                        <input type="submit" name="action" value="Edit">
                                        <input type="submit" name="action" value="Delete">
                                    </div>
                                </form>
                            </li>
                        <?php endforeach; ?>
                    </div>


                </article>

            </div>

        </div>
    </div>

</div>

</div>

</body>
</html>

