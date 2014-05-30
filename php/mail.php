<?php
    require "PHPMailer-master/class.phpmailer.php";
    include_once 'configuration.php';

    /*Istanzio la classe PHPMailer*/
    $messaggio_invio = new PHPMailer();

    /*Definisco le intestazioni e il corpo del messaggio*/
    $nome = htmlspecialchars(trim ($_POST['name']));
    $email = htmlspecialchars(trim ($_POST['email']));
    $messaggio = htmlspecialchars(trim ($_POST['message']));
    $messaggio_invio->From = $email;

    $messaggio_invio->AddAddress($email_sito);
    $messaggio_invio->AddReplyTo($email);
    $messaggio_invio->Subject = $oggetto_stampe . ' ' . $nome;
    $messaggio_invio->Body=stripslashes($messaggio);

    //definiamo i comportamenti in caso di invio corretto
    //o di errore
    if(!$messaggio_invio->Send()){
      $stringa = $messaggio_invio->ErrorInfo;
    }else{
        //echo 'Email inviata correttamente!';
        header('Location: ../index.html#domande_commenti');
        $stringa= "Email inviata correttamente!";
        echo "<script language=\"JavaScript\">\n";
        echo "alert(\"$stringa\");\n";
        echo "</script>";
        //exit();
    }

    //chiudiamo la connessione
    unset($messaggio_invio);


?>


