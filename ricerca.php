<?php
    include 'access.inc.php';
    include 'configuration.php';

    if(!userIsLoggedIn())
    {
        $GLOBALS['loginError'] = "Non hai effettuato il login. Inserire email e password";
        include 'index.php';
    }
    else
    {
        include 'db.inc.php';
        //controllo se tutti i campi sono riempiti
        if(isset($_POST['titolo']) && isset($_POST['autore']) && isset($_POST['casaeditrice']) && isset($_POST['locazione']))
        {
            try
            {
                $sql = 'SELECT * FROM libro
                WHERE titolo LIKE :titolo AND autore LIKE :autore AND locazione LIKE :locazione';
                $s = $pdo->prepare($sql);
                $s->bindValue(':titolo', $_SESSION['titolo'], PDO::PARAM_STR);
                $s->bindValue(':autore', $_SESSION['autore'], PDO::PARAM_STR);
                $s->bindValue(':locazione', $_SESSION['locazione'], PDO::PARAM_STR);

                $s->execute();
            }
            catch (PDOException $e)
            {
                $error = 'Errore nella ricerca dati utente.';
                echo "<script language=\"JavaScript\">\n";
                echo "alert(\"$error\");\n";
                echo "</script>";
                exit();
            }
        }



        $row = $s->fetch();

        if (isset($row))
        {
            $GLOBALS['name'] = $row['name'];
            $GLOBALS['surname'] = $row['surname'];
            $GLOBALS['tel'] = $row['tel'];
        }
        else
        {
            $error = 'Errore nel recupero dei dati';
            echo "<script language=\"JavaScript\">\n";
            echo "alert(\"$error\");\n";
            echo "</script>";
        }
        include 'dati_utente.html.php';
    }
?>
