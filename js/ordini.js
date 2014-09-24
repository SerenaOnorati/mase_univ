///funzione che permette di aggiungere un libro nel db tramite chiamata AJAX
function aggiungiLibro(nomeSelect)
{

    var autore = $("#insautore").val();
    var isbn = $("#insisbn").val();
    var titolo = $("#institolo").val();
    var copertina = document.getElementById('nomeimmagine').val;
    if(copertina == undefined)
    {
        copertina = "";
    }
    var locazione = $("#inslocazione").val();
    var prezzo = $("#insprezzo").val();
    var prezzoa = $("#insprezzoa").val();
    var quantita = $("#insquantita").val();
    var anno = $("#insannoacquisto").val();
    var id_casa_editrice = nomeSelect.options[nomeSelect.selectedIndex].value;

    if(autore.length != 0 && isbn.length != 0  && titolo.length != 0 && locazione.length != 0 && prezzo.length != 0 && prezzoa.length != 0 && quantita.length != 0 && anno.length != 0 && id_casa_editrice.length != 0)
    {
        $.ajax({
            type: 'POST',
            url: 'inserisci_libri.php',
            data: "autore="+autore+"&isbn="+isbn+"&titolo="+titolo+"&copertina="+copertina+"&locazione="+locazione+"&prezzo="+prezzo+"&prezzoa="+prezzoa+"&quantita="+quantita+"&anno="+anno+"&id_casa_editrice="+id_casa_editrice,
            dataType: "html",

            success: function(response)
            {
                window.location.reload();
                alert(response);

            },
            error: function()
            {
                alert("L'inserimento del libro non è andato a buon fine");
            }
        });
    }
    else
        alert("Per favore compilare tutti i campi.");
}


function modificaLibroDaordinare(isbn)
{
    var autore = document.getElementById('autore'+isbn).innerText;
    var titolo = document.getElementById('titolo'+isbn).innerText;
    var casa_editrice = document.getElementById('casaeditrice'+isbn).innerText;
    var prezzo = document.getElementById('prezzo'+isbn).innerText;
    var prezzo_acquisto = document.getElementById('prezzoacquisto'+isbn).innerText;
    var anno_acquisto = document.getElementById('data'+isbn).innerText;
    var copertina = document.getElementById('copertina'+isbn).value;
    var quantita = document.getElementById('qtamag'+isbn).innerText;
    var locazione = document.getElementById('locazione'+isbn).innerText;


    autore = autore.replace(/^.*:/, "");
    titolo = titolo.replace(/^.*:/, "");
    casa_editrice = casa_editrice.replace(/^.*:/, "");
    prezzo = prezzo.replace(/^.*:/, "");
    prezzo_acquisto = prezzo_acquisto.replace(/^.*:/, "");
    anno_acquisto = anno_acquisto.replace(/^.*:/, "");
    quantita = quantita.replace(/^.*:/, "");
    locazione = locazione.replace(/^.*:/, "");

    window.location.href = 'modifica_libro.html.php?isbn='+isbn+'&autore='+autore+'&titolo='+titolo+'&casa_editrice='+casa_editrice+'&prezzo='+prezzo+'&prezzo_acquisto='+prezzo_acquisto+'&anno_acquisto='+anno_acquisto+'&quantita='+quantita+'&locazione='+locazione+"&copertina="+copertina;
}

