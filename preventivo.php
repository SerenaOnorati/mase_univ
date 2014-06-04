<html>
<head>
    <title>Preventivo</title>
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

    <script language="javascript">
        function Aumenta(campo, per) {
            var oggetti = document.getElementById(campo).value;
            oggetti = parseInt(oggetti, 10);
            if (isNaN(oggetti)) oggetti = 0;

            oggetti += per;
            if (oggetti < 0) return;

            document.getElementById(campo).value = oggetti;
        }
    </script>
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
        <div class="row">

            <!-- Content -->
            <div id="content" class="12u skel-cell-important">

                <!-- Post -->
                <article class="is-post">
                    <header>
                        <h2>Calcola il tuo preventivo</h2>
                    </header>
                    <div class="row">
                        <div class="6u">
                            <section>
                                <form method="post" action="mail.php" name="formpreventivo" id="preventivo" target="_parent">

                                    <div class="row half">

                                        <div class="6u">
                                            <input id="name" name="name" placeholder="Nome" type="text" class="text" required="required"/>
                                        </div>
                                        <div class="6u">
                                            <input id="email" name="email" placeholder="Email" type="text" class="text" required="required"/>
                                            <br>
                                        </div>
                                        <div class="6u">
                                            <input id="tel" name="tel" placeholder="Tel" type="text" class="text" required="required"/>
                                        </div>
                                    </div>

                                    <div class="row half">
                                       <div class="6u">
                                           <p>Seleziona il tipo di documento che vuoi stampare</p>
                                           <select name="tipodoc">
                                               <option value="Latte">Latte Fresco</option>
                                               <option value="Formaggio">Formaggio Stagionato</option>
                                               <option value="Pane">Pane Caldo</option>
                                           </select>
                                       </div>
                                        <div class="6u">
                                            <p>Seleziona il formato</p>
                                            <br>
                                            <select name="tipoformato">
                                                <option value="Latte">Latte Fresco</option>
                                                <option value="Formaggio">Formaggio Stagionato</option>
                                                <option value="Pane">Pane Caldo</option>
                                            </select>
                                        </div>

                                   </div>


                                    <div class="row half">
                                        <div class="6u">
                                            <p>Seleziona la tipologia della carta</p>
                                            <select name="tipocarta">
                                                <option value="Latte">Latte Fresco</option>
                                                <option value="Formaggio">Formaggio Stagionato</option>
                                                <option value="Pane">Pane Caldo</option>
                                            </select>
                                        </div>
                                        <div class="6u">
                                            <p>Rilegatura</p> <br>
                                            <select name="tiporilegatura">
                                                <option value="Latte">Latte Fresco</option>
                                                <option value="Formaggio">Formaggio Stagionato</option>
                                                <option value="Pane">Pane Caldo</option>
                                            </select>
                                        </div>
                                    </div>



                                    <div class="row half">
                                        <div class="6u">
                                            <p>Numero copie</p>
                                            <input type="button" value="-" onclick="Aumenta('numero', -01)">
                                            <input type="text" id="numero" readonly="readonly" value="0" size="2">
                                            <input type="button" value="+" onclick="Aumenta('numero', 01)">
                                        </div>
                                    </div>
                                    <div class="row half">
                                        <div class="12u">
                                            <input  type="file" id="url" name="url" multiple><br>
                                        </div>

                                        <!--<input class="button button-icon fa fa-file-o" type="file" id="url" name="url" multiple><br>-->
                                    </div>
                                    <div class="row half">
                                        <div class="12u">
                                            <button class="button button-icon fa fa-eur">Calcola</button>
                                        </div>
                                    </div>
                                </form>
                            </section>
                        </div>
                        <div class="6u">
                            <section>

                                <div class="row">
                                    <ul class="icons 6u">
                                        <li class="fa fa-home">
                                            Via di Tor Vergata, 143<br />
                                            Roma, 00133<br />
                                            Italia
                                        </li>
                                        <li class="fa fa-phone">
                                            (06)2026342
                                        </li>
                                        <li class="fa fa-print">
                                            (06)20419483
                                        </li>
                                        <li class="fa fa-clock-o">
                                            8:00 - 18:30<br />
                                            Sabato 8:00 - 12:30
                                        </li>
                                    </ul>
                                    <ul class="icons 6u">
                                        <li class="fa fa-envelope">
                                            info@universitaliasrl.it
                                        </li>
                                        <li class="fa fa-facebook">
                                            <a href="https://www.facebook.com/groups/35057244586/?fref=ts" target="_blank">Universitalia</a>
                                        </li>
                                        <li class="fa fa-skype">
                                            universitaliasas@hotmail.it
                                        </li>
                                    </ul>
                                </div>
                            </section>
                        </div>
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