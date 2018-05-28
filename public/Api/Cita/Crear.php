<?php
require_once __DIR__ . "/../../../vendor/autoload.php";

use Daw\models\Usuario;
use Daw\models\Cita;
use Daw\models\Validador;

// Aquí recojo la petición post que tiene un JSON
$json_decoded = json_decode(file_get_contents('php://input'), true);

// Cojo los datos del JSON y me los guardo
$frase = $json_decoded[0]["frase"];
$id_usuario = $json_decoded[0]["id_usuario"];
$id_clase = $json_decoded[0]["id_clase"];


// Los metemos en el array para trabajar después mejor con foreach
$parametros_entrada = [
    'frase' => $frase,                 // string
    'id_usuario' => $id_usuario,        // int
    'id_clase' => $id_clase     // int
];

// Inicializo lo que enviará al final la API como respuesta a la petición
$cuerpo_respuesta = [
    'validacion' => [                   // string:  vacio, valido, invalido
        'frase' => '',
        'id_usuario' => '',
        'id_clase' => ''
    ],
    'creada' => ''                      // boolean:  true, false
];

// Hacemos las validaciones que deseemos para cada parámetro de entrada
foreach ($parametros_entrada as $key => $value) {
    switch ($key) {
        case 'frase':
            if (Validador::esBlanco($value)) {
                $cuerpo_respuesta["validacion"]["frase"] = "vacio";
            } else {
                    $cuerpo_respuesta["validacion"]["frase"] = "valido";
            }
            break;
        
        case 'id_usuario':
            if (Validador::esBlanco($value)) {
                $cuerpo_respuesta["validacion"]["id_usuario"] = "vacio";
            } else {
                $cuerpo_respuesta["validacion"]["id_usuario"] = "valido";
            }
            break;
        
        case 'id_clase':
            if (Validador::esBlanco($value)){
                $cuerpo_respuesta["validacion"]["id_clase"] = "vacio";
            } else {
                $cuerpo_respuesta["validacion"]["id_clase"] = "valido";
            }
            break;

        default:
            break;
    }
}

// Todos los campos han de ser válidos para procesar finalmente la petición
if (Validador::comprobarValidacion($cuerpo_respuesta)) {
    $cita = new Cita;
    $cita->setFrase("$frase");
    $cita->setId_usuario($id_usuario);
    $cita->setid_clase($id_clase);

    // Una vez en el objeto los datos necesarios, ejecuto el método final y arrojo el resultado
    if ($cita->crearCita()) {
        $cuerpo_respuesta["creada"] = true;
    } else {
        $cuerpo_respuesta["creada"] = false;
    }
} else {
    // Si no ha pasado la validación, digo que no se ha completado
    $cuerpo_respuesta["creada"] = false;
}

// Mostramos por pantalla la respuesta de la petición en JSON
$cuerpo_respuestaJSON = json_encode($cuerpo_respuesta);
echo $cuerpo_respuestaJSON;

?>
