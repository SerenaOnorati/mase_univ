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
        $nome = $_POST['nome'];
        $sito_web_casa_editrice = $_POST['sito'];
        $id_distributore = $_POST['id_distributore'];

        try
        {
            $pdo->beginTransaction();

            $sql = 'SELECT COUNT(*) FROM casa_editrice WHERE nome LIKE :nome AND sito_web_casa_editrice LIKE :sito_web_casa_editrice AND id_distributore LIKE :id_distributore';
            $s = $pdo->prepare($sql);

            $s->bindValue(':nome', $nome, PDO::PARAM_STR);
            $s->bindValue(':sito_web_casa_editrice', $sito_web_casa_editrice, PDO::PARAM_STR);
            $s->bindValue(':id_distributore', $id_distributore, PDO::PARAM_INT);

            $s->execute();
            $row = $s->fetch();

            if($row[0] > 0)
            {
                echo "Questa casa editrice è già stata inserita.";
            }
            else
            {
                $sql = 'INSERT INTO casa_editrice (nome, sito_web_casa_editrice, id_distributore)
                                          VALUES (:nome, :sito_web_casa_editrice, :id_distributore)';
                $s = $pdo->prepare($sql);
                $s->bindValue(':nome', $nome, PDO::PARAM_STR);
                $s->bindValue(':sito_web_casa_editrice', $sito_web_casa_editrice, PDO::PARAM_STR);
                $s->bindValue(':id_distributore', $id_distributore, PDO::PARAM_INT);

                $s->execute();

                echo 'Inserimento avvenuto con successo.';
            }

            $pdo->commit();
        }
        catch (PDOException $e)
        {
            $pdo->rollBack();
            $error = 'Si è verificato un errore nell\'inserimento della casa editrice.';
            echo $error;
        }
    }
    else
    {
        echo "<script language=\'JavaScript\'>alert(\"Non sei autorizzato ad accedere a questa pagina.\")</script>";
    }
}
?>