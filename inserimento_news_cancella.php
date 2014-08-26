<?php

include 'db.inc.php';
include 'access.inc.php';

    if(!userIsLoggedIn())
    {
        $GLOBALS['loginError'] = "Non hai effettuato il login. Inserire email e password";
        include 'index.php';
    }
    else{
        if(userHasRole('Amministratore')){
            try
            {
                $sql = 'DELETE FROM news WHERE id_news = :id_news';
                $s = $pdo->prepare($sql);
                $s->bindValue(':id_news', $_POST['id_news'], PDO::PARAM_INT);
                $s->execute();
                echo 'Cancellazione avvenuta con successo';

            }
            catch (PDOException $e)
            {
                $error = 'Errore cancellazione news.';
                echo $error;
            }
        }
        else
        {
            echo "<script language=\'JavaScript\'>alert(\"Non sei autorizzato ad accedere a questa pagina\")</script>";
        }
    }
?>