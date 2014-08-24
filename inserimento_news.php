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
                $sql = 'SELECT * FROM news order BY data DESC';
                $s = $pdo->prepare($sql);
                $s->execute();

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
            $news = $s->fetchAll();
            if(isset($news)){
                $GLOBALS['news'] = $news;
            }
            else{
                $error = 'Non sono state inserite news nel db';
                echo "<script language=\"JavaScript\">\n";
                echo "alert(\"$error\");\n";
                echo "</script>";
            }

            include 'inserimento_news.html.php';
        }
    }
?>
