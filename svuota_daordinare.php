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

            $id_ordini = json_decode($_POST['id'], true);

            echo print_r($id_ordini) ;
            /*try
            {

                $id_ordini = json_decode($_POST['id_ordini']);

                echo $id_ordini;

                /* Inizio la transazione */
                /*$pdo->beginTransaction();
                foreach($id_ordini as $id)
                {
                    $sql = 'DELETE FROM ordine WHERE id_ordine = :id_ordine';

                    $s = $pdo->prepare($sql);
                    $s->bindValue(':id_ordine', $id, PDO::PARAM_INT);

                    $s->execute();

                    //$id = $pdo->lastInsertId();

                    $sql = 'DELETE FROM ordine_libro WHERE id_ordine = :id_ordine';

                    $s = $pdo->prepare($sql);
                    $s->bindValue(':id_ordine', $id, PDO::PARAM_INT);

                    $s->execute();
                }

                /*Eseguo le operazioni della transazione*/
                /*$pdo->commit();

                echo 'Cancellazione ordine avvenuto con successo.';

            }
            catch (PDOException $e)
            {
                $pdo->rollBack();
                $error = 'Errore cancellazione ordine.';
                echo $error;
            }*/
        }
        else
        {
            echo "<script>alert(\"Non sei autorizzato ad accedere a questa pagina.\")</script>";
        }
    }
?>