<?php
    require "PHPMailer-master/class.phpmailer.php";
    include_once 'configuration.php'

    /*Istanzio la classe PHPMailer*/
    $messaggio = new PHPMailer();

    /*Definisco le intestazioni e il corpo del messaggio*/
    $nome = htmlspecialchars(trim ($_POST['nome']));
    $email = htmlspecialchars(trim ($_POST['email']));
    $messaggio = htmlspecialchars(trim ($_POST['messaggio']));
    $messaggio->From = $email;

    $messaggio->AddAddress($email_sito);
    $messaggio->AddReplyTo($email);
    $messaggio->Subject = $oggetto_stampe + " "+ $nome;
    $messaggio->Body=stripslashes($messaggio);

    //definiamo i comportamenti in caso di invio corretto
    //o di errore
    if(!$messaggio->Send()){
      echo $messaggio->ErrorInfo;
    }else{
      echo 'Email inviata correttamente!';
    }

    //chiudiamo la connessione
    unset($messaggio);


?>