function modificaSalvaLibro(nomeSelect)
{

    var isbn = $("#isbn").val();
    var autore = $("#autore").val();
    var titolo = $("#titolo").val();
    var id_casa_editrice = nomeSelect.options[nomeSelect.selectedIndex].value;
    var prezzo = $("#prezzo").val();
    var prezzo_acquisto = $("#prezzo_acquisto").val();
    var anno_acquisto = $("#anno_acquisto").val();
    var path = $("#url").val();
    var copertina = "\\"+path.replace(/^.*\\/, "");
    var quantita = $("#quantita").val();
    var locazione = $("#locazione").val();

    var isbn_old = $("#isbn_old").val();
    var autore_old = $("#autore_old").val();
    var titolo_old = $("#titolo_old").val();
    var id_casa_editrice_old = $("#id_casa_editrice_old").val();
    var prezzo_old = $("#prezzo_old").val();
    var prezzo_acquisto_old = $("#prezzo_acquisto_old").val();
    var anno_acquisto_old = $("#anno_acquisto_old").val();
    var copertina_old = $("#copertina_old").val();
    var quantita_old = $("#quantita_old").val();
    var locazione_old = $("#locazione_old").val();


    if(autore.length != 0 && isbn.length != 0 && titolo.length != 0 && locazione.length != 0 && prezzo.length != 0 && prezzo_acquisto.length != 0 && quantita.length != 0 && anno_acquisto.length != 0 && id_casa_editrice.length != 0)
    {
        var check;
        if(copertina == "\\")
        {
            check = confirm("Nessuna copertina selezionata, mantenere quella precedente?");
            if(check == true)
            {
                copertina = copertina_old;
            }

        }

        if(autore == autore_old && titolo == titolo_old && id_casa_editrice == id_casa_editrice_old && copertina == copertina_old && prezzo == prezzo_old && prezzo_acquisto == prezzo_acquisto_old && anno_acquisto == anno_acquisto_old && quantita == quantita_old && locazione == locazione_old)
        {
            alert("Non ci sono modifiche da salvare!");
        }

        else
        {
            check = confirm("Sei sicuro di voler salvare le modifiche?");
            if(check == true)
            {
                $.ajax({
                    type: 'POST',
                    url: 'modifica_salva_libro.php',
                    data: "autore="+autore+"&isbn="+isbn+"&isbn_old="+isbn_old+"&titolo="+titolo+"&copertina="+copertina+"&locazione="+locazione+"&prezzo="+prezzo+"&prezzo_acquisto="+prezzo_acquisto+"&quantita="+quantita+"&anno_acquisto="+anno_acquisto+"&id_casa_editrice="+id_casa_editrice,
                    dataType: "html",

                    success: function(response)
                    {
                        alert(response);
                    },
                    error: function()
                    {
                        alert("Le modifiche non sono state salvate.");
                    }
                });
            }
            else
            {
                isbn = isbn_old;
                autore = autore_old;
                titolo = titolo_old;
                id_casa_editrice = id_casa_editrice_old;
                prezzo = prezzo_old;
                prezzo_acquisto = prezzo_acquisto_old;
                anno_acquisto = anno_acquisto_old;
                quantita = quantita_old;
                locazione = locazione_old;
                copertina = copertina_old;
                window.location.reload();
            }
        }
    }
    else
    {
        alert("Alcuni o tutti i campi sono vuoti, completare i campi.");
    }
}

function cancellaLibro(isbn)
{
    var check = confirm("Sei sicuro di voler cancellare il libro?");
    if(check == true)
    {
        $.ajax({
            type: 'POST',
            url: 'cancella_libri.php',
            data: "isbn="+isbn,
            dataType: "html",

            success: function(response)
            {
                var riga = document.getElementById('row'+isbn);
                riga.style.display = 'none';
                alert(response);

            },
            error: function()
            {
                alert("La cancellazione non è andata a buon fine.");
            }
        });
    }
}

function preparaOrdina(isbn)
{
    //prelevo la quantita da ordinare
    var quantita = $("#qtaord"+isbn).val();

    if(quantita <= 0)
    {
        alert("Per ordinare inserire una quantita' positiva.");
    }
    else
    {
        if(quantita > 0)
        {
            var check = confirm("Sei sicuro di voler ordinare il libro?");
            if(check == true)
            {
                $.ajax({
                    type: 'POST',
                    url: 'ordina_libri.php',
                    data: "isbn="+isbn+"&quantita="+quantita,
                    dataType: "html",

                    success: function(response)
                    {
                        alert(response);
                    },
                    error: function()
                    {
                        alert("L'ordine non è andato a buon fine.");
                    }
                });
            }
            else
            {
                alert("Quantità non accettata.");
            }
        }

    }
}

