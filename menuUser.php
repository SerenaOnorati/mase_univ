<h1 id="logo"><a href="#">Universitalia</a></h1>
<p style="text-align: right">
    Benvenuto,
    <a href="dati_utente.php">
        <?php
            echo $_SESSION['email'];
        ?>
    </a>
    <a href="logout.php" class="fa fa-sign-out" title="Logout"></a>
</p>
<!-- Nav -->
<nav id="nav">
    <br>
    <ul id="icone">
        <li>
            <a href="" class="fa fa-book"><span>Libri</span></a>
            <ul>
                <li><a href="index.php#libreriaonline">Ricerca Libri</a></li>
            </ul>
        </li>
    </ul>
</nav>