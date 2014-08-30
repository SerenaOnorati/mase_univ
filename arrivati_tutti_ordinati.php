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
                    $sql = 'UPDATE ordine SET arrivato = :arrivato
                        WHERE id_ordine = :id_ordine';

                    $s = $pdo->prepare($sql);
                    $s->bindValue(':id_ordine', $id, PDO::PARAM_INT);
                    $s->bindValue(':arrivato', true, PDO::PARAM_BOOL);

                    $s->execute();

                }

                catch (PDOException $e)
                {
                    $pdo->rollBack();
                    $error = 'Errore nell\'aggiornamento dello stato dell\'ordine ad arrivato.';
                    echo $error;
                }

            }
            /*Eseguo le operazioni della transazione*/
            $pdo->commit();
            echo "Lo stato di tutti gli ordini è stato aggiornato ad arrivato.";
        }
        else
        {
            echo "<script>alert(\"Non sei autorizzato ad accedere a questa pagina.\")</script>";
        }
    }
?>