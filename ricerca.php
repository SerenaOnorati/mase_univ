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
            if(isset($_POST['institolo'])){
                $titolo = "%".trim($_POST['institolo'])."%";

            }
            else
            {
                $titolo = "%%";

            }
            echo "Titolo: ".$_POST['institolo'];
            if(isset($_POST['insautore']))
            {
                $autore = "%".$_POST['insautore']."%";
            }
            else
            {
                $autore = "%%";

            }
            echo "<br>Autore: ".$autore;
            if(isset($_POST['inscasaeditrice']))
            {
                $casaeditrice = "%".trim($_POST['inscasaeditrice'])."%";

            }
            else
            {
                $casaeditrice = "%%";
            }
            echo "<br>CasaEditrice: ".$casaeditrice;

            if(isset($_POST['inslocazione']))
            {
                $locazione = "%".trim($_POST['inslocazione'])."%";
            }
            else
            {
                $locazione = "%%";

            }
            echo "<br>Locazione: ".$locazione;

            if(isset($_POST['insisbn']))
            {
                $isbn = "%".trim($_POST['insisbn'])."%";
            }
            else
            {
                $isbn = "%%";

            }
            echo "<br>ISBN: ".$isbn;

            if(isset($_POST['insannoacquisto']))
            {
                $anno_acquisto = "%".trim($_POST['insannoacquisto'])."%";            }
            else
            {
                $anno_acquisto = "%%";

            }
            echo "<br>annoacquisto: ".$anno_acquisto;

            $sql = 'SELECT * FROM libro INNER JOIN casa_editrice on libro.id_casa_editrice = casa_editrice.id_casa_editrice
                    WHERE titolo LIKE :titolo AND autore LIKE :autore AND locazione LIKE :locazione
                    AND nome LIKE :casaeditrice AND isbn LIKE :isbn AND anno_acquisto LIKE :anno_acquisto';
            $s = $pdo->prepare($sql);
            $s->bindValue(':titolo', $titolo, PDO::PARAM_STR);
            $s->bindValue(':autore', $autore, PDO::PARAM_STR);
            $s->bindValue(':locazione', $locazione, PDO::PARAM_STR);
            $s->bindValue(':nome', $casaeditrice, PDO::PARAM_STR);
            $s->bindValue(':anno_acquisto', $anno_acquisto, PDO::PARAM_INT);

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
        //include 'daordinare.html.php';
        echo "<script language=\"JavaScript\">\n";
        echo "alert(\"Ricerca andata a buon fine\");\n";
        echo "</script>";

        //header("Location: ricerca.php");
    }
?>
