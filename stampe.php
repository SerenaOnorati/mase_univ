<?php
    session_start();
?>
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

        <!--slideshow_images_text-->
        <!--<link rel="stylesheet" type="text/css" href="css/css_slideshow_images_text/demo.css" />-->
        <link rel="stylesheet" type="text/css" href="css/css_slideshow_images_text/style.css" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Playfair+Display:400italic' rel='stylesheet' type='text/css' />
        <noscript>
            <link rel="stylesheet" type="text/css" href="css/css_slideshow_images_text/noscript.css" />
        </noscript>
        <!--end slideshow_images_text-->
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
                            <!--slideshow_images_text-->
                            <div class="container">
                                <div class="clr"></div>
                            </div>

                            <div class="wrapper">
                                <div id="ei-slider" class="ei-slider">
                                    <ul class="ei-slider-large">
                                        <li>
                                            <img src="images/images_slideshow_images_text/large/6.jpg" alt="image06"/>
                                            <div class="ei-title">
                                                <h3>Cataloghi, Libretti e Manuali</h3>
                                            </div>
                                        </li>
                                        <li>
                                            <img src="images/images_slideshow_images_text/large/1.jpg" alt="image01" />
                                            <div class="ei-title">
                                                <h2>Cartoline</h2>
                                                <h2>Menu</h2>
                                            </div>
                                        </li>
                                        <li>
                                            <img src="images/images_slideshow_images_text/large/2.jpg" alt="image02" />
                                            <div class="ei-title">
                                                <h3>Biglietti da visita, Etichette</h3>
                                            </div>
                                        </li>
                                        <li>
                                            <img src="images/images_slideshow_images_text/large/3.jpg" alt="image03"/>
                                            <div class="ei-title">
                                                <h2>Calendari</h2>
                                                <h2>Segnalibro</h2>
                                            </div>
                                        </li>
                                        <li>
                                            <img src="images/images_slideshow_images_text/large/4.jpg" alt="image04"/>
                                            <div class="ei-title">
                                                <h3>Diplomi</h3>
                                                <h3>Attestati</h3>
                                            </div>
                                        </li>
                                        <li>
                                            <img src="images/images_slideshow_images_text/large/5.jpg" alt="image05"/>
                                            <div class="ei-title">
                                                <h2>Biglietti di Auguri</h2>
                                            </div>
                                        </li>
                                    </ul><!-- ei-slider-large -->
                                    <ul class="ei-slider-thumbs">
                                        <li class="ei-slider-element">Current</li>
                                        <li><a href="#">Slide 6</a><img src="images/images_slideshow_images_text/thumbs/6.jpg" alt="thumb06" /></li>
                                        <li><a href="#">Slide 1</a><img src="images/images_slideshow_images_text/thumbs/1.jpg" alt="thumb01" /></li>
                                        <li><a href="#">Slide 2</a><img src="images/images_slideshow_images_text/thumbs/2.jpg" alt="thumb02" /></li>
                                        <li><a href="#">Slide 3</a><img src="images/images_slideshow_images_text/thumbs/3.jpg" alt="thumb03" /></li>
                                        <li><a href="#">Slide 4</a><img src="images/images_slideshow_images_text/thumbs/4.jpg" alt="thumb04" /></li>
                                        <li><a href="#">Slide 5</a><img src="images/images_slideshow_images_text/thumbs/5.jpg" alt="thumb05" /></li>
                                    </ul><!-- ei-slider-thumbs -->
                                </div><!-- ei-slider -->
                            </div><!-- wrapper -->
                            <!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>-->
                            <script type="text/javascript" src="js/js_slideshow_images_text/jquery.eislideshow.js"></script>
                            <script type="text/javascript" src="js/js_slideshow_images_text/jquery.easing.1.3.js"></script>
                            <script type="text/javascript">
                                $(function() {
                                    $('#ei-slider').eislideshow({
                                        animation			: 'center',
                                        autoplay			: true,
                                        slideshow_interval	: 3000,
                                        titlesFactor		: 0
                                    });
                                });
                            </script>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                            <!--end slideshow_images_text-->
                            <header>
                                <h3>I tuoi file li puoi inviare anche da casa!</h3>
                                <p>Inviali per email o porta la tua pen-drive o CD il tutto al costo di 0,032&euro; per pagina.</p>
                            </header>
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
                                            <header>
                                                <h2>Prezzi</h2>
                                                <h3>per copie o stampe</h3>
                                            </header>
                                            <table style="width: 400px" >
                                                <colgroup>
                                                    <col style="text-align: center">
                                                </colgroup>
                                                <tr>
                                                    <th>B/N A4</th>
                                                    <th>0,032 &euro;</th>
                                                </tr>
                                                <tr>
                                                    <th>B/N A3</th>
                                                    <th>0,10 &euro;</th>
                                                </tr>
                                                <tr>
                                                    <th>Colori A4</th>
                                                    <th>0,50 - 0,25 &euro;</th>
                                                </tr>
                                                <tr>
                                                    <th>Colori A3</th>
                                                    <th>1,00 &euro;</th>
                                                </tr>
                                            </table>
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
</html>