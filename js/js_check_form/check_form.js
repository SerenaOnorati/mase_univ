$(document).ready(function() {

    //al click sul bottone del form
    $("#bottone").click(function(){

        var timer = 2000;

        //associo variabili generali
        var nome = $("#nome").val();
        var cognome = $("#cognome").val();
        var email = $("#email").val();
        var oggetto = $("#oggetto").val();
        var messaggio = $("#messaggio").val();

        //inizio controllo campi obbligatori
        if  (nome == "" || email == "" || oggetto == "")  {

            $("<div id='errori'></div>").appendTo("#contact").html("<img src='alert-icon.png' width='20' height='20' style='float:left;' /><span>Compila tutti i campi!</span>").delay(2000).fadeOut(timer);

        } //se ci sono campi vuoti

        else { //se sono stati compilati tutti i campi

            //chiamata ajax
            $.ajax({

                type: "POST",

                url: "engine.php",

                //il form invia i dati all'engine
                data: "nome=" + nome + "&cognome=" + cognome + "&email=" + email + "&oggetto=" + oggetto  + "&messaggio=" + messaggio,
                dataType: "html",

                success: function(msg)
                {
                    $("<div id='risultato'></div>").appendTo("#contact").html("< style='float:left;'/><span>Email inviata con successo</span>").delay(2000).fadeOut(timer);
                },

                error: function()
                {
                    alert("Si e' verificato un errore imprevisto...");
                }
            });

        }//else

    });

});