$(document).ready(function() {

    $("#modificasalva").click(
        /*
        Funzione che permette di modificare il testo del bottone,
        attivare/disabilitare l'input text e inviare da javascript a php mediante ajax i campi modificati
        dall'utente.
         */
        function ModificaSalva()
        {
            //Se "Modifica", allora "Salva" e disabilito l'input text
            if(document.getElementById("modificasalva").innerHTML == "Modifica")
            {
                document.getElementById("modificato").innerHTML = " ";
                document.getElementById("modificasalva").innerHTML = "Salva";
                document.getElementById("modificasalva").className = "button button-icon fa fa-save";
                document.getElementById("name").disabled = false;
                document.getElementById("surname").disabled = false;
                document.getElementById("email").disabled = false;
                document.getElementById("tel").disabled = false;

            }
            //altrimenti, prelevo i campi modificati e li invio con AJAX
            else
            {
                    var name = $("#name").val();
                    var surname = $("#surname").val();
                    var email = $("#email").val();
                    var tel = $("#tel").val();
                    $.ajax({
                        type: 'POST',
                        url: 'dati_utente_modifica.php',
                        data: "name="+name+"&surname="+surname+"&email="+email+"&tel="+tel,
                        dataType: "html",

                        success: function(response)
                        {
                            document.getElementById("modificato").innerHTML = response;
                            document.getElementById("modificasalva").innerHTML = "Modifica";
                            document.getElementById("modificasalva").className = "button button-icon fa fa-edit";
                            document.getElementById("name").disabled = true;
                            document.getElementById("surname").disabled = true;
                            document.getElementById("email").disabled = true;
                            document.getElementById("tel").disabled = true;
                        },
                        error: function()
                        {
                            alert("Modifica fallita");
                        }
                    });
            }
        }
    )
});