function back_Ricerca(isbn, titolo, autore, casa_editrice, locazione, anno_acquisto)
{
    var post = '';
    if(isbn != "%%")
    {
        isbn = isbn.slice(1, isbn.length-1);
        if(post == '')
            post = post+"insisbn="+isbn;
        else
            post = post+"&insisbn="+isbn;
    }
    if(titolo != "%%")
    {
        titolo = titolo.slice(1, titolo.length-1);
        if(post == '')
            post = post+"institolo="+titolo;
        else
            post = post+"&institolo="+titolo;
    }
    if(autore != "%%")
    {
        autore = autore.slice(1, autore.length-1);
        if(post == '')
            post = post+"insautore="+autore;
        else
            post = post+"&insautore="+autore;
    }
    if(casa_editrice != "%%")
    {
        casa_editrice = casa_editrice.slice(0, casa_editrice.length-1);
        if(post == '')
            post = post+"inscasaeditrice="+casa_editrice;
        else
            post = post+"&inscasaeditrice="+casa_editrice;
    }
    if(locazione != "%%")
    {
        locazione = locazione.slice(1, locazione.length-1);
        if(post == '')
            post = post+"inslocazione="+locazione;
        else
            post = post+"&inslocazione="+locazione;
    }
    if(anno_acquisto != "%%")
    {
        anno_acquisto = anno_acquisto.slice(1, anno_acquisto.length-1);
        alert(anno_acquisto);
        if(post == '')
            post = post+"insannoacquisto="+anno_acquisto;
        else
            post = post+"&insannoacquisto="+anno_acquisto;
    }
    $.ajax({

        type: 'POST',
        url: 'ricerca.php',
        data: post,
        dataType: "html",

        success: function(response)
        {

            document.write(response);
            document.getElementById('menu_ricerca').href = 'admin.php';
            document.getElementById('menu_ordini').href = 'daordinare.php';
        },
        error: function()
        {
            alert("La cancellazione non è andata a buon fine.");
        }
    });
}

function cambiaCopertina()
{
    var cambia = document.getElementById('div_copertina');
    if(cambia.style.display == "block")
    {
        cambia.style.display = 'none';
    }
    else
    {
        cambia.style.display = 'block';
    }
}

function cancellaOrdine(id, controllo)
{
    if(controllo == true)
    {
        var check = confirm("Sei sicuro di voler cancellare questo libro ancora da ordinare?");

        if(check == true)
        {
            $.ajax({

                type: 'POST',
                url: 'cancella_ordine.php',
                data: "id="+id,
                dataType: "html",

                success: function(response)
                {
                    window.location.reload();
                    alert(response);
                },
                error: function()
                {
                    alert("La cancellazione non è andata a buon fine.");
                }
            });
        }
    }
    else
    {
        $.ajax({

            type: 'POST',
            url: 'cancella_ordine.php',
            data: "id="+id,
            dataType: "html",

            success: function(response)
            {
                window.location.reload();
                alert(response);
            },
            error: function()
            {
                alert("La cancellazione non è andata a buon fine.");
            }
        });
    }
}

function svuota(id_ordini, id_div)
{

    var check = confirm("Sei sicuro di voler cancellare tutti i libri?");

    if(check == true)
    {
        $.ajax({

            type: 'POST',
            url: 'svuota_daordinare.php',
            data: id_ordini,
            dataType: "html",

            success: function(response)
            {
                alert(response);
                var content = document.getElementById(id_div);
                content.style.display = 'none';
            },
            error: function()
            {
                alert("La cancellazione non è andata a buon fine.");
            }
        });
    }
}

/*permette di stampare un array di oggetti in javascript(mi serviva per il debug)*/
function print_r(o,level,max) {
    var output = "";
    if(!level) level = 0;
    var padding = "";
    for(var j=0;j<level+1;j++) padding += "    ";
    if(!max) max = 10;
    if(level==max) return padding + "Max level ["+level+"] reached\n";
    if(typeof(o) == 'object') {
        for(var item in o) {
            var value = o[item];
            if(typeof(value) == 'object') {
                output += padding + "[" + item + "] => Array\n";
                output += print_r(value,level+1,max);
            } else {
                output += padding + "[" + item + "] => \"" + value + "\"\n";
            }
        }
    } else {
        output = "("+typeof(o)+") => "+o;
    }
    return output;
}


