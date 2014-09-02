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
            //prelevo i nuovi campi del nuovo libro dalla chiamata AJAX
            $autore = $_POST['autore'];
            $isbn = $_POST['isbn'];
            $titolo = $_POST['titolo'];
            $copertina =$_POST['copertina'];
            $locazione = $_POST['locazione'];
            $prezzo = $_POST['prezzo'];
            $prezzoa = $_POST['prezzoa'];
            $quantita = $_POST['quantita'];
            $anno = $_POST['anno'];
            $id_casa_editrice = $_POST['id_casa_editrice'];
            //$nome_casa_editrice = $_POST['nome_casa_editrice'];

            try
            {
                $sql = 'INSERT INTO libro (isbn, autore, titolo, copertina, locazione, prezzo, prezzo_acquisto ,quantita, anno_acquisto, id_casa_editrice)
                    VALUES (:isbn, :autore, :titolo, :copertina, :locazione, :prezzo, :prezzo_acquisto, :quantita, :anno, :id_casa_editrice)';
                $s = $pdo->prepare($sql);
                $s->bindValue(':isbn', $isbn, PDO::PARAM_INT);
                $s->bindValue(':autore', $autore, PDO::PARAM_STR);
                $s->bindValue(':titolo', $titolo, PDO::PARAM_STR);
                $s->bindValue(':copertina', '\\'.$copertina, PDO::PARAM_STR);
                $s->bindValue(':locazione', $locazione, PDO::PARAM_STR);
                $s->bindValue(':prezzo', $prezzo);
                $s->bindValue(':prezzo_acquisto', $prezzoa);
                $s->bindValue(':quantita', $quantita, PDO::PARAM_INT);
                $s->bindValue(':anno', $anno, PDO::PARAM_INT);
                $s->bindValue(':id_casa_editrice', $id_casa_editrice, PDO::PARAM_INT);

                $s->execute();

                echo 'Inserimento avvenuto con successo.';

            }
            catch (PDOException $e)
            {
                $error = 'Si è verificato un errore nell\'inserimento del libro';
                echo $error;
            }
        }
        else
        {
            echo "<script language=\'JavaScript\'>alert(\"Non sei autorizzato ad accedere a questa pagina.\")</script>";
        }

    }
?>