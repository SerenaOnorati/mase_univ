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
            $sql = 'DELETE FROM casa_editrice WHERE id_casa_editrice = :id_casa_editrice';
            $s = $pdo->prepare($sql);
            $s->bindValue(':id_casa_editrice', $_POST['id_casa_editrice'], PDO::PARAM_INT);
            $s->execute();
            echo 'Cancellazione avvenuta con successo';

        }
        catch (PDOException $e)
        {
            $error = 'Errore cancellazione casa editrice.';
            echo $error;
        }
    }
    else
    {
        echo "<script>alert(\"Non sei autorizzato ad accedere a questa pagina\")</script>";
    }
}
?>