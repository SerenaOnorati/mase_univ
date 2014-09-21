<!--<h1 id="logo"><a href="index.php">Universitalia</a></h1>-->
<h1 id="logo">
    <a href="index.php">
        <img class="image-testata" src="images/Logo_u.png">
        <img class="image-testata" src="images/universitalia.png">
    </a>
</h1>
<?php if(isset($_SESSION['loggedIn'])){?>
    <form action="logout.php" method="post" id="formlogout">
        <p style="text-align: right">
            <script type="text/javascript">
                function submitformLogout()
                {
                    this.document.forms["formlogout"].submit();
                }
            </script>
            Benvenuto,
            <a href="dati_utente.php">
                <?php
                echo $_SESSION['email'];
                ?>
            </a>
            <input type="hidden" name="action" value="logout">
            <a href="javascript: submitformLogout()" class="fa fa-sign-out" title="Logout">Logout</a><br>
        </p>
    </form>
<?php } ?>
<!-- Nav -->
<nav id="nav">
    <ul id="icone">
        <li>
            <a class="fa fa-home" href="index.php"><span>Home</span></a>
            <ul>
                <li><a href="index.php#dovesiamo">Dove siamo</a></li>
                <li><a href="index.php#rilegaturatesi">Rilegature Tesi</a></li>
            </ul>

        </li>
        <li>
            <a class="fa fa-bullhorn" href="visualizza_tutte_le_news.php"><span>News</span></a>
        </li>
        <li>
            <a href="" class="fa fa-book"><span>Libri</span></a>
            <ul>
                <li><a href="index.php#libreriaonline">Ricerca Libri</a></li>
            </ul>
        </li>
        <li>
            <a href="rilegaturaTesi.php" class="fa fa-graduation-cap"><span>Rilegatura Tesi</span></a>
        </li>

        <li>
            <a href="" class="fa fa-print"><span>Stampe</span></a>
            <ul>
                <li><a href="plotter.php">Plotter</a></li>
                <li><a href="stampe.php">Stampe</a></li>
                <li><a href="timbri.php">Timbri</a></li>
            </ul>
        </li>
        <li>
            <a href="http://universitaliaeditrice.it/" target="_blank" class="fa fa-book"><span>Editoria</span></a>
            <ul>
                <li><a href="http://universitaliaeditrice.it/" target="_blank">Pubblica con noi</a></li>
            </ul>
        </li>
        <li>
            <a href="" class="fa fa-shopping-cart"><span>UniShop</span></a>
            <ul>
                <li><a href="preventivo.php">Preventivo Stampe</a></li>
            </ul>
        </li>
    </ul>
</nav>