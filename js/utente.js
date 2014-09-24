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
        document.getElementById("password_old").disabled = false;
        document.getElementById("password_new").disabled = false;
        document.getElementById("password_new1").disabled = false;

    }
    //altrimenti, prelevo i campi modificati e li invio con AJAX
    else
    {
        var name = $("#name").val();
        var surname = $("#surname").val();
        var email = $("#email").val();
        var tel = $("#tel").val();
        var psw_old = $("#password_old").val();
        var psw_new = $("#password_new").val();
        var psw_new1 = $("#password_new1").val();


        if(document.getElementById("cambia_psw").className == "fa fa-toggle-right" && psw_old.length != 0 && psw_new.length != 0 && psw_new1.length != 0)
        {
            var check = confirm("Attenzione i campi riguardanti il cambiamento della password sono compilati, mantenerli?");
            if(check == false)
            {
                document.getElementById("password_old").value = "";
                document.getElementById("password_new").value = "";
                document.getElementById("password_new1").value = "";
                psw_old = "";
                psw_new = "";
                psw_new1 = "";
            }
        }

        if(psw_old.length != 0 && psw_new.length != 0 && psw_new1.length != 0)
        {

            if(psw_new == psw_new1)
            {
                $.ajax({
                    type: 'POST',
                    url: 'dati_utente_modifica.php',
                    data: "name="+name+"&surname="+surname+"&email="+email+"&tel="+tel+"&password="+psw_new+"&password_old="+psw_old,
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
                        document.getElementById("password_old").disabled = true;
                        document.getElementById("password_new").disabled = true;
                        document.getElementById("password_new1").disabled = true;
                    },
                    error: function()
                    {
                        alert("La modifica dei dati non è andata a buon fine.");
                    }
                });
            }
            else
            {
                alert("Le password non coincidono, si prega di reinserirle.")
            }

        }
        else
        {
            if(psw_old.length == 0 && psw_new.length == 0 && psw_new1.length ==0)
            {
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
                        document.getElementById("password_old").disabled = true;
                        document.getElementById("password_new").disabled = true;
                        document.getElementById("password_new1").disabled = true;
                    },
                    error: function()
                    {
                        alert("La modifica dei dati non è andata a buon fine.");
                    }
                });
            }
            else
            {
                alert('Se si vuole modificare la password occorre compilare tutti i campi.');
            }
        }
    }
}

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
    var file = document.getElementById('nomeimmagine').val;
    if(file == undefined)
    {
        file = "";
    }
    var data = $("#data_nuovo").val();
    if(titolo.length != 0 && testo.length != 0 && data.length != 0)
    {
        $.ajax({
            type: 'POST',
            url: 'inserimento_news_aggiungi.php',
            data: "titolo="+titolo+"&testo="+testo+"&file="+file+"&data="+data,
            dataType: "html",

            success: function(response)
            {
                document.getElementById('nomeimmagine').val = "";
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
                document.getElementById("row"+id).style.display = 'none';
                alert(response);
            },
            error: function()
            {
                alert("La cancellazione non è andata a buon fine.");
            }
        });
    }
}

function modificaNews(id)
{
    if(document.getElementById('modificanews'+id).innerText == 'Modifica')
    {
        document.getElementById('modificanews'+id).innerHTML = "Salva";
        document.getElementById('modificanews'+id).className = "fa fa-save";
        document.getElementById("titolo"+id).disabled = false;
        document.getElementById("testo"+id).disabled = false;
        document.getElementById("data"+id).style.display = 'none';
        document.getElementById("data_mod"+id).style.display = 'block';
        document.getElementById("div_immagine"+id).style.display = 'block';

    }
    else
    {
        var titolo_old = $("#titolo_old"+id).val();
        var testo_old = $("#testo_old"+id).val();
        var data_old = $("#data"+id).val();
        var immagine_old = $("#immagine_old"+id).val();

        var titolo = $("#titolo"+id).val();
        var testo = $("#testo"+id).val();
        var data = $("#data_mod"+id).val();
        var path = $("#url"+id).val();
        var immagine = "\\"+path.replace(/^.*\\/, "");

        var valuta_data = data == "" | data == data_old;

        if(immagine == '\\')
        {
            var check;
            check   = confirm("Non è stata inserita nessuna immagine, mantenere la precedente?");
            if(check == true)
                immagine = immagine_old;
        }

        if(titolo == titolo_old && testo == testo_old && valuta_data && immagine == immagine_old)
        {
            alert("Non ci sono modifiche da salvare.");
            document.getElementById('modificanews'+id).innerHTML = "Modifica";
            document.getElementById('modificanews'+id).className = "fa fa-edit";
            document.getElementById("titolo"+id).disabled = true;
            document.getElementById("testo"+id).disabled = true;
            document.getElementById("data"+id).style.display = 'block';
            document.getElementById("data_mod"+id).style.display = 'none';
            document.getElementById("div_immagine"+id).style.display = 'none';
        }
        else
        {
            check = confirm("Sei sicuro di voler salvare le modifiche della news?");
            if(check == true)
            {
                if(data.length == 0)
                    data = data_old;
                $.ajax({
                    type: 'POST',
                    url: 'news_modifica.php',
                    data: "id_news="+id+"&titolo="+titolo+"&testo="+testo+"&data="+data+"&immagine="+immagine,
                    dataType: "html",

                    success: function(response)
                    {
                        document.getElementById('modificanews'+id).innerHTML = "Modifica";
                        document.getElementById('modificanews'+id).className = "fa fa-edit";
                        document.getElementById("titolo"+id).disabled = true;
                        document.getElementById("testo"+id).disabled = true;
                        document.getElementById("data"+id).style.display = 'block';
                        document.getElementById("data_mod"+id).style.display = 'none';

                        window.location.reload();
                        alert(response);
                    },
                    error: function()
                    {
                        alert("La modifica dei dati dell\'utente non è andata a buon fine.");
                    }
                });
            }
            else
            {
                document.getElementById('modificanews'+id).innerHTML = "Modifica";
                document.getElementById('modificanews'+id).className = "fa fa-edit";
                document.getElementById("titolo"+id).disabled = true;
                document.getElementById("testo"+id).disabled = true;
                document.getElementById("data"+id).style.display = 'block';
                document.getElementById("data_mod"+id).style.display = 'none';
            }
        }
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
                document.getElementById("row"+id).style.display = 'none';
                alert(response);

            },
            error: function()
            {
                alert("La cancellazione non è andata a buon fine.");
            }
        });
    }
}

