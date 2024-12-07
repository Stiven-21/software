<?php
    return [
        'genero' => [
            'genero' => ['required' => true, 'type' => 'string', 'maxLength' => 100, 'minLength' => 1],
        ],
        'login' => [
            'email' => ['required' => true, 'type' => 'string', 'regex' => '/^[^@]+@[^@]+\.[a-zA-Z]{2,}$/'],
            'password' => ['required' => true, 'type' => 'string', 'minLength' => 8]
        ],
        'registrar' => [
            'email' => ['required' => true, 'type' => 'string', 'regex' => '/^[^@]+@[^@]+\.[a-zA-Z]{2,}$/'],
            'password' => ['required' => true, 'type' => 'string', 'minLength' => 8],
            'rolId' => ['required' => true, 'type' => 'number', 'minLength' => 1],
            'nombre' => ['required' => true, 'type' => 'string', 'minLength' => 1],
            'generoId' => ['required' => true, 'type' => 'number', 'minLength' => 1],
            'tipoDocumentoId' => ['required' => true, 'type' => 'number', 'minLength' => 1],
            'documento' => ['required' => true, 'type' => 'string', 'minLength' => 1]
        ],
        'notas' => [
            'nota' => ['required' => true, 'type' => 'string', 'minLength' => 1]
        ]
    ];