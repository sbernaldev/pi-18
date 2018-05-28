<?php
require_once __DIR__ . "/../../../vendor/autoload.php";

use Daw\models\Cita;

// Inicializo lo que enviará al final la API como respuesta a la petición
$cuerpo_respuesta = [];

if (isset($_GET["cantidad"])) {
    $cantidad = $_GET["cantidad"]; // integer / empty
} else {
    $cantidad = "";
}

if (isset($_GET["ordenar_por"])) {
    $ordenar_por = $_GET["ordenar_por"];
} else {
    $ordenar_por = "fecha";
}

$params = [
    "cantidad" => $cantidad,
    "ordenar_por" => $ordenar_por
];

$citas = Cita::getCitas($params);

foreach ($citas as $key => $datos_cita) {
    $cuerpo_respuesta[] = $datos_cita;
}

// Mostramos por pantalla la respuesta de la petición en JSON
$cuerpo_respuestaJSON = json_encode($cuerpo_respuesta);
echo $cuerpo_respuestaJSON;

?>
