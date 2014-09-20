<?php

    if(isset($_POST['titolo']) && trim($_POST['titolo']) != '')
    {
        /*E' presente solo il titolo*/
        $check = 0;
        if(isset($_POST['autore'])&& trim($_POST['autore']) != '')
        {
            /*E' presente il titolo e l'autore*/
            $check = 1;
        }
    }
    else
    {
        if(isset($_POST['autore'])&& trim($_POST['autore']) != '')
        {
            /*E' presente solo l'autore*/
            $check = 2;
        }
        else
        {
            $GLOBALS['ricercaError'] = 'Inserire almeno un paramentro per la ricerca.';
            include 'index.php';
            exit();
        }
    }

    include 'db.inc.php';

    if($check == 0)
    {
        $titolo = "%".trim($_POST['titolo'])."%";

        try
        {
            $sql = 'SELECT * FROM libro
                        INNER JOIN casa_editrice on libro.id_casa_editrice = casa_editrice.id_casa_editrice
                        WHERE titolo LIKE :titolo';

            $s = $pdo->prepare($sql);
            $s->bindValue(':titolo', $titolo, PDO::PARAM_STR);
            $s->execute();
        }

        catch (PDOException $e)
        {
            $GLOBALS['checkError'] = $e->getMessage();
        }
    }
    else
    {
        if($check == 1)
        {
            $titolo = "%".trim($_POST['titolo'])."%";
            $autore = "%".trim($_POST['autore'])."%";

            try
            {
                $sql = 'SELECT * FROM libro
                        INNER JOIN casa_editrice on libro.id_casa_editrice = casa_editrice.id_casa_editrice
                        WHERE titolo LIKE :titolo AND autore LIKE :autore';

                $s = $pdo->prepare($sql);
                $s->bindValue(':titolo', $titolo, PDO::PARAM_STR);
                $s->bindValue(':autore', $autore, PDO::PARAM_STR);
                $s->execute();
            }

            catch (PDOException $e)
            {
                $GLOBALS['checkError'] = $e->getMessage();
            }
        }
        else
        {
            if($check == 2)
            {
                $autore = "%".trim($_POST['autore'])."%";
                try
                {
                    $sql = 'SELECT * FROM libro
                        INNER JOIN casa_editrice on libro.id_casa_editrice = casa_editrice.id_casa_editrice
                        WHERE autore LIKE :autore';

                    $s = $pdo->prepare($sql);
                    $s->bindValue(':autore', $autore, PDO::PARAM_STR);
                    $s->execute();
                }

                catch (PDOException $e)
                {
                    $GLOBALS['checkError'] = $e->getMessage();
                }
            }
            else
            {
                $GLOBALS['checkError'] = "Si è verificato un errore durante la ricerca.";
            }
        }
    }
    $risultati = $s->fetchAll();

    if(empty($risultati))
    {
        $GLOBALS['checkError'] = "La ricerca non ha prodotto risultati.";
    }

    include 'ricerca_sito.html.php';
?>