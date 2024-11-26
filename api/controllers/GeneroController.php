<?php
    class GeneroController {
        private $genero;
        
        public function __construct() {
            $this->genero = new GeneroModel();
        }

        public function crear($genero) {
            return $this->genero->crear($genero);
        }

        public function actualizar($id, $genero) {
            return $this->genero->actualizar($id, $genero);
        }
        
        public function obtenerTodos() {
            return $this->genero->obtenerTodos();
        }
        
        public function obtenerPorId($id) {
            return $this->genero->obtenerPorId($id);
        }

        public function eliminar($id) {
            return $this->genero->eliminar($id);
        }
    }