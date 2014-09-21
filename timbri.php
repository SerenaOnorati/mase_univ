<?php
    session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Timbri</title>
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
						<div class="row">
							<!-- Content -->
								<div id="content" class="12u skel-cell-important">
									<!-- Post -->
										<article class="is-post">
											<header>
												<h2> Timbri in<strong style="color: #ed786a;"> 24 ORE</strong></h2></h2>
											</header>
											<span class="image image-full"><img src="images/timbri_testata.jpg" alt=""/></span>
                                            <span class="image-table">
                                                <div class="row">
                                                    <div class="row half">
                                                       <div class="6u">
                                                           <span class="image"><img src="images/4911.gif"><p style="text-align: center"><strong>cod. 4911</strong> <br> Max. dimensioni piastra<br>
                                                                    di testo 38 x 14 mm</p></span></div>
                                                        <div class="6u"><span class="image"><img src="images/4912.gif"><p style="text-align: center"><strong>cod. 4912</strong> <br> Max. dimensioni piastra<br>
                                                                    di testo 47 x 18 mm</p></span></div>
                                                    </div>
                                                    <div class="row half">
                                                        <div class="6u"><span class="image"><img src="images/4913.gif"><p style="text-align: center"><strong>cod. 4913</strong> <br> Max. dimensioni piastra<br>
                                                                    di testo 58 x 22 mm</p></span></div>
                                                        <div class="6u"><span class="image"><img src="images/4914.gif"><p style="text-align: center"><strong>cod. 4914</strong> <br> Max. dimensioni piastra<br>
                                                                    di testo 64 x 26 mm</p></span></div>
                                                    </div>
                                                    <div class="row half">
                                                        <div class="6u"><span class="image"><img src="images/4915.gif"><p style="text-align: center"><strong>cod. 4915</strong> <br> Max. dimensioni piastra<br>
                                                                    di testo 70 x 25 mm</p></span></div>
                                                        <div class="6u"><span class="image"><img src="images/4926.gif"><p style="text-align: center"><strong>cod. 4926</strong> <br> Max. dimensioni piastra<br>
                                                                    di testo 75 x 38 mm</p></span></div>
                                                    </div>

                                                </div>
                                            </span>
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