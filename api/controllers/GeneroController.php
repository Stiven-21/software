<?php
    class GeneroController {
        private $GeneroModel;
        
        public function __construct() {
            $this->GeneroModel = new GeneroModel();
        }

        public function crear($form_genero) {
            validateFormData($form_genero, 'genero', 'create');
            $this->validateExistGenero($form_genero['genero']);
            return apiResponse(201, "Genero creado con exito", $this->GeneroModel->crear($form_genero));
        }

        public function actualizar($id, $form_genero) {
            $this->validateExistsId($id);
            validateFormData($form_genero, 'genero', 'update');
            $this->validateExistGenero($form_genero['genero'], $id);
            return apiResponse(201, "Genero actualizado con exito", $this->GeneroModel->actualizar($id, $form_genero));
        }
        
        public function obtenerTodos() {
            return apiResponse(200, 'obtener todos', $this->GeneroModel->obtenerTodos());
        }
        
        public function obtenerPorId($id) {
            return apiResponse(200, 'obtener por id', $this->GeneroModel->obtenerPorId($id));
        }

        public function eliminar($id) {
            $this->validateExistsId($id);
            return apiResponse(200, 'eliminar', $this->GeneroModel->eliminar($id));
        }

        

        private function validateExistsId($id) {
            $genero = $this->GeneroModel->obtenerPorId($id);
            if (empty($genero)) {
                return apiResponse(404, "Genero no encontrado", $genero);
            }
        }

        private function validateExistGenero($nom_genero, $id = null) {
            $genero = $this->GeneroModel->obtenerPorGenero($nom_genero);
            if (!empty($genero) && ($id === null || $genero['ID_GENERO'] != $id)) {
                return apiResponse(409, "Ya existe un género con el nombre '$nom_genero'", $genero);
            }
        }

        public function validarExistGeneroId($id) {
            $genero = $this->GeneroModel->obtenerPorId($id);
            return (!empty($genero)) ? true : false;
        }
    }