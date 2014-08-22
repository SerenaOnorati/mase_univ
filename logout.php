<?php
    //includo i file necessari a collegarmi al db con relativo script di accesso
    include 'configuration.php';
    include 'access.inc.php';

    if(IsLogged())
    {
        logout();
        header("Location: index.php");
    }
?>