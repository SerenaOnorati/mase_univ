//funzione che permette di aggiungere un libro nel db tramite chiamata AJAX
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

    if(autore.length != 0 && isbn.length != 0  && titolo.length != 0 && copertina.length != 0 && locazione.length != 0 && prezzo.length != 0 && prezzoa.length != 0 && quantita.length != 0 && anno.length != 0 && id_casa_editrice.length != 0)
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
    //var path = $("#url").val();
    //var copertina = path.replace(/^.*\\/, "");
    var quantita = $("#quantita").val();
    var locazione = $("#locazione").val();

    var isbn_old = $("#isbn_old").val();
    var autore_old = $("#autore_old").val();
    var titolo_old = $("#titolo_old").val();
    var id_casa_editrice_old = $("#id_casa_editrice_old").val();
    var prezzo_old = $("#prezzo_old").val();
    var prezzo_acquisto_old = $("#prezzo_acquisto_old").val();
    var anno_acquisto_old = $("#anno_acquisto_old").val();
    //var copertina_old = $("#copertina_old").val();
    var quantita_old = $("#quantita_old").val();
    var locazione_old = $("#locazione_old").val();


    if(autore.length != 0 && isbn.length != 0 && titolo.length != 0 && locazione.length != 0 && prezzo.length != 0 && prezzo_acquisto.length != 0 && quantita.length != 0 && anno_acquisto.length != 0 && id_casa_editrice.length != 0)
    {
        if(autore == autore_old && titolo == titolo_old && id_casa_editrice == id_casa_editrice_old && prezzo == prezzo_old && prezzo_acquisto == prezzo_acquisto_old && anno_acquisto == anno_acquisto_old && quantita == quantita_old && locazione == locazione_old)
        {
            alert("Non ci sono modifiche da salvare!");
        }

        else
        {
            var check = confirm("Sei sicuro di voler salvare le modifiche?");
            if(check == true)
            {
                $.ajax({
                    type: 'POST',
                    url: 'modifica_salva_libro.php',
                    data: "autore="+autore+"&isbn="+isbn+"&isbn_old="+isbn+"&titolo="+titolo+"&locazione="+locazione+"&prezzo="+prezzo+"&prezzo_acquisto="+prezzo_acquisto+"&quantita="+quantita+"&anno_acquisto="+anno_acquisto+"&id_casa_editrice="+id_casa_editrice,
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

function back_Ricerca(isbn, titolo, autore, casa_editrice, locazione, anno_acquisto)
{
    alert("inizio");
    var post = '';
    /*if(isbn != "%%")
    {
        isbn = isbn.delete(1, isbn.length-1);
        alert(isbn);
        if(post == '')
            post = post+"insisbn="+isbn;
        else
            post = post+"&insisbn="+isbn;
    }
    if(titolo != "%%")
    {
        titolo = titolo.delete(1, titolo.length-1);
        alert(titolo);
        if(post == '')
            post = post+"institolo="+titolo;
        else
            post = post+"&institolo="+titolo;
    }
    if(autore != "%%")
    {
        autore = autore.delete(1, autore.length-1);
        alert(autore);
        if(post == '')
            post = post+"insautore="+autore;
        else
            post = post+"&insautore="+autore;
    }
    if(casa_editrice != "%%")
    {
        casa_editrice = casa_editrice.delete(1, casa_editrice.length-1);
        alert(casa_editrice);
        if(post == '')
            post = post+"inscasaeditrice="+casa_editrice;
        else
            post = post+"&inscasaeditrice="+casa_editrice;
    }
    if(locazione != "%%")
    {
        locazione = locazione.delete(1, locazione.length-1);
        alert(locazione);
        if(post == '')
            post = post+"inslocazione="+locazione;
        else
            post = post+"&inslocazione="+locazione;
    }
    if(anno_acquisto != "%%")
    {
        post = anno_acquisto.delete(1, anno_acquisto.length-1);
        alert(anno_acquisto);
        if(post == '')
            post = post+"insannoacquisto="+anno_acquisto;
        else
            post = post+"&insannoacquisto="+anno_acquisto;
    }
    alert(post);
    /*$.ajax({

        type: 'POST',
        url: 'ricerca.php',
        data: "insisbn="+isbn+"&institolo="+titolo+"&insautore="+autore+"&inscasaeditrice="+casa_editrice+"&inslocazione="+locazione+"&insannoacquisto="+anno_acquisto,
        dataType: "html",

        success: function(response)
        {
            alert("Tutto ok");

        },
        error: function()
        {
            alert("La cancellazione non è andata a buon fine.");
        }
    });*/
}