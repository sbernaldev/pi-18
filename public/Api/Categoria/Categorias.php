<?php
require_once __DIR__ . "/../../../vendor/autoload.php";

use Daw\models\Categoria;

// Inicializo lo que enviará al final la API como respuesta a la petición
$cuerpo_respuesta = [];

$categorias = Categoria::getCategorias();

foreach ($categorias as $key => $datos_categoria) {
    $cuerpo_respuesta[] = $datos_categoria;
}

// Mostramos por pantalla la respuesta de la petición en JSON
$cuerpo_respuestaJSON = json_encode($cuerpo_respuesta);
echo $cuerpo_respuestaJSON;

?>
