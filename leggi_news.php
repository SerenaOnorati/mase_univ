<?php
    include 'db.inc.php';

    try
    {
        $sql = 'SELECT * FROM news WHERE id_news =:id_news';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id_news', $_GET['id_news'], PDO::PARAM_INT);
        $s->execute();

        $news = $s->fetch();

    }
    catch (PDOException $e)
    {
        $error = 'Errore nel caricamento delle news.';
        echo "<p>".$error."</p>";
    }

?>
<html>
    <head>
        <title>News</title>
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
                        <?php
                            if(isset($news)){
                                echo "<br><header><h2 style=\"color: #ed786a\">".$news['titolo']."</h2></header>";
                                echo "<p>".$news['testo']."</p>";
                                if($news['immagine'] != '\\' && isset($news['immagine']))
                                {
                                    include 'configuration.php';
                                    echo "<span class=\"image\"><img src=\"".$image_news_path.$news['immagine']."\"/></span>";
                                }
                            }
                            else
                            {
                                echo "<p>La news da visualizzare non è presente.</p>";
                            }
                        ?>
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

