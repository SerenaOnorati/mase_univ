<?php

    include 'db.inc.php';
    include 'access.inc.php';
    include 'configuration.php';

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

        //se è stata inserita una nuova password
        if(isset($_POST['password']))
        {
            $password_new = trim($_POST['password']);
        }

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
            $error = 'Errore nella ricerca dati dell\'utente.';
            echo "<script language=\"JavaScript\">\n";
            echo "alert(\"$error\");\n";
            echo "</script>";
            exit();
        }

        $row = $s->fetch();

        if ($row[0] > 0)
        {
            //controllo se tutti i campi sono uguali
            if($row['name'] == $name && $row['surname'] == $surname && $row['tel'] == $tel && $row['email'] == $email)
            {
                //se lo sono controllo se è stata settata la nuova password
                if(isset($password_new) && isset($_POST['password_old']))
                {
                    //se ho inserito correttamente la vecchia password
                    if(md5(trim($_POST['password_old']).$salt) == $_SESSION['password'])
                    {
                        //se è stata settata controllo se è uguale a quella vecchia
                        if($row['password'] == md5($password_new.$salt))
                        {
                            echo "Non ci sono modifiche da fare, la nuova password è uguale a quella attuale.";
                        }
                        //altrimenti devo aggiornare solo la password
                        else
                        {
                            //effettuo UPDATE sul db dei campi modificati
                            try
                            {
                                $sql = 'UPDATE user SET password =:password_new WHERE email = :email';
                                $s = $pdo->prepare($sql);
                                $s->bindValue(':email', $email, PDO::PARAM_STR);
                                $s->bindValue(':password_new', md5($password_new.$salt), PDO::PARAM_STR);
                                $s->execute();
                            }
                            catch (PDOException $e)
                            {
                                $error = 'Errore nella modifica dei dati dell\'utente.';
                                echo $error;
                                exit();
                            }
                            //aggiorno la password di sessione
                            $_SESSION['password'] = md5($password_new.$salt);

                            echo "La password è stata modifica con successo.";
                        }
                    }
                    else
                    {
                        echo "Per modificare la password occorre inserire quella vecchia correttamente.";
                    }
                }
                else
                {
                    echo "Non ci sono modifiche da fare.";
                }
            }
            //alcuni/tutti campi sono stati modificati
            else
            {
                //controllo che sia stata inserita una nuova password
                if(isset($password_new) && isset($_POST['password_old']))
                {
                    //se ho inserito correttamente la vecchia password
                    if(md5(trim($_POST['password_old']).$salt) == $_SESSION['password'])
                    {
                        //se è stata inserita controllo se è uguale a quella impostata
                        if($row['password'] == md5($password_new.$salt))
                        {
                            //se è uguale a quella di sessione devo solo aggiornare gli altri campi
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
                            //controllo se è stata modificata l'email di sessione, se lo è l'aggiorno
                            if($email != $_SESSION['email'])
                                $_SESSION['email'] = $email;

                            echo "I dati sono stati modificati con successo.";
                        }
                        //devo aggiornare anche la password
                        else
                        {
                            //effettuo UPDATE sul db dei campi modificati
                            try
                            {
                                $sql = 'UPDATE user SET name = :name, surname = :surname, email = :email, tel = :tel, password =:password_new WHERE email = :email1';
                                $s = $pdo->prepare($sql);
                                $s->bindValue(':name', $name, PDO::PARAM_STR);
                                $s->bindValue(':surname', $surname, PDO::PARAM_STR);
                                $s->bindValue(':email', $email, PDO::PARAM_STR);
                                $s->bindValue(':password_new', md5($password_new.$salt), PDO::PARAM_STR);
                                $s->bindValue(':email1', $_SESSION['email'], PDO::PARAM_STR);
                                $s->bindValue(':tel', $tel, PDO::PARAM_STR);
                                $s->execute();
                            }
                            catch (PDOException $e)
                            {
                                $error = 'Errore nella modifica dei dati.';
                                echo $error;
                                exit();
                            }
                            //controllo se è stata modificata l'email di sessione, se lo è l'aggiorno
                            if($email != $_SESSION['email'])
                                $_SESSION['email'] = $email;
                            //aggiorno la psw di sessione
                            $_SESSION['password'] = md5($password_new.$salt);

                            echo "I dati sono stati modificati con successo.";
                        }
                    }
                    else
                    {
                        echo "Per modificare la password occorre inserire quella vecchia correttamente.";
                    }
                }
                //non è stata inserita una nuova password ma sono stati modificati gli altri campi
                else
                {
                    //se è uguale a quella di sessione devo solo aggiornare gli altri campi
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
                    //controllo se è stata modificata l'email di sessione, se lo è l'aggiorno
                    if($email != $_SESSION['email'])
                        $_SESSION['email'] = $email;

                    if(!isset($_POST['password old']))
                        echo "I dati sono stati modificati con successo.";
                    else
                        echo "Attenzione: tutti i dati sono stati modificati con successo tranne la password perché non è stata inserita quella precedente.";
                }
            }
        }
        else
        {
            $error = 'Errore nel recupero dei dati dell\'utente.';
            echo $error;
            exit();
        }
    }
?>