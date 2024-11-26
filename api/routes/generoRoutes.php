<?php
    require_once 'controllers/GeneroController.php';

    $controller = new GeneroController();

    $ArrayRoute = explode("/", $_SERVER['REQUEST_URI']);

    $method = $_SERVER['REQUEST_METHOD'];

    switch (count(array_filter($ArrayRoute))) {
        case 3:
            if($method !== 'GET' && $method !== 'POST') {
                $json = array("error" => "Método no permitido");
                echo json_encode($json, true);
                return;
            }
            // Crear un nuevo género
            if ($method === 'POST') {
                $genero = json_decode(file_get_contents('php://input'), true);
                echo json_encode($controller->crear($genero));
            }
    
            // Obtener todos los géneros
            if ($method === 'GET') {
                echo json_encode($controller->obtenerTodos());
            }

        break;

        case 4:
            if($method !== 'GET' && $method !== 'PUT' && $method !== 'DELETE') {
                $json = array("error" => "Método no permitido");
                echo json_encode($json, true);
                return;
            }
            $id = $ArrayRoute[4];

            // Obtener un género por ID
            if ($method === 'GET') {
                echo json_encode($controller->obtenerPorId($id));
            }

            // Actualizar un género por ID
            if ($method === 'PUT') {
                $genero = json_decode(file_get_contents('php://input'), true);
                echo json_encode($controller->actualizar($id, $genero));
            }

            // Eliminar un género por ID
            if ($method === 'DELETE') {
                echo json_encode($controller->eliminar($id));
            }
            break;

        default:
            $json = array("error" => "Ruta no encontrada");
            echo json_encode($json, true);
            return;
    }