function modificaOrdine(isbn, id_ordine)
{
    var old = $('#qtaord_old'+isbn+id_ordine);
    var quantita_ordine_old = old.val();
    if(document.getElementById("modifica"+isbn+id_ordine).innerHTML == "Modifica Ordine")
    {
        document.getElementById("modifica"+isbn+id_ordine).innerHTML = "Salva Ordine";
        document.getElementById("modifica"+isbn+id_ordine).className = "fa fa-save";
        document.getElementById("qtaord"+isbn+id_ordine).disabled = false;
    }
    //altrimenti, prelevo i campi modificati e li invio con AJAX
    else
    {
        var quantita_ordine = $('#qtaord'+isbn+id_ordine).val();
        if(quantita_ordine <= 0)
        {
            alert("Inserisci una quantita' positiva");
        }
        else if(quantita_ordine_old == quantita_ordine)
        {
            alert("Non ci sono modifiche da fare");
            document.getElementById("modifica"+isbn+id_ordine).innerHTML = "Modifica Ordine";
            document.getElementById("modifica"+isbn+id_ordine).className = "fa fa-edit";
            document.getElementById("qtaord"+isbn+id_ordine).disabled = true;
        }
        else
        {
            $.ajax({
                type: 'POST',
                url: 'modifica_ordine_daordinare.php',
                data: "isbn="+isbn+"&id_ordine="+id_ordine+"&quantita_ordine="+quantita_ordine,
                dataType: "html",

                success: function(response)
                {
                    alert(response);
                    document.getElementById("modifica"+isbn+id_ordine).innerHTML = "Modifica Ordine";
                    document.getElementById("modifica"+isbn+id_ordine).className = "fa fa-edit";
                    document.getElementById("qtaord"+isbn+id_ordine).disabled = true;
                    document.getElementById("qtaord_old"+isbn+id_ordine).value = quantita_ordine;
                },
                error: function()
                {
                    alert("La modifica dell'ordine non è andata a buon fine.");
                }
            });
        }
    }
}

function ordinaLibro(id_ordine, id_riga)
{
    var check = confirm("Aggiornare lo stato del libro a ordinato?");

    if(check == true)
    {
        $.ajax({
            type: 'POST',
            url: 'ordina_libro_daordinare.php',
            data: "id_ordine="+id_ordine,
            dataType: "html",

            success: function(response)
            {
                alert(response);
                var riga_ordine = document.getElementById('row'+id_riga);
                riga_ordine.style.display = 'none';
            },
            error: function()
            {
                alert("L'aggiornamento dello stato dell'ordine non è andato a buon fine.");
            }
        });
    }
}

function OrdinaTuttiDaOrdinare(id_ordini)
{
    var check = confirm("Aggiornare lo stato di tutti i libri a ordinato?");

    if(check == true)
    {
        $.ajax({

            type: 'POST',
            url: 'ordina_tutti_daordinare.php',
            data: id_ordini,
            dataType: "html",

            success: function(response)
            {
                alert(response);
                var content = document.getElementById('daordinare');
                content.style.display = 'none';
            },
            error: function()
            {
                alert("L'aggiornamento di tutti gli stati non è andato a buon fine.");
            }
        });
    }
}

function arrivatoLibro(id_ordine,isbn,quantita,id_riga)
{
    var check = confirm("Aggiornare lo stato del libro ad arrivato?");

    if(check == true)
    {
        $.ajax({
            type: 'POST',
            url: 'arrivato_libro_ordinato.php',
            data: "id_ordine="+id_ordine+"&isbn="+isbn+"&quantita="+quantita,
            dataType: "html",

            success: function(response)
            {
                alert(response);
                var riga_ordine = document.getElementById('row'+id_riga);
                riga_ordine.style.display = 'none';
            },
            error: function()
            {
                alert("L'aggiornamento dello stato dell'ordine non è andato a buon fine.");
            }
        });
    }
}

function ArrivatiTuttiOrdinati(id_ordini)
{
    var check = confirm("Aggiornare lo stato di tutti i libri ad arrivato?");

    if(check == true)
    {
        $.ajax({

            type: 'POST',
            url: 'arrivati_tutti_ordinati.php',
            data: id_ordini,
            dataType: "html",

            success: function(response)
            {
                alert(response);
                var content = document.getElementById('ordinati');
                content.style.display = 'none';
            },
            error: function()
            {
                alert("L'aggiornamento di tutti gli stati non è andato a buon fine.");
            }
        });
    }
}


