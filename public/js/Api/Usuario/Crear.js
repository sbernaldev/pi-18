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
    var correo = document.getElementById("correo").value;
    var correoConfirmacion = document.getElementById("correoConfirmacion").value;
    var nom_usuario = document.getElementById("nom_usuario").value;
    var nombre = document.getElementById("nombre").value;
    var apellido = document.getElementById("apellido").value;
    var contrasenya = document.getElementById("contrasenya").value;
    var repiteContrasenya = document.getElementById("repiteContrasenya").value;

    // Inicio la peticion de escucha
    http_request.onreadystatechange = capturaPeticion();
    http_request.open('POST', "./Api/Usuario/Crear.php", false);

    // Construyo el JSON de la petición
    http_request.setRequestHeader("Content-type", "application/json");
    var req_body = [
        {
            'correo': correo,                            // string
            'correoConfirmacion': correoConfirmacion,    // string
            'nom_usuario': nom_usuario,                  // string
            'nombre': nombre,                            // string
            'apellido': apellido,                        // string
            'contrasenya': contrasenya,                  // string
            'repiteContrasenya': repiteContrasenya      // string
        }
    ];
    // console.log(JSON.stringify(req_body));
    
    // Enviamos los datos de la petición
    http_request.send(JSON.stringify(req_body));
}

// Manejar la respuesta que nos da la API
function capturaPeticion() {
    // Comprueba que se ha recibido la respuesta
    if (http_request.readyState == 4) {

        // Convertimos el JSON a un array
        var responseJSON=JSON.parse(http_request.responseText);
        console.log(responseJSON);
        // Manejamos cada tipo de respuesta. Un if por cada validación
        if (responseJSON["validacion"]["correo"] != "valido" ){
            switch (responseJSON["validacion"]["correo"]) {
                case "vacio":
                    alert("El campo nombre está vacio");
                    break;
                case "invalido":
                    alert("El campo nombre no es válido");
                    break;
                case "no_disponible":
                    alert("El campo nombre no es válido");
                    break;
                default:
                    break;
            }
        }

        if (responseJSON["validacion"]["correoConfirmacion"] != "valido" ){
            switch (responseJSON["validacion"]["correoConfirmacion"]) {
                case "vacio":
                    alert("El campo confirmar correo está vacio");
                    break;
                case "invalido":
                    alert("El campo confirmar correo no es válido");
                    break;
                default:
                    break;
            }
        }

        if (responseJSON["validacion"]["nom_usuario"] != "valido" ){
            switch (responseJSON["validacion"]["nom_usuario"]) {
                case "vacio":
                    alert("El campo nombre de usuario está vacio");
                    break;
                case "invalido":
                    alert("El campo nombre de usuario no es válido");
                    break;
                case "no_disponible":
                    alert("El campo nombre de usuario no está disponible");
                    break;
                default:
                    break;
            }
        }

        if (responseJSON["validacion"]["nombre"] != "valido" ){
            switch (responseJSON["validacion"]["nombre"]) {
                case "vacio":
                    alert("El campo nombre está vacio");
                    break;
                case "invalido":
                    alert("El campo nombre no es válido");
                    break;
                default:
                    break;
            }
        }

        if (responseJSON["validacion"]["apellido"] != "valido" ){
            switch (responseJSON["validacion"]["apellido"]) {
                case "vacio":
                    alert("El campo apellido está vacio");
                    break;
                case "invalido":
                    alert("El campo apellido no es válido");
                    break;
                default:
                    break;
            }
        }

        if (responseJSON["validacion"]["contrasenya"] != "valido" ){
            switch (responseJSON["validacion"]["contrasenya"]) {
                case "vacio":
                    alert("El campo contraseña está vacio");
                    break;
                case "invalido":
                    alert("El campo contraseña no es válido");
                    break;
                default:
                    break;
            }
        }

        if (responseJSON["validacion"]["repiteContrasenya"] != "valido" ){
            switch (responseJSON["validacion"]["repiteContrasenya"]) {
                case "vacio":
                    alert("El campo repite contraseña está vacio");
                    break;
                case "invalido":
                    alert("El campo repite contraseña no es válido");
                    break;
                default:
                    break;
            }
        }

        // Si la request se ha completado satisfactoriamente aviso al usuario
        if (responseJSON["registrado"] == true){
            alert("El usuario ha sido dado de alta correctamente.")
            return true;
        }
    } else {
        alert("Ha ocurrido un error con la conexión.");
        return false;
    }
}
