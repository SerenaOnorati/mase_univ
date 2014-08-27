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
    var id_casa_editrice = nomeSelect.options[nomeSelect.selectedIndex].value;

    if(autore.length != 0 && isbn.length != 0  && titolo.length != 0 && copertina.length != 0 && locazione.length != 0 && prezzo.length != 0 && quantita.length != 0 && anno.length != 0 && id_casa_editrice.length != 0)
    {
        $.ajax({
            type: 'POST',
            url: 'inserisci_libri.php',
            data: "autore="+autore+"&isbn="+isbn+"&titolo="+titolo+"&copertina="+copertina+"&locazione="+locazione+"&prezzo="+prezzo+"&quantita="+quantita+"&anno="+anno+"&id_casa_editrice="+id_casa_editrice,
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