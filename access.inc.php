<?php

    include_once $_SERVER['DOCUMENT_ROOT'] .'configuration.php';
    function userIsLoggedIn()
    {
        //$salt = 'wktxl';
        $nome_sito = 'www.unipass.it/mase_univ/';

        if (isset($_POST['action']) and $_POST['action'] == 'login')
        {
            if (!isset($_POST['email']) or $_POST['email'] == '' or
                !isset($_POST['password']) or $_POST['password'] == '')
            {
                $GLOBALS['loginError'] = 'Please fill in both fields';
                return FALSE;
            }

            $password = md5($_POST['password'] .$salt);

            if (databaseContainsUser($_POST['email'], $password))
            {
                session_start();
                $_SESSION['loggedIn'] = TRUE;
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['password'] = $password;
                return TRUE;
            }
            else
            {
                session_start();
                unset($_SESSION['loggedIn']);
                unset($_SESSION['email']);
                unset($_SESSION['password']);
                $GLOBALS['loginError'] =
                    'The specified email address or password was incorrect.';
                return FALSE;
            }
        }

        if (isset($_POST['action']) and $_POST['action'] == 'logout')
        {

            session_start();
            unset($_SESSION['loggedIn']);
            unset($_SESSION['email']);
            unset($_SESSION['password']);
            header('Location:'.$nome_sito.'index.php');
            exit();
        }

        session_start();
        if (isset($_SESSION['loggedIn']))
        {
            return databaseContainsUser($_SESSION['email'], $_SESSION['password']);
        }
    }

    function databaseContainsUser($email, $password)
    {
        include 'db.inc.php';
        //include_once $_SERVER['DOCUMENT_ROOT'] .'db.inc.php';
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
            $error = 'Errore nella ricerca utente.';
            echo "<script language=\"JavaScript\">\n";
            echo "alert(\"$error\");\n";
            echo "</script>";
            exit();
        }

        $row = $s->fetch();

        if ($row[0] > 0)
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
            $sql = "SELECT descrizione FROM ruolo
            WHERE id_ruolo IN (SELECT id_ruolo FROM user WHERE email = :email)";

            /*$sql = "SELECT COUNT(*) FROM user
            INNER JOIN id_ruolo ON user.id_ruolo = id_ruolo
            INNER JOIN ruolo ON id_ruolo = ruolo.id_ruolo
            WHERE email = :email AND ruolo.id_ruolo = :roleId";
            */

            $s = $pdo->prepare($sql);
            $s->bindValue(':email', $_SESSION['email']);
            $s->bindValue(':roleId', $role);
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

        if ($row['descrizione'] == $role)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
