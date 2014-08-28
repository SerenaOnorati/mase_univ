<?php

    // parametri per la connessione al database
    $host = "127.0.0.1";
    $db_name = "unipass_it";
    $db_user = "root";
    $db_psw = "";


     //parametri connessione al database
     /*$host = "sql41.securesites.it";
     $db_name = "unipass_it";
     $db_user = "a_2632";
     $db_psw = "aqT4wqbJ";*/

try
    {
        $pdo = new PDO('mysql:host='.$host.';dbname='.$db_name, $db_user, $db_psw);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec('SET NAMES "utf8"');
    }
    catch (PDOException $e)
    {
        $error = 'Unable to connect to the database server.';
        echo "<script language=\"JavaScript\">\n";
        echo "alert(\"$error\");\n";
        echo "</script>";
        exit();
    }
