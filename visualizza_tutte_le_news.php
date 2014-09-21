<?php
    session_start();
    include 'db.inc.php';

        try
        {
            $sql = 'SELECT id_news, data_news, titolo FROM news';
            $s = $pdo->prepare($sql);
            $s->execute();

            $news = $s->fetchAll();

        }
        catch (PDOException $e)
        {
            $error = 'Errore nel caricamento delle news.';
            echo "<p>".$error."</p>";
        }
?>
<html>
    <head>
        <title>Riepilogo News</title>
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
        <script src="js/mail.js"></script>
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
                include 'menu.php';
            ?>
        </div>
    </div>
    <!-- Main Wrapper -->
    <div id="main-wrapper">
        <!-- Main -->
        <div id="main" class="container">
            <div class="row" style="text-align: center!important">
                <!-- Content -->
                <div id="content" class="12u skel-cell-important">

                    <!-- Post -->
                    <article class="is-post">
                        <header>
                            <br><h2 style="color: #ed786a"><a name="news">News dalla libreria</a></h2>
                        </header>
                        <?php if(isset($news)) {foreach ($news as $new): ?>
                            <div class="row">
                                <strong style="color: lightseagreen"><?php echo $new['data_news'] ?></strong>
                                <h4><a href="leggi_news.php?id_news=<?php echo $new['id_news'];?>"><?php echo $new['titolo'] ?></a></h4>
                            </div>
                            <br>
                        <?php endforeach; }?>
                    </article>
                </div>
            </div>
        </div>
    </div>
    <?php
        include 'footer.php';
    ?>
    </body>
</html>

