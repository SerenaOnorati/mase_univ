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
            //prelevo i nuovi campi della nuova news dalla chiamata AJAX
            $titolo = $_POST['titolo'];
            $testo = $_POST['testo'];
            $immagine = $_POST['file'];
            $data = $_POST['data'];

            //echo "<a href=\upload\images\news\".$immagine.">";
            //inserimento della nuova news nel db
            try
            {
                $sql = 'INSERT INTO news (titolo, testo, immagine, data)
                VALUES (:titolo, :testo, :immagine, :data)';
                $s = $pdo->prepare($sql);
                //$s->bindValue('4', $id_news);
                $s->bindValue(':titolo', $titolo);
                $s->bindValue(':testo', $testo);
                $s->bindValue(':immagine', '\\'.$immagine);
                $s->bindValue(':data', $data);
                $s->execute();
                echo 'Inserimento avvenuto con successo';

            }
            catch (PDOException $e)
            {
                $error = 'Errore inserimento news.';
                echo $e->getMessage();
                //header("Location: inserimento_news.php");
            }
        }
        else
        {
            echo "<script language=\'JavaScript\'>alert(\"Non sei autorizzato ad accedere a questa pagina\")</script>";
        }

    }
?>