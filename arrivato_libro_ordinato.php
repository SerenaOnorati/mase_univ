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
            //prelevo i parametri dalla chiamata AJAX
            $id_ordine = trim($_POST['id_ordine']);
            $isbn = trim($_POST['isbn']);

            try
            {
                $pdo->beginTransaction();

                $sql = 'UPDATE ordine SET arrivato = :arrivato
                            WHERE id_ordine = :id_ordine';

                $s = $pdo->prepare($sql);
                $s->bindValue(':arrivato', true, PDO::PARAM_BOOL);
                $s->bindValue(':id_ordine', $id_ordine, PDO::PARAM_INT);
                $s->execute();

                $sql = 'SELCT quantita_ordine';
                $s = $pdo->prepare($sql);
                $s->bindValue(':quantita', true, PDO::PARAM_INT);
                $s->bindValue(':isbn', $isbn, PDO::PARAM_INT);
                $s->execute();

                $sql = 'UPDATE libro SET quantita = quantita + :quantita WHERE isbn =:isbn';
                $s = $pdo->prepare($sql);
                $s->bindValue(':quantita', true, PDO::PARAM_INT);
                $s->bindValue(':isbn', $isbn, PDO::PARAM_INT);
                $s->execute();

                $pdo->commit();
                echo "Lo stato dell'ordine è stato aggiornato ad arrivato.";

            }
            catch (PDOException $e)
            {
                $pdo->rollBack();
                $error = 'Errore nell\'aggiornamento dello stato dell\'ordine ad arrivato.';
                echo $error;
            }
        }
        else
        {
            echo "<script language=\'JavaScript\'>alert(\"Non sei autorizzato ad accedere a questa pagina.\")</script>";
        }
    }
?>