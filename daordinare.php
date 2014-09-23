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
        if(!userHasRole('Amministratore'))
        {

            $GLOBALS['loginError'] = "Non sei autorizzato ad accedere alla pagina di amministrazione";
            include 'index.php';
        }
        else
        {

            include 'db.inc.php';
            //seleziono i libri che non sono stati ne ordinati ne arrivati
            try
            {
                if(isset($_SESSION['nome_distributore']) && $_SESSION['nome_distributore'] != '...')
                {
                    $sql = 'SELECT * FROM libro
                    INNER JOIN ordine_libro on libro.isbn=ordine_libro.isbn
                    INNER JOIN ordine on ordine_libro.id_ordine=ordine.id_ordine
                    INNER JOIN casa_editrice on libro.id_casa_editrice = casa_editrice.id_casa_editrice
                    INNER JOIN distributore on casa_editrice.id_distributore = distributore.id_distributore
                    WHERE ordinato = :ordinato AND arrivato = :arrivato AND nome_distributore = :nome_distributore';

                    $s = $pdo->prepare($sql);

                    $s ->bindValue(':nome_distributore', $_SESSION['nome_distributore'], PDO::PARAM_STR);
                    $s->bindValue(':ordinato', false, PDO::PARAM_BOOL);
                    $s->bindValue(':arrivato', false, PDO::PARAM_BOOL);

                }
                else
                {
                    $sql = 'SELECT * FROM libro
                    INNER JOIN ordine_libro on libro.isbn=ordine_libro.isbn
                    INNER JOIN ordine on ordine_libro.id_ordine=ordine.id_ordine
                    INNER JOIN casa_editrice on libro.id_casa_editrice = casa_editrice.id_casa_editrice
                    INNER JOIN distributore on casa_editrice.id_distributore = distributore.id_distributore
                    WHERE ordinato = false AND arrivato = false ORDER BY distributore.id_distributore';

                    unset($_SESSION['old_nome_distributore']);


                    $s = $pdo->prepare($sql);
                }
                if(isset($_SESSION['nome_distributore']))
                {
                    unset($_SESSION['nome_distributore']);
                }
                $s->execute();

            }
            catch (PDOException $e)
            {
                $error = 'Errore nella ricerca libri da ordinare.';
                echo "<script language=\"JavaScript\">\n";
                echo "alert(\"$error\");\n";
                echo "</script>";
                exit();
            }

            $risultati = $s->fetchAll();
            if(!empty($risultati))
            {
                $GLOBALS['risultati'] = $risultati;
                $id_ordini_array = array();
                foreach( $risultati as $id_ordini)
                {
                    $id = $id_ordini['id_ordine'];
                    array_push($id_ordini_array, $id);
                }

                $GLOBALS['id_ordini_array'] = $id_ordini_array;

            }
            else
                $GLOBALS['no_ordini'] = "Non ci sono libri da ordinare";

            include 'daordinare.html.php';
        }
    }
?>