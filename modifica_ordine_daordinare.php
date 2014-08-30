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
        //prelevo i parametri dalla chiamata AJAX
        $id_ordine = trim($_POST['id_ordine']);
        $isbn = trim($_POST['isbn']);
        $quantita_ordine = trim($_POST['quantita_ordine']);

        //modifica della quantità dell'ordine
        try
        {
            $sql = 'UPDATE ordine_libro SET quantita_ordine = :quantita_ordine
                    WHERE isbn = :isbn AND id_ordine = :id_ordine';

            $s = $pdo->prepare($sql);
            $s->bindValue(':isbn', $isbn, PDO::PARAM_INT);
            $s->bindValue(':quantita_ordine', $quantita_ordine, PDO::PARAM_INT);
            $s->bindValue(':id_ordine', $id_ordine, PDO::PARAM_INT);
            $s->execute();
            echo "Modifica dell'ordine avvenuta con successo.";

        }
        catch (PDOException $e)
        {
            $error = 'Errore modifica ordine.';
            echo $e->getMessage();
        }
    }
    else
    {
        echo "<script language=\'JavaScript\'>alert(\"Non sei autorizzato ad accedere a questa pagina.\")</script>";
    }

}
?>