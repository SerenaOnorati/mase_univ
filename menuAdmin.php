<h1 id="logo"><a href="#">Universitalia</a></h1>
<p style="text-align: right">
    Benvenuto,
    <a href="#">
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

        <li>
            <a href="" class="fa fa-truck"><span>Ordini</span></a>
            <ul>
                <li><a href="">Da ordinare</a></li>
                <li><a href="">Ordinati</a></li>
            </ul>
        </li>
        <li>
            <a href="" class="fa fa-user"><span>Utenti registrati</span></a>
        </li>
        <li>
            <a href="" class="fa fa-edit"><span>News</span></a>
        </li>
    </ul>
</nav>