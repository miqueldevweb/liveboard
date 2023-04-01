<?php
declare(strict_types=1);

require './../../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

//Enrutador de peticiones -- punto de entrada y salida

$request = Request::createFromGlobals();
$method = $request->getMethod();
$service = $request->getBasePath();

// Obtiene la ruta de la solicitud actual
$request_uri = $_SERVER['REQUEST_URI'];
$base_path = '/v1';

// Quita la base de la ruta de la solicitud
$path = substr($request_uri, strlen($base_path));

// Procesa la ruta y responde en consecuencia
if ($path == '/cocotero') {
    // Aquí, maneja la solicitud para el servicio "cocotero"
    echo "Has solicitado el servicio cocotero";
} elseif ($path == '/otro-servicio') {
    // Aquí, maneja la solicitud para el servicio "otro-servicio"
    echo "Has solicitado el servicio otro-servicio";
} else {
    // Aquí, maneja las solicitudes no válidas o desconocidas
    echo "Servicio no válido o desconocido: {$path}";
}

