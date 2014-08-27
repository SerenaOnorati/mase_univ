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

/*funzione per visualizzare le immagini*/
function toggleOverlay(id)
{
    var overlay = document.getElementById('overlay'+id);
    var specialBox = document.getElementById('specialBox'+id);
    overlay.style.opacity = .8;
    if(overlay.style.display == "block"){
        overlay.style.display = "none";
        specialBox.style.display = "none";
    } else {
        overlay.style.display = "block";
        specialBox.style.display = "block";
    }
}

function aggiungiRigaNews()
{
    var aggiungi = document.getElementById('aggiungi');
    if(aggiungi.style.display == "block")
    {
        aggiungi.style.display = 'none';
    }
    else
    {
        aggiungi.style.display = 'block';
    }
}

//funzione che permette di aggiungere le nuove news nel db tramite chiamata AJAX
function aggiungiNews()
{

    var titolo = $("#titolo_nuovo").val();
    var testo = $("#testo_nuovo").val();
    var path = $("#url").val();
    var file = path.replace(/^.*\\/, "");
    var data = $("#data_nuovo").val();
    //alert(file);
    if(titolo.length != 0 && testo.length != 0 && data.length != 0)
    {
        $.ajax({
            type: 'POST',
            url: 'inserimento_news_aggiungi.php',
            data: "titolo="+titolo+"&testo="+testo+"&file="+file+"&data="+data,
            dataType: "html",

            success: function(response)
            {
                //Upload

                window.location.reload();
                alert(response);

            },
            error: function()
            {
                alert("Inserimento fallito");
            }
        });
    }
    else
        //alert("lunghezza titolo"+titolo.length)
        alert("Compilare tutti i campi");
}

function cancellaNews(id)
{
    var check = confirm("Sei sicuro di voler cancellare la news?");
    if(check == true)
    {
        $.ajax({
            type: 'POST',
            url: 'inserimento_news_cancella.php',
            data: "id_news="+id,
            dataType: "html",

            success: function(response)
            {
                window.location.reload();
                alert(response);

            },
            error: function()
            {
                alert("Cancellazione fallita");
            }
        });
    }
}

function cancellaUtente(id)
{
    var check = confirm("Sei sicuro di voler cancellare l'utente?");
    if(check == true)
    {
        $.ajax({
            type: 'POST',
            url: 'utenti_registrati_cancella.php',
            data: "id_user="+id,
            dataType: "html",

            success: function(response)
            {
                window.location.reload();
                alert(response);

            },
            error: function()
            {
                alert("Cancellazione fallita");
            }
        });
    }
}

function modificaUtente(id)
{

    if(document.getElementById('modificautente'+id).innerText == 'Modifica')
    {
        document.getElementById('modificautente'+id).innerHTML = "Salva";
        document.getElementById('modificautente'+id).className = "fa fa-save";
        document.getElementById("name"+id).disabled = false;
        document.getElementById("surname"+id).disabled = false;
        document.getElementById("email"+id).disabled = false;
        document.getElementById("tel"+id).disabled = false;
    }
    else
    {
        var check = confirm("Sei sicuro di voler salvare l\'utente?");
        if(check == true)
        {
            var name = $("#name"+id).val();
            var surname = $("#surname"+id).val();
            var email = $("#email"+id).val();
            var tel = $("#tel"+id).val();
            $.ajax({
                type: 'POST',
                url: 'utenti_registrati_modifica.php',
                data: "id_user="+id+"&name="+name+"&surname="+surname+"&email="+email+"&tel="+tel,
                dataType: "html",

                success: function(response)
                {
                    document.getElementById('modificautente'+id).innerHTML = "Modifica";
                    document.getElementById('modificautente'+id).className = "fa fa-edit";
                    document.getElementById("name"+id).disabled = true;
                    document.getElementById("surname"+id).disabled = true;
                    document.getElementById("email"+id).disabled = true;
                    document.getElementById("tel"+id).disabled = true;
                    alert(response);

                },
                error: function()
                {
                    alert("Modifica fallita");
                }
            });
        }
        else
        {
            document.getElementById('modificautente'+id).innerHTML = "Modifica";
            document.getElementById('modificautente'+id).className = "fa fa-edit";
            document.getElementById("name"+id).disabled = true;
            document.getElementById("surname"+id).disabled = true;
            document.getElementById("email"+id).disabled = true;
            document.getElementById("tel"+id).disabled = true;
            window.location.reload();
        }

    }
}