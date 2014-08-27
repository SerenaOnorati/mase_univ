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

        try
        {
            $titolo = "%".trim($_POST['titolo'])."%";
            $autore = "%".trim($_POST['autore'])."%";
            $casaeditrice = "%".trim($_POST['casaeditrice'])."%";
            $locazione = "%".trim($_POST['locazione'])."%";
            $isbn = "%".trim($_POST['isbn'])."%";
            $anno_acquisto = "%".trim($_POST['anno_acquisto'])."%";

            $sql = 'SELECT * FROM libro INNER JOIN casa_editrice on libro.id_casa_editrice = casa_editrice.id_casa_editrice
            WHERE titolo LIKE :titolo AND autore LIKE :autore AND locazione LIKE :locazione AND
              nome LIKE :casaeditrice AND isbn LIKE :isbn AND anno_acquisto LIKE :data';
            $s = $pdo->prepare($sql);
            $s->bindValue(':titolo', $titolo, PDO::PARAM_STR);
            $s->bindValue(':autore', $autore, PDO::PARAM_STR);
            $s->bindValue(':locazione', $locazione, PDO::PARAM_STR);
            $s->bindValue(':nome', $casaeditrice, PDO::PARAM_STR);

            $s->execute();
        }
        catch (PDOException $e)
        {
            $error = 'Errore nella ricerca.';
            echo "<script language=\"JavaScript\">\n";
            echo "alert(\"$error\");\n";
            echo "</script>";
            exit();
        }

        $risultati = $s->fetchAll();
        if(isset($risultati))
        {
            $GLOBALS['risultati'] = $risultati;
        }
        else{
            $error = 'La ricerca non ha prodotto risultati';
            echo "<script language=\"JavaScript\">\n";
            echo "alert(\"$error\");\n";
            echo "</script>";
        }
        include 'daordinare.html.php';
    }
?>
