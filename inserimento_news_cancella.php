<?php

include 'db.inc.php';
include 'access.inc.php';

    if(!IsLogged())
    {
        $GLOBALS['loginError'] = "Non hai effettuato il login. Inserire email e password";
        include 'index.php';
    }
    else{

        try
        {
            $sql = 'DELETE FROM news WHERE id_news = :id_news';
            $s = $pdo->prepare($sql);
            $s->bindValue(':id_news', $_POST['id_news']);
            $s->execute();
            echo 'Cancellazione avvenuta con successo';

        }
        catch (PDOException $e)
        {
            $error = 'Errore cancellazione news.';
            echo $error;
        }
    }
?>