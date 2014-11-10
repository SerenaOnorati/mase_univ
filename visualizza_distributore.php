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
            if(isset($_POST['distributore'])){
                $nome_distributore = "%".trim($_POST['distributore'])."%";
            }
            else
            {
                $nome_distributore = "%%";

            }
            try
            {
                $sql = 'SELECT * FROM distributore WHERE nome_distributore LIKE :nome_distributore';
                $s = $pdo->prepare($sql);
                $s->bindValue(':nome_distributore', $nome_distributore, PDO::PARAM_STR);
                $s->execute();

            }
            catch (PDOException $e)
            {
                $error = 'Errore nella ricerca distributore.';
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

            include 'visualizza_distributore.html.php';
        }
    }
?>
