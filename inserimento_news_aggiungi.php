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
            //prelevo i nuovi campi della nuova news dalla chiamata AJAX
            $titolo = $_POST['titolo'];
            $testo = $_POST['testo'];
            $immagine = $_POST['file'];
            $data = $_POST['data'];

            //inserimento della nuova news nel db
            try
            {
                $sql = 'INSERT INTO news (titolo, testo, immagine, data)
                VALUES (:titolo, :testo, :immagine, :data)';
                $s = $pdo->prepare($sql);
                $s->bindValue(':titolo', $titolo, PDO::PARAM_STR);
                $s->bindValue(':testo', $testo, PDO::PARAM_STR);
                $s->bindValue(':immagine', '\\'.$immagine, PDO::PARAM_STR);
                $s->bindValue(':data', $data);
                $s->execute();
                echo 'Inserimento avvenuto con successo';

            }
            catch (PDOException $e)
            {
                $error = 'Errore inserimento news.';
                echo $e->getMessage();
            }
        }
        else
        {
            echo "<script language=\'JavaScript\'>alert(\"Non sei autorizzato ad accedere a questa pagina\")</script>";
        }

    }
?>