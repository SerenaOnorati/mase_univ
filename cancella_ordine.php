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
            /* Inizio la transazione */
            $pdo->beginTransaction();

            $sql = 'DELETE FROM ordine WHERE id_ordine = :id_ordine';

            $s = $pdo->prepare($sql);
            $s->bindValue(':id_ordine', $_POST['id'], PDO::PARAM_INT);

            $s->execute();

            //$id = $pdo->lastInsertId();

            $sql = 'DELETE FROM ordine_libro WHERE id_ordine = :id_ordine';

            $s = $pdo->prepare($sql);
            $s->bindValue(':id_ordine', $_POST['id'], PDO::PARAM_INT);

            $s->execute();

            /*Eseguo le operazioni della transazione*/
            $pdo->commit();

            echo 'Cancellazione ordine avvenuto con successo.';

        }
        catch (PDOException $e)
        {
            $error = 'Errore cancellazione ordine.';
            echo $error;
        }
    }
    else
    {
        echo "<script>alert(\"Non sei autorizzato ad accedere a questa pagina\")</script>";
    }
}
?>