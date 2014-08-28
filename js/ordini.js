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
    var quantita = $("#insquantita").val();
    var anno = $("#insannoacquisto").val();
    var prezzoa = $("#insprezzoa").val();
    var id_casa_editrice = nomeSelect.options[nomeSelect.selectedIndex].value;

    if(autore.length != 0 && isbn.length != 0  && titolo.length != 0 && copertina.length != 0 && locazione.length != 0 && prezzo.length != 0 && quantita.length != 0 && anno.length != 0 && id_casa_editrice.length != 0 && prezzoa.length != 0)
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
    var copertina = document.getElementById('copertina'+isbn).innerText;
    var quantita = document.getElementById('qtamag'+isbn).innerText;
    var locazione = document.getElementById('locazione'+isbn).innerText;



    autore = autore.replace(/^.*:/,"");
    titolo = titolo.replace(/^.*:/,"");
    casa_editrice = casa_editrice.replace(/^.*:/,"");
    prezzo = prezzo.replace(/^.*:/, "");
    prezzo_acquisto = prezzo_acquisto.replace(/^.*:/,"");
    anno_acquisto = anno_acquisto.replace(/^.*:/,"");
    copertina = copertina.replace(/^.*:/,"");
    quantita = quantita.replace(/^.*:/,"");
    locazione = locazione.replace(/^.*:/,"");

    window.location.href = 'modifica_libro.html.php?isbn='+isbn+'&autore='+autore+'&titolo='+titolo+'&casa_editrice='+casa_editrice+'&prezzo='+prezzo+'&prezzo_acquisto='+prezzo_acquisto+'&anno_acquisto='+anno_acquisto+'&quantita='+quantita+'&locazione='+locazione;

}