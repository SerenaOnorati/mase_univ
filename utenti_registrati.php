<?php
include 'access.inc.php';
include 'configuration.php';

if(!userIsLoggedIn())
{
    $GLOBALS['loginError'] = "Non hai effettuato il login. Inserire email e password";
    include 'index.php';
}
else {
    if(!userHasRole('Amministratore'))
    {
        $GLOBALS['loginError'] = "Non sei autorizzato ad accedere alla pagina di amministrazione";
        include 'index.php';
    }
    else
    {
        include 'db.inc.php';
        //conto il numero degli utenti
        try
        {
            $sql = 'SELECT * FROM user WHERE email != :email';
            $s = $pdo->prepare($sql);
            $s->bindValue(':email', $_SESSION['email'], PDO::PARAM_STR);
            $s->execute();

        }
        catch (PDOException $e)
        {
            $error = 'Errore nella ricerca degli utenti.';
            echo "<script language=\"JavaScript\">\n";
            echo "alert(\"$error\");\n";
            echo "</script>";
            include 'utenti_registrati.html.php';
            exit();

        }

        //dopo la query inserisco in un'array global il risultato
        $users = $s->fetchAll();
        if(isset($users)){
            $GLOBALS['users'] = $users;
        }
        else{
            $error = 'Non ci sono utenti del database';
            echo "<script language=\"JavaScript\">\n";
            echo "alert(\"$error\");\n";
            echo "</script>";
        }

        include 'utenti_registrati.html.php';
    }
}
?>
