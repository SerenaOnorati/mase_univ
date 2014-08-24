<?php
    include 'access.inc.php';
    include 'configuration.php';

    if(!IsLogged())
    {
        $GLOBALS['loginError'] = "Non hai effettuato il login. Inserire email e password";
        include 'index.php';
    }
    else {
        if(!userHasRole('Amministratore'))
        {
            $GLOBALS['loginError'] = "Non sei autorizzato ad accedere alla pagina di amministrazione";
            include 'index.php';
        }
        else
        {
            include 'db.inc.php';
            //recupera i dati delle news
            try
            {
                $sql = 'SELECT * FROM news order BY data';
                $s = $pdo->query($sql);

            }
            catch (PDOException $e)
            {
                $error = 'Errore nella ricerca news.';
                echo "<script language=\"JavaScript\">\n";
                echo "alert(\"$error\");\n";
                echo "</script>";
                exit();
            }
            //dopo la query inserisco in un'array global il risultato
            foreach($s as $row)
            {
                $news[] = array (
                  'id_news' => $row['id_news'],
                  'titolo' => $row['titolo'],
                  'testo' => $row['testo'],
                  'immagine' => $row['immagine'],
                  'data' => $row['data']
                );
            }
            //header('Content-Type: image/jpeg');
            $GLOBALS['news'] = $news;
            include 'inserimento_news.html.php';
        }
    }
?>
