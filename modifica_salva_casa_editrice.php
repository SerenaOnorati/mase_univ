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
            //prelevo i nuovi campi della nuova news dalla chiamata AJAX
            $id_casa_editrice = trim($_POST['id_casa_editrice']);
            $nome = trim($_POST['nome']);
            $sito_web = trim($_POST['sito_web']);
            $id_distributore = trim($_POST['id_distributore']);

            //inserimento della nuova news nel db
            try
            {
                $sql = 'UPDATE casa_editrice SET  nome =:nome, sito_web =:sito_web, id_distributore =:id_distributore
                        WHERE id_casa_editrice =:id_casa_editrice';

                $s = $pdo->prepare($sql);
                $s->bindValue(':id_distributore', $id_distributore, PDO::PARAM_INT);
                $s->bindValue(':id_casa_editrice', $id_casa_editrice, PDO::PARAM_STR);
                $s->bindValue(':nome', $nome, PDO::PARAM_STR);
                $s->bindValue(':sito_web', $sito_web, PDO::PARAM_STR);
                $s->execute();
                echo "Salvataggio dei dati avvenuto con successo.";

            }
            catch (PDOException $e)
            {
                $error = 'Errore aggiornamento del distributore.';
                echo $e->getMessage();
            }
        }
        else
        {
            echo "<script language=\'JavaScript\'>alert(\"Non sei autorizzato ad accedere a questa pagina.\")</script>";
        }

    }
?>