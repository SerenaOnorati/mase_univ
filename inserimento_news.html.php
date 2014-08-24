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
                    <form action="" method="post">
                        <header>
                            <div><h2>News Inserite</h2></div>
                        </header>
                        <div class="row">
                            <div class="3u">
                                <input type="text" name="titolo" class="text" required="required" value="TITOLO" disabled>
                            </div>
                            <div class="3u">
                                <input type="text" name="testo" class="text" required="required" value="TESTO" disabled>
                            </div>
                            <div class="3u">
                                <input type="text" name="immagine" class="text"  required="required" value="IMMAGINE" disabled>
                            </div>
                            <!--<input type="hidden" name="immagine" value="<?php echo $new['immagine']; ?>">-->
                            <div class="2u">
                                <input type="text" name="data" class="text" required="required" value="DATA" disabled>
                            </div>
                            <div class="1u">
                                <input type="hidden" name="data" class="text" required="required" value="OP" disabled>
                            </div>
                        </div>

                        <?php foreach ($news as $new): ?>

                            <div class="row">

                                            <?php $id = htmlspecialchars($new['id_news'], ENT_QUOTES, 'UTF-8');?>
                                            <input type="hidden" name="id_news" value="<?php echo $id?>">
                                            <div class="3u">
                                                <input type="text" name="titolo" class="text" required="required" value="<?php echo htmlspecialchars($new['titolo'], ENT_QUOTES, 'UTF-8'); ?>" disabled>
                                            </div>
                                            <div class="3u">
                                                <textarea type="text" name="testo" class="text" required="required" cols="30" rows="6" disabled> <?php echo htmlspecialchars($new['testo'], ENT_QUOTES, 'UTF-8'); ?> </textarea>
                                            </div>
                                            <div class="3u">
                                                <!--<span class="image"><img src="<?php echo $new['immagine']; ?>"></span>-->

                                            </div>
                                            <!--<input type="hidden" name="immagine" value="<?php echo $new['immagine']; ?>">-->
                                            <div class="2u">
                                                <input type="text" name="data" class="text" required="required" value=" <?php echo htmlspecialchars($new['data'], ENT_QUOTES, 'UTF-8'); ?>" disabled>
                                            </div>
                                          <!--  <input type="submit" name="action" value="Edit">
                                            <input type="submit" name="action" value="Delete">-->
                                            <div class="1u">
                                                <button id="modifica" onclick="" class="button button-icon fa fa-cog"></button>
                                                <button id="elimina" onclick="" class="button button-icon fa fa-times"></button>
                                            </div>

                            </div>
                            <?php endforeach; ?>


                    </form>
                </article>

            </div>

        </div>
    </div>

</div>

</div>

</body>
</html>

