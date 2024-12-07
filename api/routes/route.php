<?php
    $ArrayRoute = explode("/", $_SERVER['REQUEST_URI']);

    // echo "<pre>";print_r($ArrayRoute);echo "</pre>";

    if(count(array_filter($ArrayRoute)) < 3) {
        return apiResponse(404, "No se ha especificado una ruta");
    }

    if(count(array_filter($ArrayRoute)) >= 3) {
        $route_filter = explode("?", array_filter($ArrayRoute)[3]);
        switch ($route_filter[0]) {
            case 'actividad':
                require_once 'actividadRoutes.php';
                break;
            case 'usuario':
                require_once 'usuarioRoutes.php';
                break;
            case 'genero':
                require_once 'generoRoutes.php';
                break;
            case 'login':
                require_once 'loginRoutes.php';
                break;
            case 'registro':
                require_once 'registroRoutes.php';
                break;
            case 'tipo_documento':
                require_once 'tipoDocumentoRoutes.php';
                break;
            case 'notas':
                require_once 'notasRoutes.php';
                break;
            default:
                return apiResponse(404, "La ruta no se ecnuentra disponible");
        }   
    }
    