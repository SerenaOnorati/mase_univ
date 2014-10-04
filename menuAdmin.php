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
            <a id="menu_ricerca" class="fa fa-book"><span>Libri</span></a>
            <ul>
                <li><a href="admin.php">Ricerca Libri</a></li>
                <li><a href="inserisci_modifica.html.php">Inserisci</a></li>
                <!--<li><a href="visualizza_distributore.php">Inserisci Distributore</a></li>
                <li><a href="inserisci_casa_editrice.html.php">Inserisci Casa Editrice</a></li>
                <li><a href="inserisci_libri.html.php">Inserisci Libri</a></li>-->
            </ul>
        </li>

        <li>
            <a id="menu_ordinare" href="daordinare.php" class="fa fa-shopping-cart"><span>Ordinare</span></a>
        </li>
        <li>
            <a id="menu_ordinato" href="ordinato.php" class="fa fa-archive"><span>Ordinato</span></a>
        </li>
        <li>
            <a id="menu_arrivato" href="arrivato.php" class="fa fa-truck"><span>Arrivato</span></a>
        </li>
        <li>
            <a href="utenti_registrati.php" class="fa fa-group"><span>Utenti</span></a>
            <ul>
                <li><a href="utenti_registrati.php">Visualizza utenti</a></li>
            </ul>
        </li>
        <li>
            <a href="inserimento_news.php" class="fa fa-edit"><span>News</span></a>
        </li>
    </ul>
</nav>