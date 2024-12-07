<?php
    function apiResponse($code, $description = '', $data = null) {
        $statusMessages = require 'httpStatus.php';
        $message = $statusMessages[$code] ?? 'Estado desconocido';

        http_response_code($code);

        $response = [
            'code' => $code,
            'message' => $message,
            'description' => $description,
        ];

        if (!is_null($data)) {
            $response['data'] = $data;
        }

        echo json_encode($response);
        exit;
    }
