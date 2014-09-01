<?php
    include 'access.inc.php';
    include 'configuration.php';

    if(!userIsLoggedIn())
    {
        $GLOBALS['loginError'] = "Non hai effettuato il login. Inserire email e password";
        include 'index.php';
    }
    else
    {
        if(!userHasRole('Amministratore'))
        {

            $GLOBALS['loginError'] = "Non sei autorizzato ad accedere alla pagina di amministrazione";
            include 'index.php';
        }
        else
        {
            $_SESSION['nome_distributore'] = $_POST['nome_distributore'];
            $_SESSION['old_nome_distributore'] = $_POST['nome_distributore'];
        }
    }
?>