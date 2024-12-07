<?php
    class DocumentoController {
        public function __construct() {
            $this->DocumentoModel = new DocumentoModel();
        }

        public function insertar($documento) {
            return $this->DocumentoModel->insertar($documento);
        }

        public function obtenerTodos() {
            return $this->DocumentoModel->obtenerTodos();
        }

        public function obtenerPorId($id) {
            return $this->DocumentoModel->obtenerPorId($id);
        }

        public function validateExistDocumento($num_documento) {
            $documento = $this->DocumentoModel->obtenerPorDocumento($num_documento);
            return (!empty($documento)) ? true : false;
        }
    }