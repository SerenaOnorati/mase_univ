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
            //prelevo i nuovi campi dalla chiamata AJAX
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $email = $_POST['email'];
            $tel = $_POST['tel'];
            $id_user = $_POST['id_user'];


            //effettuo UPDATE sul db dei campi modificati
            try
            {
                $sql = 'UPDATE user SET name = :name, surname = :surname, email = :email, tel = :tel WHERE id_user = :id_user';
                $s = $pdo->prepare($sql);
                $s->bindValue(':name', $name);
                $s->bindValue(':surname', $surname);
                $s->bindValue(':email', $email);
                $s->bindValue(':id_user', $id_user);
                $s->bindValue(':tel', $tel);
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
        else
        {
            echo "<script language='JavaScript'>alert(\"Non sei autorizzato ad accedere a questa pagina\")</script>";
        }

    }
?>