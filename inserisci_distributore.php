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
        $indirizzo = $_POST['indirizzo'];
        $citta = $_POST['citta'];
        $telefono =$_POST['telefono'];
        $fax = $_POST['fax'];
        $email = $_POST['email'];
        $cap = $_POST['cap'];
        $sito_web = $_POST['sito'];
        $codice_libreria = $_POST['codicelib'];
        $preferenza = $_POST['preferenza'];

        try
        {
            $pdo->beginTransaction();

            $sql = 'SELECT COUNT(*) FROM distributore WHERE nome_distributore LIKE :nome AND indirizzo LIKE :indirizzo AND citta LIKE :citta AND telefono LIKE :telefono AND email LIKE :email AND cap LIKE :cap AND sito_web LIKE :sito_web';
            $s = $pdo->prepare($sql);

            $s->bindValue(':nome', $nome, PDO::PARAM_STR);
            $s->bindValue(':indirizzo', $indirizzo, PDO::PARAM_STR);
            $s->bindValue(':citta', $citta, PDO::PARAM_STR);
            $s->bindValue(':telefono',$telefono, PDO::PARAM_STR);
            $s->bindValue(':email', $email, PDO::PARAM_STR);
            $s->bindValue(':cap', $cap, PDO::PARAM_STR);
            $s->bindValue(':sito_web', $sito_web, PDO::PARAM_STR);

            $s->execute();
            $row = $s->fetch();

            if($row[0] > 0)
            {
                echo "Questo distributore è già stato inserito.";
            }
            else
            {
                $sql = 'INSERT INTO distributore (nome_distributore, indirizzo, citta, telefono, fax, email, cap, sito_web, codice_libreria, preferenza_ordine)
                                          VALUES (:nome, :indirizzo, :citta, :telefono, :fax, :email, :cap, :sito_web, :codice_libreria, :preferenza)';
                $s = $pdo->prepare($sql);
                $s->bindValue(':nome', $nome, PDO::PARAM_STR);
                $s->bindValue(':indirizzo', $indirizzo, PDO::PARAM_STR);
                $s->bindValue(':citta', $citta, PDO::PARAM_STR);
                $s->bindValue(':telefono',$telefono, PDO::PARAM_STR);
                $s->bindValue(':fax',$fax, PDO::PARAM_STR);
                $s->bindValue(':email', $email, PDO::PARAM_STR);
                $s->bindValue(':cap', $cap, PDO::PARAM_STR);
                $s->bindValue(':sito_web', $sito_web, PDO::PARAM_STR);
                $s->bindValue(':codice_libreria', $codice_libreria, PDO::PARAM_STR);
                $s->bindValue(':preferenza', $preferenza, PDO::PARAM_STR);

                $s->execute();

                echo 'Inserimento avvenuto con successo.';
            }

            $pdo->commit();
        }
        catch (PDOException $e)
        {
            $pdo->rollBack();
            $error = 'Si è verificato un errore nell\'inserimento del distributore.';
            echo $error;
        }
    }
    else
    {
        echo "<script language=\'JavaScript\'>alert(\"Non sei autorizzato ad accedere a questa pagina.\")</script>";
    }
}
?>