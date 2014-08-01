<?php
    session_start(); //inizio la sessione
    //includo i file necessari a collegarmi al db con relativo script di accesso
    include("configuration.php");

    //mi collego
    mysql_select_db("$db_name",$connessione);

    //variabili POST con anti sql Injection
    $username = mysql_real_escape_string($_POST['username']); //faccio l'escape dei caratteri dannosi
    $password = mysql_real_escape_string(md5($_POST['password'])); //sha1 cifra la password anche qui in questo modo corrisponde con quella del db

    $q_login = "SELECT email, password, id_ruolo FROM user WHERE email = '$email' AND password = '$password'";
    $ris = mysql_query($q_login, $connessione) or die (mysql_error());
    $riga=mysql_fetch_array($ris);

    /*Prelevo l'identificativo dell'utente */
    $cod=$riga['email'];

    /* Effettuo il controllo */
    if ($cod == NULL) $trovato = 0 ;
    else $trovato = 1;

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
                echo '<script language=javascript>document.location.href="admin.php"</script>';
            else
            {
                /* altri ruoli */
            }

        }
        else
        {
            /*Ruolo non trovato, redirect alla pagina di login*/
            echo '<script language=javascript>document.location.href="index.php"</script>';
        }
    }
    else {
        /*Username e password errati, redirect alla pagina di login*/
        echo '<script language=javascript>document.location.href="index.php"</script>';
    }

?>