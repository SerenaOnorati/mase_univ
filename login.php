<?php
    //includo i file necessari a collegarmi al db con relativo script di accesso
    include 'configuration.php';
    include 'access.inc.php';

    if(!IsLogged())
    {
    //se l'utente non è loggato, allora login()
        if(login())
        {
            //dopo il login si verifica il ruolo dell'utente per i diversi permessi
            if( userHasRole('Amministratore') )
            {
               header("Location: admin.php");
            }
            /* else aggiungi ruoli */
        }
    }
    else
    {
        logout();

    }


?>