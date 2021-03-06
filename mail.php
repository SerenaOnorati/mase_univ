<?php
    require "PHPMailer-master/class.phpmailer.php";
    include_once 'configuration.php';

    /*Istanzio la classe PHPMailer*/
    $messaggio_invio = new PHPMailer();

    /*Definisco le intestazioni e il corpo del messaggio*/
    $nome = htmlspecialchars(trim ($_POST['nome']));
    $email = htmlspecialchars(trim ($_POST['email']));
    $messaggio = htmlspecialchars(trim ($_POST['messaggio']));

    /*Preparo il messaggio da inviare*/
    $messaggio_invio->From = $email;
    $messaggio_invio->AddAddress($email_sito);
    $messaggio_invio->AddReplyTo($email);

    if(!empty($_POST['url'])){
        $allegato = $_POST['url'];
        $messaggio_invio->addAttachment($allegato);
        $messaggio_invio->Subject = $oggetto_stampe . ' ' . $nome;
    }
    else{
        $messaggio_invio->Subject = $oggetto_info . ' ' . $nome;
    }

    $messaggio_invio->Body=stripslashes($messaggio);

    //definiamo i comportamenti in caso di invio corretto
    //o di errore

    if(!$messaggio_invio->Send()){
        $risultato = $messaggio_invio->ErrorInfo;
    }else{
        //echo 'Email inviata correttamente!';
        $risultato = "Email inviata correttamente!";
        //exit();
    }

    echo $risultato;
    //chiudiamo la connessione
    unset($messaggio_invio);
?>



