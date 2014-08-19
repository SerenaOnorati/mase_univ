/**
 * Created by Serena Onorati on 19/08/14.
 */

function invia_dati(servURL, params, method) {
    method = method || "post"; // il metodo POST è usato di default
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", servURL);
    for(var key in params) {
        var hiddenField = document.createElement("input");
        hiddenField.setAttribute("type", "hidden");
        hiddenField.setAttribute("name", key);
        hiddenField.setAttribute("value", params[key]);
        form.appendChild(hiddenField);
    }
    document.body.appendChild(form);
    form.submit();
}