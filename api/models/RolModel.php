<?php
    require_once 'include/Model.class.php';

    class RolModel extends Model{
        public function __construct(){
            parent::__construct();
        }

        public function obtenerTodos(){
            $sql = "SELECT * FROM rol";
            try{
                $query = $this -> db -> connect() -> query($sql);
                return $query -> fetchAll();
            }catch (PDOException  $e){
                return [];
            }
        }

        public function obtenerPorId($id){
            $sql = "SELECT * FROM rol WHERE ID_ROL = :id";
            try{
                $query = $this -> db -> connect() -> prepare($sql);
                $query -> execute([':id' => $id]);
                return $query -> fetch();
            }catch (PDOException  $e){
                return [];
            }
        }
    }