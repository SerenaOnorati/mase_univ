<?php

    include 'db.inc.php';
    include 'access.inc.php';

    if(!userIsLoggedIn())
    {
        $GLOBALS['loginError'] = "Non hai effettuato il login. Inserire email e password";
        include 'index.php';
    }
    else{
        //prelevo i nuovi campi dalla chiamata AJAX
        $name = trim($_POST['name']);
        $surname = trim($_POST['surname']);
        $email = trim($_POST['email']);
        $tel = trim($_POST['tel']);

        //query di verifica se ci sono modifiche dei campi immessi
        try
        { 
            $sql = 'SELECT * FROM user
            WHERE email = :email AND password = :password';
            $s = $pdo->prepare($sql);
            $s->bindValue(':email', $_SESSION['email'], PDO::PARAM_STR);
            $s->bindValue(':password', $_SESSION['password'], PDO::PARAM_STR);
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
            //se tutti i campi sono uguali, non ci sono modifiche da fare
            if($row['name'] == $name && $row['surname'] == $surname && $row['tel'] == $tel && $row['email'] == $email)
            {
                echo "Non ci sono modifiche da fare";
            }
            //alcuni/tutti campi sono stati modificati
            else
            {
                //effettuo UPDATE sul db dei campi modificati
                try
                {
                    $sql = 'UPDATE user SET name = :name, surname = :surname, email = :email, tel = :tel WHERE email = :email1';
                    $s = $pdo->prepare($sql);
                    $s->bindValue(':name', $name, PDO::PARAM_STR);
                    $s->bindValue(':surname', $surname, PDO::PARAM_STR);
                    $s->bindValue(':email', $email, PDO::PARAM_STR);
                    $s->bindValue(':email1', $_SESSION['email'], PDO::PARAM_STR);
                    $s->bindValue(':tel', $tel, PDO::PARAM_STR);
                    $s->execute();
                }
                catch (PDOException $e)
                {
                    $error = 'Errore in modifica dati utente.';
                    echo $error;
                    exit();
                }

                echo "Modifica eseguita con successo";
            }
        }
        else
        {
            $error = 'Errore nel recupero dei dati';
            echo $error;
            exit();
        }
    }
?>