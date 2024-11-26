<?php
    $ArrayRoute = explode("/", $_SERVER['REQUEST_URI']);

    // echo "<pre>";print_r($ArrayRoute);echo "</pre>";

    if(count(array_filter($ArrayRoute)) < 3) {
        $json = array("error" => "Ruta no encontrada");
        echo json_encode($json, true);
        return;
    }

    if(count(array_filter($ArrayRoute)) >= 3) {
        switch (array_filter($ArrayRoute)[3]) {
            case 'actividad':
                require_once 'actividadRoutes.php';
                break;
            case 'usuario':
                require_once 'usuarioRoutes.php';
                break;
            case 'genero':
                require_once 'generoRoutes.php';
                break;
            default:
                $json = array("error" => "Ruta no encontrada");
                echo json_encode($json, true);
                return;
        }   
    }
    