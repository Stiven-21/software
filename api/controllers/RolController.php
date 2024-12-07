<?php
    class RolController{
        private $RolModel;

        public function __construct(){
            $this->RolModel = new RolModel();
        }

        public function obtenerTodos(){
            return apiResponse(200, 'obtener todos', $this->RolModel->obtenerTodos());
        }

        public function obtenerPorId($id){
            if(!$this->validarExistRolId($id)){
                return apiResponse(404, "Rol no encontrado", $rol);
            }
            return apiResponse(200, 'obtener por id', $this->RolModel->obtenerPorId($id));
        }

        public function validarExistRolId($id){
            $rol = $this->RolModel->obtenerPorId($id);
            return (!empty($rol)) ? true : false;
        }
    }