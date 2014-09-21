function stampa()
{
    var titolo = document.getElementById('titolo_stampa').innerHTML;
    // Apro una finestra pop-up nella quale inserisco i blocchi
    var a = window.open('','','width=640,height=480');
    a.document.open("text/html");
    a.document.write("<html><head>");
    a.document.write("</head><body><p style='text-align: center'><img src=\"images/Logo_u.png\"  height=\"50\"><img src=\"images/universitalia.png\"  height=\"50\"></p>");

    // Scrivo il titolo e il corpo con un pò di stile in CSS
    a.document.write("<p style=\"text-align: center; font: \">Via di Passolombardo, 421 - 00133 Roma<br>Tel: 062026342 - Email: universitalia@tin.it<br>P.Iva: 03914561000</p>");
    a.document.write("<h2>"+titolo+"</h2>");
    a.document.write("<div style='border: 1px solid #CCCCCC'>");
    a.document.write("<table><tr><th>ISBN</th><th>Qta.</th><th>Autore</th><th>Titolo</th><th>Autore</th></tr></table></div>");
    a.document.write("</body></html>");
    a.document.close();

    // Invio il documento alla stampante
    //a.print();
}