<?php
    include 'access.inc.php';
    include 'configuration.php';

    if(!userIsLoggedIn())
    {
        $GLOBALS['loginError'] = "Non hai effettuato il login. Inserire email e password";
        include 'index.php';
    }
    else
    {
        include 'db.inc.php';

        if(isset($_POST['institolo'])){
            $titolo = "%".trim($_POST['institolo'])."%";

        }
        else
        {
            $titolo = "%%";

        }
        if(isset($_POST['insautore']))
        {
            $autore = "%".$_POST['insautore']."%";
        }
        else
        {
            $autore = "%%";

        }
        if(isset($_POST['inscasaeditrice']))
        {
            $casaeditrice = "%".trim($_POST['inscasaeditrice'])."%";

        }
        else
        {
            $casaeditrice = "%%";
        }

        if(isset($_POST['inslocazione']))
        {
            $locazione = "%".trim($_POST['inslocazione'])."%";
        }
        else
        {
            $locazione = "%%";

        }

        if(isset($_POST['insisbn']))
        {
            $isbn = "%".trim($_POST['insisbn'])."%";
        }
        else
        {
            $isbn = "%%";

        }

        if(isset($_POST['insannoacquisto']))
        {
            $anno_acquisto = "%".trim($_POST['insannoacquisto'])."%";            }
        else
        {
            $anno_acquisto = "%%";

        }
        if($titolo == "%%" && $autore == "%%" && $locazione == "%%" && $casaeditrice == "%%" && $isbn == "%%" && $anno_acquisto == "%%")
        {
            $risultato = 'Per favore inserire i parametri per la ricerca';
            header("Location: admin.php?risultato=$risultato");
        }
        else
        {
            try
            {
                $sql = 'SELECT * FROM libro INNER JOIN casa_editrice on libro.id_casa_editrice = casa_editrice.id_casa_editrice INNER JOIN distributore on casa_editrice.id_distributore = distributore.id_distributore WHERE titolo LIKE :titolo AND autore LIKE :autore AND locazione LIKE :locazione
                AND nome LIKE :nome AND isbn LIKE :isbn AND anno_acquisto LIKE :anno_acquisto';

                $s = $pdo->prepare($sql);

                $s->bindValue(':titolo', $titolo, PDO::PARAM_STR);
                $s->bindValue(':autore', $autore, PDO::PARAM_STR);
                $s->bindValue(':locazione', $locazione, PDO::PARAM_STR);
                $s->bindValue(':nome', $casaeditrice, PDO::PARAM_STR);
                //non hanno il terzo parametro in quanto con la %% non sarebbero interi.
                $s->bindValue(':isbn', $isbn);
                $s->bindValue(':anno_acquisto', $anno_acquisto);

                $s->execute();
            }

            catch (PDOException $e)
            {
                $GLOBALS['error'] = $e->getMessage();
                exit();
            }

            $risultati = $s->fetchAll();

            if(!empty($risultati))
            {
                $GLOBALS['risultati'] = $risultati;
                include 'daordinare.html.php';

            }
            else{
                $risultato = 'La ricerca non ha prodotto risultati';
                header("Location: admin.php?risultato=$risultato");
            }
        }
    }
?>
