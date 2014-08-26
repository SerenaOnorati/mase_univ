<?php

include 'db.inc.php';
include 'access.inc.php';

    if(!isset($_SESSION['loggedIn']))
    {
        $GLOBALS['loginError'] = "Non hai effettuato il login. Inserire email e password";
        include 'index.php';
    }
    else{
        if(userHasRole('Amministratore'))
        {
            try
            {
                $sql = 'DELETE FROM user WHERE id_user = :id_user';
                $s = $pdo->prepare($sql);
                $s->bindValue(':id_user', $_POST['id_user']);
                $s->execute();
                echo 'Cancellazione avvenuta con successo';

            }
            catch (PDOException $e)
            {
                $error = 'Errore cancellazione utente.';
                echo $error;
            }
        }
        else
        {
            echo "<script>alert(\"Non sei autorizzato ad accedere a questa pagina\")</script>";
        }

    }
?>