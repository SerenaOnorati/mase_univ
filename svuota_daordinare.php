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

            /* Inizio la transazione */
            $pdo->beginTransaction();

            foreach ( $_POST['id'] as $chiave => $id) {

                try
                {
                    $sql = 'DELETE FROM ordine WHERE id_ordine = :id_ordine';

                    $s = $pdo->prepare($sql);
                    $s->bindValue(':id_ordine', $id, PDO::PARAM_INT);

                    $s->execute();

                    $sql = 'DELETE FROM ordine_libro WHERE id_ordine = :id_ordine';

                    $s = $pdo->prepare($sql);
                    $s->bindValue(':id_ordine', $id, PDO::PARAM_INT);

                    $s->execute();


                }

                catch (PDOException $e)
                {
                    $pdo->rollBack();
                    $error = 'Errore nella cancellazione dei libri ancora da ordinare.';
                    echo $error;
                }


            }
            /*Eseguo le operazioni della transazione*/
            $pdo->commit();
            echo 'Tutti i libri da ordinare sono stati cancellati con successo!';
        }
        else
        {
            echo "<script>alert(\"Non sei autorizzato ad accedere a questa pagina.\")</script>";
        }
    }
?>