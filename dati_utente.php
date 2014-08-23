<?php
    include 'access.inc.php';
    include 'configuration.php';

    if(!IsLogged())
    {
        $GLOBALS['loginError'] = "Non hai effettuato il login. Inserire email e password";
        include 'index.php';
    }
    else
    {
        include 'db.inc.php';
        //recupera i dati dell'utente loggato
        try
        {
            $sql = 'SELECT * FROM user
            WHERE email = :email AND password = :password';
            $s = $pdo->prepare($sql);
            $s->bindValue(':email', $_SESSION['email']);
            $s->bindValue(':password', $_SESSION['password']);
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

        $row = $s->fetch();

        if ($row[0] > 0)
        {
            $GLOBALS['name'] = $row['name'];
            $GLOBALS['surname'] = $row['surname'];
            $GLOBALS['tel'] = $row['tel'];
            include_once 'dati_utente.html.php';
        }
        else
        {
            $error = 'Errore nel recupero dei dati';
            echo "<script language=\"JavaScript\">\n";
            echo "alert(\"$error\");\n";
            echo "</script>";
            exit();
        }
    }
?>
