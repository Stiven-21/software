<?php
    require_once 'controllers/GeneroController.php';

    $controller = new GeneroController();

    $ArrayRoute = explode("/", $_SERVER['REQUEST_URI']);

    $method = $_SERVER['REQUEST_METHOD'];

    switch (count(array_filter($ArrayRoute))) {
        case 3:
            if($method !== 'GET' && $method !== 'POST') {
                return apiResponse(405, "El método ".$method." no es permitido en esta ruta");
            }
            // Crear un nuevo género
            if ($method === 'POST') {
                $form_genero = json_decode(file_get_contents('php://input'), true);
                echo json_encode($controller->crear($form_genero));
            }
    
            // Obtener todos los géneros
            if ($method === 'GET') {
                echo json_encode($controller->obtenerTodos());
            }

        break;

        case 4:

            if($method !== 'GET' && $method !== 'PUT' && $method !== 'DELETE') {
                return apiResponse(405, "El método ".$method." no es permitido en esta ruta");
            }
            $explode = explode("?", $ArrayRoute[4]);
            $id = $explode[0];

            // Obtener un género por ID
            if ($method === 'GET') {
                echo json_encode($controller->obtenerPorId($id));
            }

            // Actualizar un género por ID
            if ($method === 'PUT') {
                $form_genero = json_decode(file_get_contents('php://input'), true);
                echo json_encode($controller->actualizar($id, $form_genero));
            }

            // Eliminar un género por ID
            if ($method === 'DELETE') {
                echo json_encode($controller->eliminar($id));
            }
            break;

        default:
            return apiResponse(404, "La ruta no se ecnuentra disponible");
            break;
    }
