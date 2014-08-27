$(document).ready(function() {

    $("#ricerca").click(
        function ricerca()
        {
            var autore = document.getElementById('insautore').value;
            var titolo = document.getElementById('institolo').value;
            var casaeditrice = document.getElementById('inscasaeditrice').value;
            var locazione = document.getElementById('inslocazione').value;
            var isbn = document.getElementById('insisbn').value;
            var anno_acquisto = document.getElementById('insannoacquisto').value;

            $.ajax({
                type: 'POST',
                url: 'ricerca.php',
                data: "autore="+autore+"&titolo="+titolo+"&locazione="+locazione+"&casaeditrice="+casaeditrice+"&isbn="+isbn+"&anno_acquisto"+anno_acquisto,
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
    )
});