<h1 id="logo">
    <a href="index.php">
        <img class="image-testata" src="images/Logo_u.png">
        <img class="image-testata" src="images/universitalia.png">
    </a>
</h1>
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
<!-- Nav -->
<nav id="nav">

    <ul id="icone">
        <li>
            <a id="menu_ricerca" href="admin.php" class="fa fa-search">Cerca</a>
            <!--<ul>
                <li><a href="admin.php">Ricerca Libri</a></li>
                <li><a href="inserisci_modifica.html.php">Inserisci</a></li>
            </ul>-->

        </li>


        <li>
            <a id="menu_ordinare" href="daordinare.php" class="fa fa-shopping-cart" style="color: #339933 ">Ord</a>
        </li>
        <li>
            <a id="menu_ordinato" href="ordinato.php" class="fa fa-archive" style="color: #CC3366 ">Inv</a>
        </li>
        <li>
            <a id="menu_arrivato" href="arrivato.php" class="fa fa-truck" style="color: #FF9933">Arr</a>
        </li>
        <li>
            <a href="utenti_registrati.php" class="fa fa-level-down"></a>
            <ul>
                <li><a href="utenti_registrati.php">Visualizza utenti</a></li>
                <li><a href="inserimento_news.php">News</a></li>
            </ul>
        </li>

    </ul>
</nav>