function ordinaRicercaPerDistributore(nomeSelect)
{
    var nome_distributore = nomeSelect.options[nomeSelect.selectedIndex].text;
    $.ajax({

        type: 'POST',
        url: 'ordinaPer_distributore.php',
        data: "nome_distributore="+nome_distributore,
        dataType: "html",

        success: function(response)
        {
            window.location.reload();
        },
        error: function()
        {
            alert("La selezione per distributore non e' andata a buon fine.");
        }
    });
}

function aggiungiDistributore(nomeSelect)
{

    var nome = $("#insnome").val();
    var indirizzo = $("#insindirizzo").val();
    var citta = $("#inscitta").val();
    var telefono = $("#instelefono").val();
    var fax = $("#insfax").val();
    var email = $("#insemail").val();
    var cap = $("#inscap").val();
    var sito = $("#inssitoweb").val();
    var preferenza = nomeSelect.options[nomeSelect.selectedIndex].text;
    var codicelib = $("#inscodlibreria").val();

    if(nome.length != 0 && indirizzo.length != 0  && citta.length != 0 && telefono.length != 0 && email.length != 0 && cap.length != 0 && sito.length != 0 && preferenza.length != 0)
    {
        $.ajax({
            type: 'POST',
            url: 'inserisci_distributore.php',
            data: "nome="+nome+"&indirizzo="+indirizzo+"&citta="+citta+"&telefono="+telefono+"&fax="+fax+"&email="+email+"&cap="+cap+"&sito="+sito+"&preferenza="+preferenza+"&codicelib="+codicelib,
            dataType: "html",

            success: function(response)
            {
                //window.location.reload();
                alert(response);

            },
            error: function()
            {
                alert("L'inserimento del distributore non è andato a buon fine");
            }
        });
    }
    else
        alert("Per favore compilare tutti i campi.");
}


function aggiungiRigaDistributore()
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

function modificaDistributore(id)
{
    var nome_distributore = document.getElementById('nome_distributore'+id).innerText;
    var indirizzo = document.getElementById('indirizzo'+id).innerText;
    var citta = document.getElementById('citta'+id).innerText;
    var telefono = document.getElementById('telefono'+id).innerText;
    var fax = document.getElementById('fax'+id).innerText;
    var email = document.getElementById('email'+id).innerText;
    var cap = document.getElementById('cap'+id).innerText;
    var sito_web = document.getElementById('sito_web'+id).innerText;
    var codice_libreria = document.getElementById('codice_libreria'+id).innerText;
    var preferenza_ordine = document.getElementById('preferenza_ordine'+id).innerText;

    nome_distributore = nome_distributore.replace(/^.*:/, "");
    indirizzo = indirizzo.replace(/^.*:/, "");
    citta = citta.replace(/^.*:/, "");
    telefono = telefono.replace(/^.*:/, "");
    fax = fax.replace(/^.*:/, "");
    email = email.replace(/^.*:/, "");
    cap = cap.replace(/^.*:/, "");
    sito_web = sito_web.replace(/^.*:/, "");
    codice_libreria = codice_libreria.replace(/^.*:/, "");
    preferenza_ordine = preferenza_ordine.replace(/^.*:/, "");

    window.location.href = 'modifica_distributore.html.php?nome_distributore='+nome_distributore+'&indirizzo='+indirizzo+'&citta='+citta+
        '&cap='+cap+'&telefono='+telefono+'&fax='+fax+'&email='+email+'&sito_web='+sito_web+'&codice_libreria='+codice_libreria+
        '&preferenza_ordine='+preferenza_ordine+'&id_distributore='+id;

}

