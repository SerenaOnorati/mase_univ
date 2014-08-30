///funzione che permette di aggiungere un libro nel db tramite chiamata AJAX
function aggiungiLibro(nomeSelect)
{

    var autore = $("#insautore").val();
    var isbn = $("#insisbn").val();
    var titolo = $("#institolo").val();
    var path = $("#url").val();
    var copertina = path.replace(/^.*\\/, "");
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

function cancellaOrdine(id)
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

function svuotaDaOrdinare(id_ordini)
{

    var check = confirm("Sei sicuro di voler cancellare tutti i libri ancora da ordinare?");

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
                window.location.reload();
            },
            error: function()
            {
                alert("La cancellazione non è andata a buon fine.");
            }
        });
    }
}

/*permette di stampare un'array di oggetti in javascript(mi serviva per il debug)*/
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
