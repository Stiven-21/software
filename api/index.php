<?php

    require_once "controllers/RouteController.php";

    require_once "models/ActividadModel.php";
    require_once "models/UsuarioModel.php";
    require_once "models/GeneroModel.php";

    require_once "include/Database.class.php";

    require_once "config/config.php";

    $route= new RouteController();
    $route->index();