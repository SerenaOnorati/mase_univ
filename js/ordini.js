function ricerca()
{
    var autore = document.getElementById('insautore').value;
    var titolo = document.getElementById('institolo').value;
    var casaeditrice = document.getElementById('inscasaeditrice').value;
    var locazione = document.getElementById('inslocazione').value;
    $.ajax({
        type: 'POST',
        url: 'ricerca.php',
        data: "autore="+autore+"&titolo="+titolo+"&locazione="+locazione+"&casaeditrice="+casaeditrice,
        dataType: "html",

        success: function(response)
        {
            //vai su ordina
            alert("Ricerca andata a buon fine");
        },
        error: function()
        {
            alert("Ricerca fallita");
        }
    });
}