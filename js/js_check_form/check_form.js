
function Modulo(nome, email, messaggio){

    if ((nome == "") || (nome == "undefined")){
        alert("Il campo nome è obbligatorio.");
        nome.focus();

    }
    else{
        var email_reg_exp = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-]{2,})+\.)+([a-zA-Z0-9]{2,})+$/;
        if (!email_reg_exp.test(email) || (email == "") || (email == "undefined")){
            alert("Il campo email è obbligatorio.");
            email.focus();
        }
        else{
            if ((messaggio == "") || (messaggio == "undefined")){
                alert("Il campo messaggio è obbligatorio.");
                messaggio.focus();
            }
            else{
                //Invio del messaggio lo farò inserendo codice asp
                var oggetto = "Richiesta informazioni dal sito Universitalia";


            }
        }
    }

}