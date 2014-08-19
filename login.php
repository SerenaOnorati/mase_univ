<?php
    session_start(); //inizio la sessione
    //includo i file necessari a collegarmi al db con relativo script di accesso
    include("configuration.php");

    //mi collego
    //mysql_select_db("$db_name",$connessione);
    // collegamento al database con PDO
    $col = 'mysql:host='.$host.';dbname='.$db_name;
    // blocco try per il lancio dell'istruzione
    try {
        // connessione tramite creazione di un oggetto PDO
        $db = new PDO($col , $db_user, $db_psw);
        // lancio di una transazione con PDO
        $db->beginTransaction();
    }
    // blocco catch per la gestione delle eccezioni
    catch(PDOException $e) {
        // notifica in caso di errorre
        echo "<script language=\"JavaScript\">\n";
        echo "alert(\"'Attenzione: '.$e->getMessage()\");\n";
        echo "</script>";
    }

    //variabili POST con anti sql Injection
    $username = $_POST['username']; //faccio l'escape dei caratteri dannosi
    $password = md5($_POST['password']); //sha1 cifra la password anche qui in questo modo corrisponde con quella del db
/*
    $q_login = "SELECT email, password, id_ruolo FROM user WHERE email = '$email' AND password = '$password'";
    $ris = mysql_query($q_login, $connessione) or die (mysql_error());
    $riga=mysql_fetch_array($ris);
*/

    //preparazione e query
    $q = $db->prepare($q_login);
    $q->execute(array($username, $password));
    $riga = $q->fetchAll();

    /*Prelevo l'identificativo dell'utente */
    $cod=$riga['email'];

    /* Effettuo il controllo */
    if ($cod == NULL) $trovato = 0 ;
    else $trovato = 1;

    echo "<script language=\"JavaScript\">\n";
    echo "console.log('trovato val : '$trovato)";
    echo "</script>";

    /* Username e password corrette */
    if($trovato === 1) {

        /*Registro la sessione*/


        $_SESSION["autorizzato"] = 1;

        /*Registro il codice dell'utente*/
        $_SESSION['cod'] = $cod;

        /*Redirect alla pagina riservata*/
        $id_ruolo = $riga['id_ruolo'];
        $q_ruolo = "SELECT descrizione FROM ruolo WHERE id_ruolo = '$id_ruolo'";
        $ris = mysql_query($q_ruolo, $connessione) or die (mysql_error());
        $riga=mysql_fetch_array($ris);

        /*Prelevo la descrizione del ruolo (es. Amministratore) */
        $cod=$riga['descrizione'];

        /* Effettuo il controllo */
        if ($cod == NULL) $trovato = 0 ;
        else $trovato = 1;
        /*se il ruolo è presente*/
        if($trovato == 1)
        {
            if($cod == 'Amministratore')
            {
                echo "<script language=\"JavaScript\">\n";
                echo "alert(\"$adminphp\");\n";
                echo "console.log('trovato val : '$trovato)";
                echo "</script>";
                echo '<script language=javascript>document.location.href="admin.php"</script>';
            }
            else
            {
                /* altri ruoli */
            }

        }
        else
        {
            /*Ruolo non trovato, redirect alla pagina di login*/
            echo "<script language=\"JavaScript\">\n";
            echo "alert(\"$indexphp\");\n";
            echo "console.log('trovato val : '$trovato)";
            echo "</script>";
            echo '<script language=javascript>document.location.href="index.php"</script>';

        }
    }
    else {
        echo "<script language=\"JavaScript\">\n";
        echo "alert(\"$indexphp\");\n";
        echo "console.log('trovato val : '$trovato)";
        echo "</script>";
        /*Username e password errati, redirect alla pagina di login*/
        echo '<script language=javascript>document.location.href="index.php"</script>';
    }

?>