function peticion(req){
    http_request = false;

    //Generamos el objeto XMLHttpRequest dependiendo del navegador
    if (window.XMLHttpRequest) { // Mozilla, Safari,...
        http_request = new XMLHttpRequest();
        if (http_request.overrideMimeType) {
            http_request.overrideMimeType('text/xml');
            // Ver nota sobre esta linea al final
        }
        console.log(window.XMLHttpRequest);
    } else if (window.ActiveXObject) { // IE
        try {
            http_request = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                http_request = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {}
        }
    }
    //Comprobamos que se ha podido generar
    if (!http_request) {
        alert('No es posible crear una instancia XMLHTTP');
        return false;
    }

    // Recojemos los parámetros del formulario
    var nombre = document.getElementById("nombre").value;
    var apellidos = document.getElementById("apellidos").value;

    // Inicio la peticion de escucha
    http_request.onreadystatechange = capturaPeticion();
    http_request.open('POST', "./Api/Usuario/Crear.php", false);

    // Construyo el JSON de la petición
    http_request.setRequestHeader("Content-type", "application/json");
    var req_body = [
        {
            'nombre': nombre,
            'apellidos': apellidos
        }
    ];
    // console.log(JSON.stringify(req_body));
    
    // Enviamos los datos de la petición
    http_request.send(JSON.stringify(req_body));
}

function capturaPeticion() {

    if (http_request.readyState == 4) { // 4 = DONE
        // OK en la respuesta. Convertimos el JSON a un array
        var responseJSON=JSON.parse(http_request.responseText);
        if (responseJSON["babfuibadsuofbd"] == "available"){
            if (responseJSON["aksdasksdnias"] == "registered") {
                alert("El usuario ha sido dado de alta correctamente.")
                return true;
            } else {
                alert("Ha ocurrido un error. Revisa todos los campos, no pueden estar vacíos.");
                return false;
            }
        } else {
            alert("El correo electrónico está escogido, utiliza otro.");
            return false;
        }
    }

}
