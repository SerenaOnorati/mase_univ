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
<?php
  include_once 'configuration.php';
?>
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
                    <div class="row">
                        <div class="6u">
                            <section>

                                <form method="post" action="mail.php" name="formpreventivo" id="preventivo" target="_parent">
                                    <header>
                                        <div align="left"><h2>Calcola il tuo preventivo</h2></div>
                                    </header>
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
                                               <?php
                                                 $num = count($tipo_doc);
                                                 for($i=0; $i<$num; $i++){
                                                     echo"<option value=".$tipo_doc[$i].">".$tipo_doc[$i]."</option>";
                                                 }
                                               ?>
                                           </select>
                                       </div>
                                        <div class="6u">
                                            <p>Seleziona il formato</p>
                                            <br>
                                            <select name="tipoformato">
                                                <script type="javascript">
                                                            //recupero variabile "discriminante"
                                                            var tipodoc = $(‘#tipodoc option:selected’).text()

                                                            if(tipodoc == 'Progetti CAD Vettoriali' || tipodoc == 'Progetti CAD Raster'){
                                                                <?php
                                                                   $count = count($formato_CAD);
                                                                   for($i=0; $i<$count; $i++){
                                                                     echo"<option value=".$formato_CAD[$i].">".$formato_CAD[$i]."</option>";
                                                                   }
                                                                 ?>
                                                    });//FINE DOM
                                                </script>
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
                                <header>
                                    <h2><a name="istruzioni"><font color="blue">Istruzioni</font></a></h2><br>
                                </header>
                                <div class="row">
                                    <ul class="icons 6u">
                                        <li class="fa fa-circle-o">
                                           Compila il form
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