<?php
    class NotasController {
        public function __construct() {
            $this->NotasModel = new NotasModel();
        }

        public function obtenerTodos() {
            return apiResponse(200, 'obtener todos', $this->NotasModel->obtenerTodos());
        }

        public function obtenerPorId($id) {
            if(!$this->validateExistsId($id)) return apiResponse(404, "Nota no encontrada");
           
            return apiResponse(200, 'obtener por id', $this->NotasModel->obtenerPorId($id));
        }

        public function insertar($nota) {
            return apiResponse(200, 'insertar', $this->NotasModel->insertar($nota));
        }

        public function eliminar($id) {
            return apiResponse(200, 'eliminar', $this->NotasModel->eliminar($id));
        }

        public function validateExistsId($id) {
            $nota = $this->NotasModel->obtenerPorId($id);
            return (!empty($nota)) ?  true : false;
    }
}