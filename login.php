<?php
    //includo i file necessari a collegarmi al db con relativo script di accesso
    include 'configuration.php';
    include 'access.inc.php';

    //verifico se l'utente è loggato
    if(!isset($_SESSION['loggedIn']))
    {
        session_start();
        if(!login())
            header("Location: index.php");

    }

    //dopo il login si verifica il ruolo dell'utente per i diversi permessi
    if(userHasRole('Amministratore') )
    {
        header("Location: admin.php");
    }
    else
    {
        if(userHasRole('Utente'))
        {
            header("Location: user.php");
        }
    }

?>