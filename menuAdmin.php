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
                <li><a href="inserisci_distributore.html.php">Inserisci Distributore</a></li>
                <li><a href="inserisci_casa_editrice.html.php">Inserisci Casa Editrice</a></li>
                <li><a href="inserisci_libri.html.php">Inserisci Libri</a></li>
            </ul>
        </li>

        <li>
            <a id="menu_ordini" class="fa fa-truck"><span>Ordini</span></a>
            <ul>
                <li><a href="daordinare.php">Da Ordinare</a></li>
                <li><a href="ordinato.php">Ordinati</a></li>
                <li><a href="arrivato.php">Arrivati</a></li>
            </ul>
        </li>
        <li>
            <a href="utenti_registrati.php" class="fa fa-user"><span>Utenti registrati</span></a>
            <ul>
                <li><a href="utenti_registrati.php">Visualizza utenti</a></li>
            </ul>
        </li>
        <li>
            <a href="inserimento_news.php" class="fa fa-edit"><span>News</span></a>
        </li>
    </ul>
</nav>