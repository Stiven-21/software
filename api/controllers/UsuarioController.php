<?php

class UsuarioController {
    private $usuario;

    public function __construct() {
        $this->usuario = new UsuarioModel();
    }

    public function crear($data) {
        return $this->usuario->crear($data);
    }

    public function obtenerTodos() {
        return $this->usuario->obtenerTodos();
    }

    public function obtenerPorId($id) {
        return $this->usuario->obtenerPorId($id);
    }

    public function actualizar($id, $data) {
        return $this->usuario->actualizar($id, $data['id_rol'],
        $data['id_persona'], $data['correo'],
        $data['contrasena']);
    }

    public function eliminar($id) {
        return $this->usuario->eliminar($id);
    }

    public function validarExistCorreo($correo) {
        $usuario = $this->usuario->obtenerPorCorreo($correo);
        return (!empty($usuario)) ? true : false;
    }
}

