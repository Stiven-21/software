<?php
    // Establece un manejador de excepciones global.
    // Este código se ejecuta cuando se lanza una excepción no capturada en el código.
    set_exception_handler(function ($exception) {
        apiResponse(500, 'Error Interno del Servidor', $exception->getMessage());
    });

    // Establece un manejador de errores global.
    // Este código se ejecuta cuando ocurre un error en el código (por ejemplo, un error de PHP, como una advertencia o una notificación).
    set_error_handler(function ($severity, $message, $file, $line) {
        apiResponse(500, 'Se produjo un error interno', [
            'error' => $message,
            'file' => $file,
            'line' => $line,
        ]);
    });

    // Registra una función de cierre que se ejecuta al finalizar el script.
    // Este código se ejecuta cuando el script termina y, si hubo un error fatal, se maneja aquí.
    register_shutdown_function(function () {
        $error = error_get_last();  // Obtiene el último error ocurrido (si lo hay).
        if ($error) {
            // Si hubo un error fatal, lo maneja y lo responde como un error 500.
            apiResponse(500, 'Error fatal', $error['message'], [
                'file' => $error['file'],
                'line' => $error['line'],
            ]);
        }
    });
