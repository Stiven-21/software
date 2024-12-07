<?php
    require_once 'controllers/AuthController.php';

    $AuthController = new AuthController();

    $method = $_SERVER['REQUEST_METHOD'];

    if($method !== 'POST') return apiResponse(405, "El método ".$method." no es permitido en esta ruta");

    $form_login = json_decode(file_get_contents('php://input'), true);

    echo json_encode($AuthController->login($form_login));
