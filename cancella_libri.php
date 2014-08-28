<?php

include 'db.inc.php';
include 'access.inc.php';

if(!userIsLoggedIn())
{
    $GLOBALS['loginError'] = "Non hai effettuato il login. Inserire email e password";
    include 'index.php';
}
else{
    if(userHasRole('Amministratore'))
    {
        try
        {
            $sql = 'DELETE FROM libro WHERE isbn = :isbn';
            $s = $pdo->prepare($sql);
            $s->bindValue(':isbn', $_POST['isbn'], PDO::PARAM_INT);
            $s->execute();
            echo 'Cancellazione avvenuta con successo';

        }
        catch (PDOException $e)
        {
            $error = 'Errore cancellazione utente.';
            echo $error;
        }
    }
    else
    {
        echo "<script>alert(\"Non sei autorizzato ad accedere a questa pagina\")</script>";
    }
}
?>