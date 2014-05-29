<?php
//la stringa mysql_connect deve essere compilata con i dati relativi al proprio database
// HOST = IP server Mysql
// USER = Nome utente databse
// PASSWORD = Password utente databse
mysql_connect("HOST","USER","PASSWORD");//database connection
// Qui sotto al posto di NOME_DATABSE, inserite il nome del vostro DB
mysql_select_db("NOME_DATABASE");

//inserting data order
$toinsert = "INSERT INTO tabella_esempio
			(nome, indirizzo)
			VALUES
			('$name',
			'$address')";

//declare in the order variable
$result = mysql_query($toinsert);	//order executes
if($result){
	echo("<br>Inserimento avvenuto correttamente");
} else{
	echo("<br>Inserimento non eseguito");
}
?>