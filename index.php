<!DOCTYPE HTML>
<html>
<head>
    <title>Universitalia S.r.l</title>
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
<body class="homepage">

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
            <div class="row">

                <!-- Content -->
                <div id="content" class="8u">

                    <!-- Post -->
                    <article class="is-post">
                        <a href="http://regularjane.deviantart.com/art/Write-354865228" class="image image-full"><img src="images/libri.jpg" alt="" /></a>
                        <p></p>
                    </article>
                    <article class="is-post">
                    <header>
                        <h2 style="color: #ed786a"><a name="news">News</a></h2>
                    </header>
                        <?php
                            include 'db.inc.php';
                            try
                            {
                                $sql = 'SELECT id_news, data_news, titolo FROM news order BY data_news DESC LIMIT 0, 5';
                                $s = $pdo->prepare($sql);
                                $s->execute();
                            }
                            catch (PDOException $e)
                            {
                                $error = 'Errore nel caricamento delle news.';
                                echo "<p>".$error."</p>";
                                exit();
                            }

                            $news = $s->fetchAll();

                            if(!empty($news))
                            {
                                foreach ($news as $new):
                                    echo "<div class=\"row\">";
                                    echo "<div class=\"3u\"><strong style=\"color: lightseagreen\">".$new['data_news']."</strong></div>";
                                    echo "<div class=\"4u\"><h4><a href=\"leggi_news.php?id_news=".$new['id_news']."\">".$new['titolo']."</a></h4></div>";
                                    echo "</div>";
                                endforeach;
                            }
                            else
                            {
                                $error = 'Non ci sono news da visualizzare.';
                                echo "<p>".$error."</p>";
                                exit();
                            }
                        ?>
                        <br>
                        <ul class="actions" style="text-align: right!important">
                            <li>
                                <a href="visualizza_tutte_le_news.php" id="vis_news" class="button button-icon fa fa-envelope">Leggi le altre news</a>
                            </li>
                        </ul>
                    </article>
                    <article class="is-post">
                        <header>
                            <h2 style="color: #ed786a"><a name="rilegaturatesi">Rilegatura Tesi</a></h2>
                        </header>
                        <h3>in Pelle o Tela con Incisione</h3>
                        <p><b style="color: #D4A017">Oro</b>  <b style="color: #C0C0C0">Argento</b>  <b style="color: #CC0000">Rossa</b>  <b style="color: #CC0066">Fucsia</b>  <b style="color: #663399">Blu</b>  <b style="color: #339933">Verde</b></p>
                        <div id="3D"><h3>Prendi 4 paghi 3</h3></div>
                        <p>La rilegatura completa di incisione a 17&euro;, con l'offerta prendi 4 paghi 3 a 51&euro; </p>
                    </article>
                </div>

                <!-- Sidebar -->
                <div id="sidebar" class="4u">
                    <!-- Excerpts -->
                    <section>
                        <ul class="divided">
                            <li>
                                <!-- Excerpt -->
                                <article class="is-excerpt">
                                    <a name="dovesiamo"></a>
                                    <p>La libreria si trova in Via di Tor Vergata, 143 angolo Via di Passolombardo, 421.</p>
                                    <div class="blocco_variabile"><iframe class="iframe-googlemaps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2971.943728169065!2d12.626552000000007!3d41.851038!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132587ff308b9443%3A0xb86c1ae011f30d81!2sUniversitalia+di+Onorati+srl!5e0!3m2!1sit!2sit!4v1397421686380" width="356" height="460" frameborder="0" style="border:0"></iframe></div>
                                </article>
                            </li>
                        </ul>
                    </section>

                    <!-- Highlights -->
                    <section>
                        <ul class="divided">
                            <li>

                                <!-- Highlight -->
                                <article class="is-highlight">
                                    <header>
                                        <h3 style="color: #ed786a"><a name = "login">Accedi</a></h3><br>
                                    </header>
                                    <form action="login.php" method="post">
                                        <div>
                                            <input id="email" name="email" placeholder="e-mail" type="text" class="text"/><br>
                                            <input id="password" name="password" placeholder="Password" type="password" class="text"/>
                                            <input type="hidden" name="action" value="login">
                                           <br>
                                            <p style=" text-align: center"><b style="color: red">
                                                <?php
                                                    if(isset($loginError)){
                                                        echo $loginError;
                                                    }
                                                ?>
                                            </b></p>
                                        </div>
                                        <br>
                                        <ul class="actions">
                                            <li>
                                                <input type='submit' id="accedi" class="button button-icon fa fa-lock">
                                                <!--<a href="login.php" id="accedi" class="button button-icon fa fa-lock">Accedi</a>
                                                <br><br>
                                                <a href="#" class="button button-icon fa fa-edit">Registrati</a>-->
                                            </li>

                                        </ul>
                                    </form>
                                </article>
                            </li>
                            <li>
                                <article class="is-highlight">
                                    <header>
                                        <h3 style="color: #ed786a"><a name="libreriaonline">Libreria on-line</a></h3><br>
                                    </header>
                                    <form method="post" action="ricerca_sito.php">
                                        <div>
                                            <input id="titolo" name="titolo" placeholder="Titolo" type="text" class="text"/><br>
                                            <input id="autore" name="autore" placeholder="Autore" type="text" class="text"/>
                                        </div>
                                        <br>
                                        <ul class="actions">
                                            <li>
                                                <input type='submit' id="cerca" class="button button-icon fa fa-search" value="Cerca">
                                            </li>
                                        </ul>
                                        <br>
                                        <p style=" text-align: center"><b style="color: red">
                                                <?php
                                                    if(isset($ricercaError))
                                                    {
                                                        echo $ricercaError;
                                                    }
                                                ?>
                                        </b></p>
                                    </form>
                                </article>
                            </li>

                        </ul>
                    </section>

                </div>

            </div>
        </div>
    </div>

    <?php
        include 'footer.php';
    ?>

</body>
