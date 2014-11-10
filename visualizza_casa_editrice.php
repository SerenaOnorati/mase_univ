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
            //recupera i dati della casa editrice
            if(isset($_POST['casaeditrice'])){
                $casa_editrice = "%".trim($_POST['casaeditrice'])."%";
            }
            else
            {
                $casa_editrice = "%%";

            }

            try
            {
                $sql = 'SELECT * FROM casa_editrice
                          INNER JOIN  distributore on casa_editrice.id_distributore = distributore.id_distributore
                          WHERE nome LIKE :casa_editrice';
                $s = $pdo->prepare($sql);
                $s->bindValue(':casa_editrice', $casa_editrice, PDO::PARAM_STR);
                $s->execute();

            }
            catch (PDOException $e)
            {
                $error = 'Errore nella ricerca casa editrice.';
                echo "<script language=\"JavaScript\">\n";
                echo "alert(\"$error\");\n";
                echo "</script>";
                exit();
            }
            //dopo la query inserisco in un'array global il risultato
            $risultati = $s->fetchAll();
            if(isset($risultati)){
                $GLOBALS['risultati'] = $risultati;
            }
            else{
                $error = 'Non sono stati inseriti distributori nel db';
                echo "<script language=\"JavaScript\">\n";
                echo "alert(\"$error\");\n";
                echo "</script>";
            }

            include 'visualizza_casa_editrice.html.php';
        }
    }
?>
