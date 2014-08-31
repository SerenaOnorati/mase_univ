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
        $titolo = $_POST['titolo'];
        $testo = $_POST['testo'];
        $immagine = $_POST['immagine'];
        $data = $_POST['data'];

        //inserimento della nuova news nel db
        try
        {
            $sql = 'UPDATE news SET titolo =:titolo, testo =:testo, immagine =:immagine, data_news =:data_news';
            $s = $pdo->prepare($sql);
            $s->bindValue(':titolo', $titolo, PDO::PARAM_STR);
            $s->bindValue(':testo', $testo, PDO::PARAM_STR);
            $s->bindValue(':immagine',$immagine, PDO::PARAM_STR);
            $s->bindValue(':data_news', $data);
            $s->execute();
            echo 'Modifiche avvenute con successo.';

        }
        catch (PDOException $e)
        {
            $error = 'Errore nella modifica della news.';
            echo $error;
        }
    }
    else
    {
        echo "<script language=\'JavaScript\'>alert(\"Non sei autorizzato ad accedere a questa pagina.\")</script>";
    }

}
?>