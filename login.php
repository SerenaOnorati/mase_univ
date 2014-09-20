<?php
    //includo i file necessari a collegarmi al db con relativo script di accesso
    include 'configuration.php';
    include 'access.inc.php';

    if(userIsLoggedIn()){

        if(userHasRole('Amministratore'))
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
    }
    else
    {
        $GLOBALS['loginError'] = 'Il login non è avvenuto con successo.';
        include 'index.php';
    }
?>