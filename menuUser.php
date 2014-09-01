<h1 id="logo"><a href="index.php"><img class="image-testata" src="images/universitalia.png"></a></h1>
<form action="logout.php" method="post" id="formlogout">
    <p style="text-align: right">
        <script type="text/javascript">
            function submitform()
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
        <a href="javascript: submitform()" class="fa fa-sign-out" title="Logout">Logout</a><br>
    </p>
</form>
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