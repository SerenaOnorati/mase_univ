function stampa(risultati)
{

    var titolo = document.getElementById('titolo_stampa').innerHTML;

    // Apro una finestra pop-up nella quale inserisco i blocchi
    var a = window.open('','','width=640,height=480');
    a.document.open("text/html");
    a.document.write("<html style='page-break-after: always'><head></head><body>");

    //prelevo il primo nome distributore e i suoi dati
    var nome_distributore = $("#distributoreval"+risultati['id'][0]).val();
    var indirizzo = $("#indirizzo"+risultati['id'][0]).val();
    var citta = $("#citta"+risultati['id'][0]).val();
    var telefono = $("#telefono"+risultati['id'][0]).val();
    var fax = $("#fax"+risultati['id'][0]).val();
    var email = $("#email"+risultati['id'][0]).val();
    var cap = $("#cap"+risultati['id'][0]).val();
    var sito_web = $("#sito_web"+risultati['id'][0]).val();
    var codice_libreria = $("#codice_libreria"+risultati['id'][0]).val();
    var preferenza_ordine = $("#preferenza_ordine"+risultati['id'][0]).val();

    a.document.write("<table style='text-align: left' width=\"100%\"><tr><th>");
    a.document.write("<p>UniversItalia di Onorati Srl<br>");
    // Scrivo il titolo e il corpo con un pò di stile in CSS
    a.document.write("Via di Passolombardo, 421 - 00133 Roma<br>Tel: 062026342 - Email: universitalia@tin.it<br>P.Iva: 03914561000</p></th>");
    a.document.write("<th><p>"+nome_distributore+"<br>");
    a.document.write(indirizzo+" - "+cap+" - "+citta+"<br>");
    a.document.write("Telefono: "+telefono+" - Fax: "+fax+" - Sito web: "+sito_web+"<br>");
    a.document.write(" Codice libreria: "+codice_libreria+" - Preferenza invio ordine: "+preferenza_ordine+"</p></th></tr></table>");
    a.document.write("<div style='border: 1px solid #CCCCCC'></div><br>");
    a.document.write("<div style='border: 1px solid #CCCCCC'>");
    a.document.write("<table style='text-align: left' width=\"100%\"><tr><th>ISBN</th><th>Qta.</th><th>Autore</th><th>Titolo</th><th>Casa Editrice</th></tr>");

    var isbn;
    var qta;
    var autore;
    var titolo_libro;
    var casa_editrice;

    for(i = 0; i< risultati['id'].length; i++)
    {
        if(nome_distributore != $("#distributoreval"+risultati['id'][i]).val())
        {
            nome_distributore = $("#distributoreval"+risultati['id'][i]).val();
            indirizzo = $("#indirizzo"+risultati['id'][i]).val();
            citta = $("#citta"+risultati['id'][i]).val();
            telefono = $("#telefono"+risultati['id'][i]).val();
            fax = $("#fax"+risultati['id'][i]).val();
            email = $("#email"+risultati['id'][i]).val();
            cap = $("#cap"+risultati['id'][i]).val();
            sito_web = $("#sito_web"+risultati['id'][i]).val();
            codice_libreria = $("#codice_libreria"+risultati['id'][i]).val();
            preferenza_ordine = $("#preferenza_ordine"+risultati['id'][i]).val();

            a.document.write("</table></div>");
            a.document.write("<p style='page-break-after: always'></p><table style='text-align: left' width=\"100%\"><tr><th>");
            a.document.write("<p>UniversItalia di Onorati Srl<br>");
            // Scrivo il titolo e il corpo con un pò di stile in CSS
            a.document.write("Via di Passolombardo, 421 - 00133 Roma<br>Tel: 062026342 - Email: universitalia@tin.it<br>P.Iva: 03914561000</p></th>");
            a.document.write("<th><p>"+nome_distributore+"<br>");
            a.document.write(indirizzo+" - "+cap+" - "+citta+"<br>");
            a.document.write("Telefono: "+telefono+" - Fax: "+fax+" - Sito web: "+sito_web+"<br>");
            a.document.write(" Codice libreria: "+codice_libreria+" - Preferenza invio ordine: "+preferenza_ordine+"</p></th></tr></table>");
            a.document.write("<div style='border: 1px solid #CCCCCC'></div><br>");
            a.document.write("<div style='border: 1px solid #CCCCCC'>");
            a.document.write("<table style='text-align: left' width=\"100%\"><tr><th>ISBN</th><th>Qta.</th><th>Autore</th><th>Titolo</th><th>Casa Editrice</th></tr>");
        }

        isbn = $("#isbn"+risultati['id'][i]).val();
        qta = $("#qtaord"+risultati['id'][i]).val();
        autore = $("#autore"+risultati['id'][i]).val();
        titolo_libro = $("#titolo"+risultati['id'][i]).val();
        casa_editrice = $("#casa_editrice"+risultati['id'][i]).val();

        a.document.write("<tr><td>"+isbn+"</td><td>"+qta+"</td><td>"+autore+"</td><td>"+titolo_libro+"</td><td>"+casa_editrice+"</td></tr>");
    }


    a.document.write("</body></html>");
    a.document.close();

    // Invio il documento alla stampante
    a.print();
}