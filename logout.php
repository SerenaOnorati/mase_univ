<?php
    //includo i file necessari a collegarmi al db con relativo script di accesso
    include 'configuration.php';
    include 'access.inc.php';

    if(!isset($_SESSION['loggedIn']))
    {
        logout();
    }
    else
    {
        echo "<script language=\'JavaScript\'>alert(\"Hai gia\' effettuato il logout\")</script>";
    }

    header("Location: index.php");
?>