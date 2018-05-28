<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Daw\Models\Sesion;

Sesion::start();
Sesion::destroy();

header("Location: /");

?>