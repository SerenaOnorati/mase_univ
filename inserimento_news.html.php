<!DOCTYPE HTML>

<html>
    <head>
        <title>Area Privata - News</title>
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
                    <article class="is-post">
                        <header>
                            <div><br><h2 style="text-align: left !important">News Inserite</h2></div>
                        </header>
                        <div class="row">
                            <div class="2u">
                                <h3 style="color: #ed786a">Titolo</h3>
                            </div>
                            <div class="3u">
                                <h3 style="color: #ed786a">Testo</h3>
                            </div>
                            <div class="3u">
                                <h3 style="color: #ed786a">Immagine</h3>
                            </div>
                            <div class="2u">
                                <h3 style="color: #ed786a">Data</h3>
                            </div>
                            <div class="2u">
                                <h3 style="color: #ed786a">Azioni</h3>
                            </div>
                        </div>
                        <br>
                        <?php foreach ($news as $new): ?>
                            <form action="" method="post">
                                <div class="row">
                                    <?php $id = htmlspecialchars($new['id_news'], ENT_QUOTES, 'UTF-8');?>
                                    <input type="hidden" name="id_news" value="<?php echo $id?>">
                                    <div class="2u">
                                        <textarea type="text" name="titolo" class="text" required="required" cols="30" rows="6" disabled><?php echo htmlspecialchars($new['titolo'], ENT_QUOTES, 'UTF-8'); ?></textarea>
                                    </div>
                                    <div class="3u">
                                        <textarea type="text" name="testo" class="text" required="required" cols="30" rows="6" disabled> <?php echo htmlspecialchars($new['testo'], ENT_QUOTES, 'UTF-8'); ?> </textarea>
                                    </div>
                                    <div class="3u">
                                        <a href="" class="fa fa-picture-o"> Visualizza immagine</a><br>

                                        <!-- far in modo che se clicco su visualizza immagine vedo l'immagine associata alla news ad esempio in sovrapposizione alla pagina>
                                        <!--<span class="image"><img src="<?php header("Content-type: image/jpeg"); echo ($new['immagine']); ?>"></span>-->
                                    </div>
                                    <div class="2u">
                                        <input type="text" name="data" class="text" required="required" value=" <?php echo htmlspecialchars($new['data'], ENT_QUOTES, 'UTF-8'); ?>" disabled>
                                    </div>
                                    <div class="2u">
                                        <a href="" class="fa fa-edit" title="Modifica"> Modifica</a><br>
                                        <a href="" class="fa fa-times" title="Cancella"> Cancella</a>
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

    </div>

    </body>
</html>

