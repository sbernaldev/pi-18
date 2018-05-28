<?php
require_once __DIR__ . "/../../../vendor/autoload.php";

use Daw\models\Usuario;
use Daw\models\Validador;
use Daw\models\Sesion;

// Aquí recojo la petición post que tiene un JSON
$json_decoded = json_decode(file_get_contents('php://input'), true);

// Cojo los datos del JSON y me los guardo
$nom_usuario = $json_decoded[0]["nom_usuario"];
$contrasenya = $json_decoded[0]["contrasenya"];


// Los metemos en el array para trabajar después mejor con foreach
$parametros_entrada = [
    'nom_usuario' => $nom_usuario,                  // string
    'contrasenya' => $contrasenya                   // string

];

// Inicializo lo que enviará al final la API como respuesta a la petición
$cuerpo_respuesta = [
    'validacion' => [                   // string:  vacio, valido, invalido
        'nom_usuario' => '',            // string:  + no_disponible
        'contrasenya' => ''
    ],
    'logeado' => ''                  // boolean:  true, false
];


// Hacemos las validaciones que deseemos para cada parámetro de entrada
foreach ($parametros_entrada as $key => $value) {
    switch ($key) {

        case 'nom_usuario':
            if (Validador::esBlanco($value)){
                $cuerpo_respuesta["validacion"]["nom_usuario"] = "vacio";
            } else {
                $cuerpo_respuesta["validacion"]["nom_usuario"] = "valido";
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

        default:
            break;
    }
}

// Todos los campos han de ser válidos para procesar finalmente la petición
if (Validador::comprobarValidacion($cuerpo_respuesta)) {
    $usuario = new Usuario;
    $usuario->setNom_usuario("$nom_usuario");
    $contrasenya_hashed = password_hash("$contrasenya", PASSWORD_DEFAULT);
    $usuario->setContrasenya("$contrasenya");

    // Una vez en el objeto los datos necesarios, ejecuto el método final y arrojo el resultado
    if ($usuario->login()){
        $cuerpo_respuesta["logeado"] = true;
    } else {
        $cuerpo_respuesta["logeado"] = false;
    }
} else {
    // Si no ha pasado la validación, digo que no se ha completado
    $cuerpo_respuesta["logeado"] = false;
}

// Mostramos por pantalla la respuesta de la petición en JSON
$cuerpo_respuestaJSON = json_encode($cuerpo_respuesta);
echo $cuerpo_respuestaJSON;
?>
