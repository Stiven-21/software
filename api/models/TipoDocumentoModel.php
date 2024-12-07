<?php
    require_once 'include/Model.class.php';

    class TipoDocumentoModel extends Model{
        public function __construct(){
            parent::__construct();
        }

        public function obtenerTodos(){
            $sql = "SELECT * FROM tipo_doc";
            try{
                $query = $this -> db -> connect() -> query($sql);
                return $query -> fetchAll();
            }catch (PDOException  $e){
                return [];
            }
        }

        public function obtenerPorId($id){
            $sql = "SELECT * FROM tipo_doc WHERE ID_TIPO_DOC = :id";
            try{
                $query = $this -> db -> connect() -> prepare($sql);
                $query -> execute([':id' => $id]);
                return $query -> fetch();
            }catch (PDOException  $e){
                return [];
            }
        }
    }