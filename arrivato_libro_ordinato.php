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

            try
            {
                $sql = 'UPDATE ordine SET arrivato = :arrivato
                            WHERE id_ordine = :id_ordine';

                $s = $pdo->prepare($sql);
                $s->bindValue(':arrivato', true, PDO::PARAM_BOOL);
                $s->bindValue(':id_ordine', $id_ordine, PDO::PARAM_INT);
                $s->execute();
                echo "Lo stato dell'ordine è stato aggiornato ad arrivato.";

            }
            catch (PDOException $e)
            {
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