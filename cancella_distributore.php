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
            $sql = 'DELETE FROM distributore WHERE id_distributore = :id_distributore';
            $s = $pdo->prepare($sql);
            $s->bindValue(':id_distributore', $_POST['id_distributore'], PDO::PARAM_INT);
            $s->execute();
            echo 'Cancellazione avvenuta con successo';

        }
        catch (PDOException $e)
        {
            $error = 'Errore cancellazione del distributore.';
            echo $error;
        }
    }
    else
    {
        echo "<script>alert(\"Non sei autorizzato ad accedere a questa pagina\")</script>";
    }
}
?>