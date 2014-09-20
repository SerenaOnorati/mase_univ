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
            $nome_distributore = trim($_POST['nome_distributore']);
            $indirizzo = trim($_POST['indirizzo']);
            $citta = trim($_POST['citta']);
            $telefono = trim($_POST['telefono']);
            $fax = trim($_POST['fax']);
            $email = trim($_POST['email']);
            $cap = trim($_POST['cap']);
            $sito_web = trim($_POST['sito_web']);
            $codice_libreria = trim($_POST['codice_libreria']);
            $preferenza_ordine = trim($_POST['preferenza_ordine']);
            $id_distributore = trim($_POST['id_distributore']);

            //inserimento della nuova news nel db
            try
            {
                $sql = 'UPDATE distributore SET nome_distributore =:nome_distributore, indirizzo =:indirizzo, citta =:citta, telefono =:telefono, fax =:fax,
                     email =:email, cap =:cap, sito_web =:sito_web, codice_libreria =:codice_libreria,
                    preferenza_ordine =:preferenza_ordine WHERE id_distributore= :id_distributore';

                $s = $pdo->prepare($sql);
                $s->bindValue(':id_distributore', $id_distributore, PDO::PARAM_INT);
                $s->bindValue(':nome_distributore', $nome_distributore, PDO::PARAM_STR);
                $s->bindValue(':indirizzo', $indirizzo, PDO::PARAM_STR);
                $s->bindValue(':citta', $citta, PDO::PARAM_STR);
                $s->bindValue(':telefono', $telefono, PDO::PARAM_STR);
                $s->bindValue(':fax', $fax, PDO::PARAM_STR);
                $s->bindValue(':email', $email, PDO::PARAM_STR);
                $s->bindValue(':cap', $cap, PDO::PARAM_INT);
                $s->bindValue(':sito_web', $sito_web, PDO::PARAM_STR);
                $s->bindValue(':codice_libreria', $codice_libreria, PDO::PARAM_STR);
                $s->bindValue(':preferenza_ordine', $preferenza_ordine, PDO::PARAM_STR);
                $s->execute();
                echo "Salvataggio dei dati avvenuto con successo.";

            }
            catch (PDOException $e)
            {
                $error = 'Errore aggiornamento del distributore.';
                echo $error;
            }
        }
        else
        {
            echo "<script language=\'JavaScript\'>alert(\"Non sei autorizzato ad accedere a questa pagina.\")</script>";
        }

    }
?>