function checkAndSend()
{
    var nome = $("#name").val();
    var email = $("#emailform").val();
    var messaggio = $("#message").val();
    var privacy = $("#privacy").val();
    var control = $("#control").val();

    alert(nome+email+messaggio+privacy+control);

    if(nome.length == 0)
    {
        alert("Inserisci il nome.");
    }
    else
    {
        var filtro =  /^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        if (!filtro.test(email)) {
            alert("Attenzione, indirizzo email non valido");
        }
        else
        {
            if(messaggio.length == 0)
            {
                alert("Inserire il testo del messaggio.")
            }
            else
            {
               if(document.contactform.privacy.checked && control.length == 0)
               {
                   $.ajax({
                       type: 'POST',
                       url: 'mail.php',
                       data: "nome="+nome+"&email="+email+"&messaggio="+messaggio,
                       dataType: "html",

                       success: function(response)
                       {
                           alert(response);
                       },
                       error: function()
                       {
                           alert("L'invio dell'email non è andato a buon fine.");
                       }
                   });
               }
                else
               {
                   alert("Accetta l'informativa sulla privacy.");
               }
            }
        }
    }
}
