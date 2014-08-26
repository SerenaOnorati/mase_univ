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
            //prelevo i nuovi campi dalla chiamata AJAX
            $name = trim($_POST['name']);
            $surname = trim($_POST['surname']);
            $email = trim($_POST['email']);
            $tel = trim($_POST['tel']);
            $id_user = trim($_POST['id_user']);


            //effettuo UPDATE sul db dei campi modificati
            try
            {
                $sql = 'UPDATE user SET name = :name, surname =:surname, email =:email, tel =:tel WHERE id_user =:id_user';
                $s = $pdo->prepare($sql);
                $s->bindValue(':name', $name, PDO::PARAM_STR);
                $s->bindValue(':surname', $surname, PDO::PARAM_STR);
                $s->bindValue(':email', $email, PDO::PARAM_STR);
                $s->bindValue(':id_user', $id_user, PDO::PARAM_INT);
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
        else
        {
            echo "<script language='JavaScript'>alert(\"Non sei autorizzato ad accedere a questa pagina\")</script>";
        }

    }
?>