function modificaUtente(id, nomeSelect)
{

    if(document.getElementById('modificautente'+id).innerText == 'Modifica')
    {
        document.getElementById('modificautente'+id).innerHTML = "Salva";
        document.getElementById('modificautente'+id).className = "fa fa-save";
        document.getElementById("name"+id).disabled = false;
        document.getElementById("surname"+id).disabled = false;
        document.getElementById("email"+id).disabled = false;
        document.getElementById("tel"+id).disabled = false;
        document.getElementById("ruolo_mod"+id).style.display = 'block';
    }
    else
    {
        var name_old = $("#name_old"+id).val();
        var surname_old = $("#surname_old"+id).val();
        var email_old = $("#email_old"+id).val();
        var tel_old = $("#tel_old"+id).val();
        var id_ruolo_old = $("#id_ruolo"+id).val();

        var name = $("#name"+id).val();
        var surname = $("#surname"+id).val();
        var email = $("#email"+id).val();
        var tel = $("#tel"+id).val();
        var id_ruolo_name = nomeSelect.options[nomeSelect.selectedIndex].innerHTML;

        if(name == name_old && surname == surname_old && email == email_old && tel == tel_old && id_ruolo_name == id_ruolo_old)
        {
            alert("Non ci sono modifiche da fare.");
        }
        else
        {
            var check = confirm("Sei sicuro di voler salvare l\'utente?");
            if(check == true)
            {
                var id_ruolo = nomeSelect.options[nomeSelect.selectedIndex].value;
                $.ajax({
                    type: 'POST',
                    url: 'utenti_registrati_modifica.php',
                    data: "id_user="+id+"&name="+name+"&surname="+surname+"&email="+email+"&tel="+tel+"&id_ruolo="+id_ruolo,
                    dataType: "html",

                    success: function(response)
                    {
                        document.getElementById('modificautente'+id).innerHTML = "Modifica";
                        document.getElementById('modificautente'+id).className = "fa fa-edit";
                        document.getElementById("name"+id).disabled = true;
                        document.getElementById("surname"+id).disabled = true;
                        document.getElementById("email"+id).disabled = true;
                        document.getElementById("tel"+id).disabled = true;
                        document.getElementById("ruolo_mod"+id).style.display = 'none';
                        alert(response);
                        window.location.reload();
                    },
                    error: function()
                    {
                        alert("La modifica dei dati dell\'utente non è andata a buon fine.");
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
                document.getElementById("ruolo_mod"+id).style.display = 'none';
            }
        }
    }
}

function cambiaPassword()
{
    var old_psw = document.getElementById('row_password_old');
    var new_psw = document.getElementById('row_password_new');
    var new1_psw = document.getElementById('row_password_new1');

    if(old_psw.style.display == "block" && new_psw.style.display == "block" && new1_psw.style.display == "block")
    {
        document.getElementById("cambia_psw").className = "fa fa-toggle-right";
        old_psw.style.display = 'none';
        new_psw.style.display = 'none';
        new1_psw.style.display = 'none';
    }
    else
    {
        document.getElementById("cambia_psw").className = "fa fa-toggle-down";
        old_psw.style.display = 'block';
        new_psw.style.display = 'block';
        new1_psw.style.display = 'block';
    }
}

