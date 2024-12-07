<?php
    class PersonaController {
        public function __construct() {
            $this->PersonaModel = new PersonaModel();
        }

        public function insertar($data_persona) {
            return $this->PersonaModel->insertar($data_persona);
        }

        public function obtenerTodos() {
            return apiResponse(200, 'obtener todos', $this->PersonaModel->obtenerTodos());
        }

        public function obtenerPorId($id) {
            return apiResponse(200, 'obtener por id', $this->PersonaModel->obtenerPorId($id));
        }
    }