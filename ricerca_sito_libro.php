<?php

/********************************************************************
 *
 * da terminare!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 */
include 'db.inc.php';

    if(isset($_POST['isbn']))
    {
        $isbn = "%".trim($_POST['isbn'])."%";
    }
    else
    {
        $isbn = "%%";

    }

    try
    {
        $sql = 'SELECT * FROM libro
                    INNER JOIN casa_editrice on libro.id_casa_editrice = casa_editrice.id_casa_editrice
                    WHERE titolo LIKE :titolo';

        $s = $pdo->prepare($sql);
        $s->bindValue(':isbn', $isbn, PDO::PARAM_STR);
        $s->execute();
    }

    catch (PDOException $e)
    {
        $GLOBALS['checkError'] = $e->getMessage();
    }


    $risultati = $s->fetchAll();

    if(empty($risultati))
    {
        $GLOBALS['checkError'] = "La ricerca non ha prodotto risultati.";
    }

    include 'ricerca_sito_libro.html.php';
?>