<?php

    function login()
    {
        include 'configuration.php';

        $GLOBALS['loginError'] = ' ';

        if (!isset($_POST['email']) or $_POST['email'] == '' or
            !isset($_POST['password']) or $_POST['password'] == '')
        {
            $GLOBALS['loginError'] = 'Errore nella procedura di login';
            include 'index.php';
            return FALSE;
        }

        $password = md5($_POST['password'] .$salt);


        if (databaseContainsUser($_POST['email'], $password))
        {
            //session_start();
            $_SESSION['loggedIn'] = TRUE;
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['password'] = $password;
            return TRUE;
        }
        else
        {
            $GLOBALS['loginError'] = 'Controlla se l\'email e password sono corretti.';
            include 'index.php';
            return FALSE;
        }
    }

    function logout()
    {
        include 'configuration.php';

        unset($_SESSION['loggedIn']);
        unset($_SESSION['email']);
        unset($_SESSION['password']);

        header('Location: index.php');

        //exit();

    }

    /*function IsLogged()
    {
        session_start();
        if (isset($_SESSION['loggedIn']))
        {
            return databaseContainsUser($_SESSION['email'], $_SESSION['password']);
        }
        else{
            echo "non è settata";
        }
    }*/

    function databaseContainsUser($email, $password)
    {
        include 'db.inc.php';

        try
        {

            $sql = 'SELECT COUNT(*) FROM user
            WHERE email = :email AND password = :password';
            $s = $pdo->prepare($sql);
            $s->bindValue(':email', $email);
            $s->bindValue(':password', $password);
            $s->execute();
        }
        catch (PDOException $e)
        {
            $error = 'Errore nella cricerca utente.';
            echo "<script language=\"JavaScript\">\n";
            echo "alert(\"$error\");\n";
            echo "</script>";
            //exit();
        }

        $row = $s->fetch();

        //echo "row ".$row[0];

        if (isset($row[0]))
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    function userHasRole($role)
    {
        include 'db.inc.php';

        try
        {

            $sql = 'SELECT id_ruolo FROM user WHERE email = :email';

            $s = $pdo->prepare($sql);
            $s->bindValue(':email', $_SESSION['email']);
            $s->execute();

        }
        catch (PDOException $e)
        {
            $error = 'Errore nella ricerca del ruolo utente.';
            echo "<script language=\"JavaScript\">\n";
            echo "alert(\"$error\");\n";
            echo "</script>";
            exit();
        }

        $row = $s->fetch();

        echo "<script language=\"JavaScript\">\n";
        echo "alert(\"id_ruolo: ".$row['id_ruolo']."\");";
        echo "</script>";

        if (isset($row['id_ruolo']))
        {
            $sql_1 = 'SELECT descrizione FROM ruolo WHERE id_ruolo = :risultato';
            $s1 = $pdo->prepare($sql_1);
            $s1->bindValue(':risultato', $row['id_ruolo']);
            $s1->execute();
            $row_1 = $s1->fetch();
            if($row_1['descrizione'] == $role)
                return TRUE;
            else
                return FALSE;
        }
        else
        {
            $error = 'Errore nella ricerca dell\' id_ruolo utente';
            echo "<script language=\"JavaScript\">\n";
            echo "alert(\"$error\");\n";
            echo "</script>";
            exit();
        }
    }
