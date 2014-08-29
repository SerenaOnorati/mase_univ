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
        //prelevo i nuovi campi del nuovo ordine dalla chiamata AJAX
        $isbn = $_POST['isbn'];
        $quantita = $_POST['quantita'];
        $data = date("Y/m/d");

        //inserimento della nuova news nel db
        try
        {
            /* Inizio la transazione */
            $pdo->beginTransaction();

            $sql = 'INSERT INTO ordine (arrivato, ordinato)
                    VALUES (:arrivato, :ordinato)';

            $s = $pdo->prepare($sql);
            $s->bindValue(':arrivato', false, PDO::PARAM_BOOL);
            $s->bindValue(':ordinato', false, PDO::PARAM_BOOL);

            $s->execute();

            $id = $pdo->lastInsertId();

            $sql = 'INSERT INTO ordine_libro (isbn, quantita, data_ordine, id_ordine)
                    VALUES (:isbn, :quantita, :data_ordine, :id_ordine)';
            $s = $pdo->prepare($sql);
            $s->bindValue(':isbn', $isbn, PDO::PARAM_INT);
            $s->bindValue(':quantita', $quantita, PDO::PARAM_INT);
            $s->bindValue(':data_ordine', $data);
            $s->bindValue(':id_ordine', $id, PDO::PARAM_INT);

            $s->execute();

            /*Eseguo le operazioni della transazione*/
            $pdo->commit();

            echo 'Inserimento avvenuto con successo.';

        }
        catch (PDOException $e)
        {
            $error = 'Errore inserimento ordine.';
            echo $e->getMessage();
            /*Se gli inserimenti non vanno a buon fine annullo le modifiche */
            $pdo->rollBack();
        }
    }
    else
    {
        echo "<script language=\'JavaScript\'>alert(\"Non sei autorizzato ad accedere a questa pagina.\")</script>";
    }

}
?>