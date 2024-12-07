<?php
    $AuthController = new AuthController();

    $method = $_SERVER['REQUEST_METHOD'];

    if($method !== 'POST') return apiResponse(405, "El método ".$method." no es permitido en esta ruta");

    $form_registrar = json_decode(file_get_contents('php://input'), true);

    echo json_encode($AuthController->registrar($form_registrar));
