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
                $sql = 'UPDATE ordine SET ordinato = :ordinato
                        WHERE id_ordine = :id_ordine';

                $s = $pdo->prepare($sql);
                $s->bindValue(':ordinato', true, PDO::PARAM_BOOL);
                $s->bindValue(':id_ordine', $id_ordine, PDO::PARAM_INT);
                $s->execute();
                echo "Lo stato dell'ordine è stato aggiornato ad ordinato.";

            }
            catch (PDOException $e)
            {
                $error = 'Errore nell\'aggiornamento dello stato dell\'ordine ad ordinato.';
                echo $error;
            }
        }
        else
        {
            echo "<script language=\'JavaScript\'>alert(\"Non sei autorizzato ad accedere a questa pagina.\")</script>";
        }
    }
?>