<?php
    require_once 'controllers/TipoDocumentoController.php';

    $controller = new TipoDocumentoController();

    $ArrayRoute = explode("/", $_SERVER['REQUEST_URI']);

    $method = $_SERVER['REQUEST_METHOD'];

    switch (count(array_filter($ArrayRoute))) {
        case 3:
            if($method !== 'GET') {
                return apiResponse(405, "El método ".$method." no es permitido en esta ruta");
            }
            // Obtener todos los géneros
            if ($method === 'GET') {
                echo json_encode($controller->obtenerTodos());
            }

        break;
        case 4:

            if($method !== 'GET') {
                return apiResponse(405, "El método ".$method." no es permitido en esta ruta");
            }
            $explode = explode("?", $ArrayRoute[4]);
            $id = $explode[0];

            // Obtener un género por ID
            if ($method === 'GET') {
                echo json_encode($controller->obtenerPorId($id));
            }
            break;

        default:
            return apiResponse(404, "La ruta no se ecnuentra disponible");
    }