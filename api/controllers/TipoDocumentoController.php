<?php
    class TipoDocumentoController{
        public function __construct() {
            $this->TipoDocumentoModel = new TipoDocumentoModel();
        }

        public function obtenerTodos() {
            return apiResponse(200, 'obtener todos', $this->TipoDocumentoModel->obtenerTodos());
        }

        public function obtenerPorId($id) {
            if(!$this->validarExistTipoDocumentoId($id)) {
                return apiResponse(404, "Tipo de documento no encontrado", $this->TipoDocumentoModel->obtenerPorId($id));
            }

            return apiResponse(200, 'obtener por id', $this->TipoDocumentoModel->obtenerPorId($id));
        }

        public function validarExistTipoDocumentoId($id) {
            $rol = $this->TipoDocumentoModel->obtenerPorId($id);
            return (!empty($rol)) ? true : false;
        }
    }