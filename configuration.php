<?php

    $email_sito = "marzia.magheri@gmail.com";
    $oggetto_info = "Richiesta informazioni/commenti dal sito di Universitalia";
    $oggetto_stampe = "Invio file dal sito Universitalia per stampa";

    $tipo_doc = array('Progetti CAD Vettoriali', 'Progetti CAD Raster', 'Manifesto', 'Poster', 'Stampa digitale');
    $formato_CAD = array('AO 84,1 x 118', 'A1 59,9 x 84,1', 'A2 42 x 59,4', 'A3 42 x 29,7', 'A4 21 x 29,7');
    $formato_mapo = array('35 x 50','35 x 70','50 x 70','70 x 100','AO 84,1 x 118', 'A1 59,9 x 84,1', 'A2 42 x 59,4');
    $formato_std =array('B/N A4','B/N A3','Colori A4','Colori A3');

    //classe connessione db
    class MysqlClass
    {
        // parametri per la connessione al database
        private $nomehost = "sql41.securesites.it";
        private $nomeuser = "a_2632";
        private $password = "Etei2wex";

        // controllo sulle connessioni attive
        private $attiva = false;

        // funzione per la connessione a MySQL
        public function connetti()
        {
            if(!$this->attiva)
            {
                $connessione = mysql_connect($this->nomehost,$this->nomeuser,$this->password);
            }else{
                return true;
            }
        }
    }
?>
