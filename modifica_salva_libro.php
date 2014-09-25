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
            $autore = trim($_POST['autore']);
            $isbn = trim($_POST['isbn']);
            $isbn_old = trim($_POST['isbn_old']);
            $titolo = trim($_POST['titolo']);
            if(isset($_POST['copertina']))
                $copertina = trim($_POST['copertina']);
            else
                $copertina = "";
            $locazione = trim($_POST['locazione']);
            $prezzo = trim($_POST['prezzo']);
            $prezzo_acquisto = trim($_POST['prezzo_acquisto']);
            $quantita = trim($_POST['quantita']);
            $anno_acquisto = trim($_POST['anno_acquisto']);
            $id_casa_editrice = trim($_POST['id_casa_editrice']);

            //inserimento della nuova news nel db
            try
            {
                $sql = 'UPDATE libro SET isbn =:isbn, autore =:autore, titolo =:titolo, copertina =:copertina, locazione =:locazione,
                     prezzo =:prezzo, prezzo_acquisto =:prezzo_acquisto, quantita =:quantita, anno_acquisto =:anno_acquisto,
                    id_casa_editrice =:id_casa_editrice WHERE isbn= :isbn_old';

                $s = $pdo->prepare($sql);
                $s->bindValue(':isbn', $isbn, PDO::PARAM_INT);
                $s->bindValue(':isbn_old', $isbn_old, PDO::PARAM_INT);
                $s->bindValue(':autore', $autore, PDO::PARAM_STR);
                $s->bindValue(':titolo', $titolo, PDO::PARAM_STR);
                $s->bindValue(':copertina', $copertina, PDO::PARAM_STR);
                $s->bindValue(':locazione', $locazione, PDO::PARAM_STR);
                $s->bindValue(':prezzo', $prezzo);
                $s->bindValue(':prezzo_acquisto', $prezzo_acquisto);
                $s->bindValue(':quantita', $quantita, PDO::PARAM_INT);
                $s->bindValue(':anno_acquisto', $anno_acquisto, PDO::PARAM_INT);
                $s->bindValue(':id_casa_editrice', $id_casa_editrice, PDO::PARAM_INT);
                $s->execute();
                echo "Salvataggio dei dati avvenuto con successo.";

            }
            catch (PDOException $e)
            {
                $error = 'Errore aggiornamento del libro.';
                echo $e->$error;
            }
        }
        else
        {
            echo "<script language=\'JavaScript\'>alert(\"Non sei autorizzato ad accedere a questa pagina.\")</script>";
        }

    }
?>