function cancellaDistributore(id)
{
    var check = confirm("Sei sicuro di voler cancellare il distributore?");
    if(check == true)
    {
        $.ajax({
            type: 'POST',
            url: 'inserisci_distributore_cancella.php',
            data: "id_distributore="+id,
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

function modificaSalvaDistributore(nomeSelect)
{
    var id_distributore = $("#id_distributore").val();
    var nome_distributore = $("#nome_distributore").val();
    var indirizzo = $("#indirizzo").val();
    var citta = $("#citta").val();
    var preferenza_ordine = nomeSelect.options[nomeSelect.selectedIndex].text;
    var telefono = $("#telefono").val();
    var fax = $("#fax").val();
    var email = $("#email").val();
    var cap = $("#cap").val();
    var sito_web = $("#sito_web").val();
    var codice_libreria = $("#codice_libreria").val();

    var nome_distributore_old = $("#nome_distributore_old").val();
    var indirizzo_old = $("#indirizzo_old").val();
    var citta_old = $("#citta_old").val();
    var preferenza_ordine_old = $("#preferenza_ordine_old").val();
    var telefono_old = $("#telefono_old").val();
    var fax_old = $("#fax_old").val();
    var email_old = $("#email_old").val();
    var cap_old = $("#cap_old").val();
    var sito_web_old = $("#sito_web_old").val();
    var codice_libreria_old = $("#codice_libreria_old").val();


    if(nome_distributore.length != 0 && indirizzo.length != 0 && citta.length != 0 && preferenza_ordine.length != 0 && telefono.length != 0
        && telefono.length != 0 && fax.length != 0 && email.length != 0 && cap.length != 0 && sito_web.length != 0 && codice_libreria.length != 0)
    {
        if(nome_distributore == nome_distributore_old && indirizzo == indirizzo_old && citta == citta_old && preferenza_ordine == preferenza_ordine_old
            && telefono == telefono_old && fax == fax_old && email == email_old && cap == cap_old && sito_web == sito_web_old && codice_libreria == codice_libreria_old)
        {
            alert("Non ci sono modifiche da salvare!");
        }

        else
        {
            check = confirm("Sei sicuro di voler salvare le modifiche?");
            if(check == true)
            {
                $.ajax({
                    type: 'POST',
                    url: 'modifica_salva_distributore.php',
                    data: "nome_distributore="+nome_distributore+"&indirizzo="+indirizzo+"&citta="+citta+"&preferenza_ordine="+preferenza_ordine+
                            "&telefono="+telefono+"&fax="+fax+"&email="+email+"&cap="+cap+"&sito_web="+sito_web+"&codice_libreria="+codice_libreria+"&id_distributore="+id_distributore,
                    dataType: "html",

                    success: function(response)
                    {
                        alert(response);
                    },
                    error: function()
                    {
                        alert("Le modifiche non sono state salvate.");
                    }
                });
            }
            else
            {
                nome_distributore = nome_distributore_old;
                indirizzo = indirizzo_old;
                citta = citta_old;
                telefono = telefono_old;
                fax = fax_old;
                email = email_old;
                cap = cap_old;
                sito_web = sito_web_old;
                codice_libreria = codice_libreria_old;
                preferenza_ordine = preferenza_ordine_old;
                window.location.reload();
            }
        }
    }
    else
    {
        alert("Alcuni o tutti i campi sono vuoti, completare i campi.");
    }
}

function aggiungiCasaEditrice(nomeSelect)
{

    var nome = $("#insnome").val();
    var sito = $("#inssitoweb").val();
    var id_distributore = nomeSelect.options[nomeSelect.selectedIndex].value;

    if(nome.length != 0 && sito.length != 0)
    {
        $.ajax({
            type: 'POST',
            url: 'inserisci_casa_editrice.php',
            data: "nome="+nome+"&sito="+sito+"&id_distributore="+id_distributore,
            dataType: "html",

            success: function(response)
            {
                window.location.reload();
                alert(response);

            },
            error: function()
            {
                alert("L'inserimento del distributore non è andato a buon fine");
            }
        });
    }
    else
        alert("Per favore compilare tutti i campi.");
}

function aggiungiRigaCasaEditrice()
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

function modificaCasaEditrice(id, id_distributore)
{
    var nome = document.getElementById('nome'+id).innerText;
    var sito_web = document.getElementById('sito_web'+id).innerText;
    var nome_distributore = document.getElementById('nome_distributore'+id).innerText;
    var id_distributore = document.getElementById('id_distributore').value;

    nome = nome.replace(/^.*:/, "");
    sito_web = sito_web.replace(/^.*:/, "");
    nome_distributore = nome_distributore.replace(/^.*:/, "");

    window.location.href = 'modifica_casa_editrice.html.php?nome='+nome+'&sito_web='+sito_web+'&nome_distributore='+nome_distributore+'&id_distributore='+id_distributore+'&id_casa_editrice='+id;

}

function modificaSalvaCasaEditrice(nomeSelect)
{
    var id_casa_editrice = $("#id_casa_editrice").val();
    var nome = $("#nome").val();
    var sito_web = $("#sito_web").val();
    var index = document.getElementById("preferenza").selectedIndex;
    var id_distributore = document.getElementsByTagName("option")[index].getAttribute("value");

    var id_casa_editrice_old = $("#id_casa_editrice_old").val();
    var nome_old = $("#nome_old").val();
    var sito_web_old = $("#sito_web_old").val();
    var id_distributore_old = $("#id_distributore_old").val();


    if(id_casa_editrice.length != 0 && nome.length != 0 && sito_web.length != 0 && id_distributore.length != 0)
    {
        if(id_casa_editrice == id_casa_editrice_old && nome == nome_old && sito_web == sito_web_old && id_distributore == id_distributore_old)
        {
            alert("Non ci sono modifiche da salvare!");
        }

        else
        {
            check = confirm("Sei sicuro di voler salvare le modifiche?");
            if(check == true)
            {
                $.ajax({
                    type: 'POST',
                    url: 'modifica_salva_casa_editrice.php',
                    data: "id_casa_editrice="+id_casa_editrice+"&nome="+nome+"&sito_web="+sito_web+"&id_distributore="+id_distributore,
                    dataType: "html",

                    success: function(response)
                    {
                        alert(response);
                    },
                    error: function()
                    {
                        alert("Le modifiche non sono state salvate.");
                    }
                });
            }
            else
            {
                id_casa_editrice = id_casa_editrice_old;
                nome = nome_old;
                sito_web = sito_web_old;
                id_distributore = id_distributore_old;
                window.location.reload();
            }
        }
    }
    else
    {
        alert("Alcuni o tutti i campi sono vuoti, completare i campi.");
    }
}

function modificaLibroArrivato(id_ordine,id_row, isbn)
{
    var old = $('#qtaord_old'+id_row);

    var quantita_ordine_old = old.val();
    if(document.getElementById("modificaarrivato"+id_row).innerHTML == "Modifica quantità arrivato")
    {
        document.getElementById("modificaarrivato"+id_row).innerHTML = "Salva Ordine";
        document.getElementById("modificaarrivato"+id_row).className = "fa fa-save";
        document.getElementById("qtaord"+id_row).disabled = false;
    }
    //altrimenti, prelevo i campi modificati e li invio con AJAX
    else
    {
        var quantita_ordine = $('#qtaord'+id_row).val();
        var check;
        if(quantita_ordine <= 0)
        {
            alert("Inserisci una quantita' positiva.");
        }
        else if(quantita_ordine_old == quantita_ordine)
        {
            check = confirm("La quantità arrivata è uguale a quella ordinata, cancellare l'ordine?");
            if(check == true)
            {
                cancellaOrdine(id_ordine, false);
            }
            document.getElementById("modifica"+isbn+id_ordine).innerHTML = "Modifica Ordine";
            document.getElementById("modifica"+isbn+id_ordine).className = "fa fa-edit";
            document.getElementById("qtaord"+isbn+id_ordine).disabled = true;
        }
        else
        {
            check = confirm("La quantità arrivata è diversa da qualle ordinata, mandare in riordino?");
            if(check == true)
            {
                $.ajax({
                    type: 'POST',
                    url: 'ordina_libri.php',
                    data: "isbn="+isbn+"&quantita="+quantita,
                    dataType: "html",

                    success: function(response)
                    {
                        alert(response);
                    },
                    error: function()
                    {
                        alert("L'ordine non è andato a buon fine.");
                    }
                });
            }
        }
    }
}
