function peticion() {

    // Tomo el valor de los campos del formulario
    correo = $("#correo").val();
    correoConfirmacion = $("#correoConfirmacion").val();
    nom_usuario = $("#nom_usuario").val();
    nombre = $("#nombre").val();
    apellido = $("#apellido").val();
    contrasenya = $("#contrasenya").val();
    repiteContrasenya = $("#repiteContrasenya").val();

    // Creo la petición POST por AJAX
    // La sintaxis es $.post(URL,Body,Callback)
    $.post("/Api/Usuario/Crear.php", //Required URL of the page on server
    {
        'correo': correo,                            // string
        'correoConfirmacion': correoConfirmacion,    // string
        'nom_usuario': nom_usuario,                  // string
        'nombre': nombre,                            // string
        'apellido': apellido,                        // string
        'contrasenya': contrasenya,                  // string
        'repiteContrasenya': repiteContrasenya       // string
    },
    function(response, status) {
        responseJSON = JSON.parse(response);
        console.log(respuesta);
        respuesta(responseJSON);
    })
}

function respuesta(responseJSON) {
       // Manejamos cada tipo de respuesta. Un if por cada validación
       if (responseJSON["validacion"]["correo"] != "valido" ){
        switch (responseJSON["validacion"]["correo"]) {
            case "vacio":
                alert("El campo correo está vacio");
                break;
            case "invalido":
                alert("El campo correo no es válido");
                break;
            case "no_disponible":
                alert("El campo correo no está disnponible");
                break;
            default:
                break;
        }
    }

    if (responseJSON["validacion"]["correoConfirmacion"] != "valido" ){
        switch (responseJSON["validacion"]["correoConfirmacion"]) {
            case "vacio":
                alert("El campo de confirmar correo está vacio");
                break;
            case "invalido":
                alert("El campo de confirmar correo no es válido");
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
                alert("El nombre de usuario no está disponible");
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
    } else {
        alert("El usuario no ha podido darse de alta correctamente.")
        return false;
    }
}
