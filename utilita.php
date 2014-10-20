<?php



    function ordinato($isbn)
    {
        include 'db.inc.php';

        try
        {
            $sql = 'SELECT COUNT(*) FROM libro
                    INNER JOIN ordine_libro on libro.isbn=ordine_libro.isbn
                    INNER JOIN ordine on ordine_libro.id_ordine=ordine.id_ordine
                    WHERE ordinato = :ordinato AND arrivato = :arrivato AND ordine_libro.isbn = :isbn';

            $s = $pdo->prepare($sql);

            $s->bindValue(':isbn', $isbn, PDO::PARAM_STR);
            $s->bindValue(':ordinato', false, PDO::PARAM_BOOL);
            $s->bindValue(':arrivato', false, PDO::PARAM_BOOL);

            $s->execute();

            $risultato = $s->fetch();

            if($risultato[0] == 1)
                return true;
            else
                return false;

        }
        catch(PDOException $e)
        {
            $error = 'Errore nella ricerca del libro in quelli da ordinare.';
            echo "<script language=\"JavaScript\">\n";
            echo "alert(\"$error\");\n";
            echo "</script>";
            exit();
        }
    }

?>