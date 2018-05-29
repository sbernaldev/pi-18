function peticion(){
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
    var id_usuario = document.getElementById("id_usuario").value;
    var frase = document.getElementById("frase").value;
    var id_clase = document.getElementById("id_categoria").value;


    // Inicio la peticion de escucha
    http_request.onreadystatechange = capturaPeticion;
    http_request.open('POST', "/Api/Cita/Crear.php", false);

    // Construyo el JSON de la petición
    http_request.setRequestHeader("Content-type", "application/json");
    
    var req_body = [
        {
            'id_usuario': id_usuario,       // int
            'frase': frase,                 // string
            'id_clase': id_clase            // int
        }
    ];
    console.log(JSON.stringify(req_body));

    // Enviamos los datos de la petición
    http_request.send(JSON.stringify(req_body));
}

// Manejar la respuesta que nos da la API
function capturaPeticion() {
    // Comprueba que se ha recibido la respuesta
    if (http_request.readyState == 4) {
        
        if (http_request.status == 200) {
            // Convertimos el JSON a un array
            var responseJSON=JSON.parse(http_request.responseText);
            console.log(responseJSON);

            // Manejamos cada tipo de respuesta. Un if por cada validación
            if (responseJSON["validacion"]["id_usuario"] != "valido" ){
                switch (responseJSON["validacion"]["id_usuario"]) {
                    case "vacio":
                        alert("El campo id_usuario está vacio");
                        break;
                    case "invalido":
                        alert("El campo id_usuario no es válido");
                        break;
                    default:
                        break;
                }
            }
            if (responseJSON["validacion"]["frase"] != "valido" ){
                switch (responseJSON["validacion"]["frase"]) {
                    case "vacio":
                        alert("El campo frase está vacio");
                        break;
                    case "invalido":
                        alert("El campo frase no es válido");
                        break;
                    default:
                        break;
                }
            }
            if (responseJSON["validacion"]["id_categoria"] != "valido" ){
                switch (responseJSON["validacion"]["id_categoria"]) {
                    case "vacio":
                        alert("El campo id_categoria está vacio");
                        break;
                    case "invalido":
                        alert("El campo id_categoria no es válido");
                        break;
                    default:
                        break;
                }
            }
        } else {
            alert("Ha ocurrido un error con la conexión.");
            return false;
        }
    }
}