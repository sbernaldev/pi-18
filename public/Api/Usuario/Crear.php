<?php
require_once __DIR__ . "/../../../vendor/autoload.php";

use Daw\models\Usuario;
use Daw\models\Validador;

// Aquí recojo la petición post que tiene un JSON
$json_decoded = json_decode(file_get_contents('php://input'), true);

// Cojo los datos del JSON y me los guardo
$correo = $json_decoded["correo"];
$correoConfirmacion = $json_decoded["correoConfirmacion"];
$nom_usuario = $json_decoded["nom_usuario"];
$nombre = $json_decoded["nombre"];
$apellido = $json_decoded["apellido"];
$contrasenya = $json_decoded["contrasenya"];
$repiteContrasenya = $json_decoded["repiteContrasenya"];

// Los metemos en el array para trabajar después mejor con foreach
$parametros_entrada = [
    'correo' => $correo,                            // string
    'correoConfirmacion' => $correoConfirmacion,    // string
    'nom_usuario' => $nom_usuario,                  // string
    'nombre' => $nombre,                            // string
    'apellido' => $apellido,                        // string
    'contrasenya' => $contrasenya,                 // string
    'repiteContrasenya' => $repiteContrasenya
];

// Inicializo lo que enviará al final la API como respuesta a la petición
$cuerpo_respuesta = [
    'validacion' => [                   // string:  vacio, valido, invalido
        'correo' => '',                 // string:  + no_disponible
        'correoConfirmacion' => '',
        'nom_usuario' => '',            // string:  + no_disponible
        'nombre' => '',
        'apellido' => '',
        'contrasenya' => '',
        'repiteContrasenya' => ''
    ],
    'registrado' => ''                  // boolean:  true, false
];

// Aquí almacenaremos el correo de manera temporal para comparar con correoConfirmacion
$correo = "";

// Hacemos las validaciones que deseemos para cada parámetro de entrada
foreach ($parametros_entrada as $key => $value) {
    switch ($key) {
        case 'correo':
            $correo = $value;
            if (Validador::esBlanco($value)){
                $cuerpo_respuesta["validacion"]["correo"] = "vacio";
            } elseif (!Validador::estaDisponible('correo', $value)){
                $cuerpo_respuesta["validacion"]["correo"] = "no_disponible";
            } else {
                $cuerpo_respuesta["validacion"]["correo"] = "valido";
            }
            break;

        case 'correoConfirmacion':
            if (Validador::esBlanco($value)){
                $cuerpo_respuesta["validacion"]["correoConfirmacion"] = "vacio";
            } elseif (!Validador::esIdentico($value, $correo)) {
                $cuerpo_respuesta["validacion"]["correoConfirmacion"] = "invalido";
            } else {
                $cuerpo_respuesta["validacion"]["correoConfirmacion"] = "valido";
            }
            break;

        case 'nom_usuario':
            if (Validador::esBlanco($value)){
                $cuerpo_respuesta["validacion"]["nom_usuario"] = "vacio";
            } elseif (!Validador::estaDisponible('usuario', $value)) {
                $cuerpo_respuesta["validacion"]["nom_usuario"] = "no_disponible";
            } else {
                $cuerpo_respuesta["validacion"]["nom_usuario"] = "valido";
            }
            break;

        case 'nombre':
            if (Validador::esBlanco($value)){
                $cuerpo_respuesta["validacion"]["nombre"] = "vacio";
            } else {
                $cuerpo_respuesta["validacion"]["nombre"] = "valido";
            }
            break;

        case 'apellido':
            if (Validador::esBlanco($value)){
                $cuerpo_respuesta["validacion"]["apellido"] = "vacio";
            } else {
                $cuerpo_respuesta["validacion"]["apellido"] = "valido";
            }
            break;

        case 'contrasenya':
            $contrasenya = $value;
            if (Validador::esBlanco($value)){
                $cuerpo_respuesta["validacion"]["contrasenya"] = "vacio";
            } else {
                $cuerpo_respuesta["validacion"]["contrasenya"] = "valido";
            }
            break;

        case 'repiteContrasenya':
            if (Validador::esBlanco($value)){
                $cuerpo_respuesta["validacion"]["repiteContrasenya"] = "vacio";
            } elseif (!Validador::esIdentico($value, $contrasenya)) {
                $cuerpo_respuesta["validacion"]["repiteContrasenya"] = "invalido";
            } else {
                $cuerpo_respuesta["validacion"]["repiteContrasenya"] = "valido";
            }
            break;

        default:
            break;
    }
}

// Todos los campos han de ser válidos para procesar finalmente la petición
if (Validador::comprobarValidacion($cuerpo_respuesta)) {
    $usuario = new Usuario;
    $usuario->setCorreo("$correo");
    $usuario->setNom_usuario("$nom_usuario");
    $usuario->setNombre("$nombre");
    $usuario->setApellido("$apellido");
    $contrasenya_hashed = password_hash("$contrasenya", PASSWORD_DEFAULT);
    $usuario->setContrasenya("$contrasenya_hashed");

    // Una vez en el objeto los datos necesarios, ejecuto el método final y arrojo el resultado
    if ($usuario->crearUsuario()){
        $cuerpo_respuesta["registrado"] = true;
    } else {
        $cuerpo_respuesta["registrado"] = false;
    }
} else {
    // Si no ha pasado la validación, digo que no se ha completado
    $cuerpo_respuesta["registrado"] = false;
}

// Mostramos por pantalla la respuesta de la petición en JSON
$cuerpo_respuestaJSON = json_encode($cuerpo_respuesta);
echo $cuerpo_respuestaJSON;
?>
