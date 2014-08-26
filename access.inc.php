<?php

function userIsLoggedIn()
{
    include 'configuration.php';

    if (isset($_POST['action']) and $_POST['action'] == 'login')
    {
        if (!isset($_POST['email']) or $_POST['email'] == '' or
            !isset($_POST['password']) or $_POST['password'] == '')
        {
            $GLOBALS['loginError'] = 'Per favore compilare tutti i campi';
            return FALSE;
        }


        $password = md5($_POST['password'] . $salt);

        if (databaseContainsAuthor($_POST['email'], $password))
        {
            echo "contiene l\'autore: ".$password;

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
                'L\'email o la password specificate non sono corrette.';
            return FALSE;
        }
    }

    if (isset($_POST['action']) and $_POST['action'] == 'logout')
    {
        session_start();
       /* unset($_SESSION['loggedIn']);
        unset($_SESSION['email']);
        unset($_SESSION['password']);*/

        session_destroy();
        header("Location: index.php");
        exit();
    }

    session_start();
    if (isset($_SESSION['loggedIn']))
    {
        return databaseContainsAuthor($_SESSION['email'], $_SESSION['password']);
    }
}

function databaseContainsAuthor($email, $password)
{
    include 'db.inc.php';

    try
    {
        $sql = 'SELECT COUNT(id_user) FROM user
        WHERE email = :email AND password = :password';

        $s = $pdo->prepare($sql);
        $s->bindValue(':email', $email, PDO::PARAM_STR);
        $s->bindValue(':password', $password, PDO::PARAM_STR);
        $s->execute();
    }
    catch (PDOException $e)
    {
        $error = 'Errore nella ricerca dell\'autore.';
        echo "<script language='JavaScript'>alert(".$error."\")</script>";
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
        $sql = "SELECT id_ruolo FROM user
        WHERE email = :email";
        $s = $pdo->prepare($sql);
        $s->bindValue(':email', $_SESSION['email'], PDO::PARAM_STR);
        $s->execute();
    }
    catch (PDOException $e)
    {
        $error = 'Errore nella ricerca del ruolo dell\'utente.';
        echo "<script language='JavaScript'>alert(".$error."\")</script>";
        exit();
    }

    $row = $s->fetch();

    if (!empty($row['id_ruolo']))
    {
        try
        {
            $sql = "SELECT descrizione FROM ruolo WHERE id_ruolo = :id_ruolo";
            $s = $pdo->prepare($sql);
            $s->bindValue(':id_ruolo', $row['id_ruolo'], PDO::PARAM_INT);
            $s->execute();
        }
        catch (PDOException $e)
        {
            $error = 'Errore nella ricerca del ruolo dell\' utente';
            echo "<script language='JavaScript'>alert(".$error."\")</script>";
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
    else
    {
        return FALSE;
    }
}