<?php
    require_once 'include/Model.class.php';

    class PersonaModel extends Model{
        public function __construct(){
            parent::__construct();
        }

        public function insertar($persona){
            $db_connect = $this -> db -> connect();
            $sql = "INSERT INTO persona (ID_DOCUMENTO, NOMBRE, ID_GENERO) VALUES (:id_documento, :nombre, :id_genero)";
            try{
                $query = $db_connect -> prepare($sql);
                $query -> execute([':id_documento' => $persona['id_documento'], ':nombre' => $persona['nombre'], ':id_genero' => $persona['id_genero']]);
                return $db_connect -> lastInsertId();
            }catch (PDOException  $e){
                echo $e -> getMessage();
                return false;
            }
        }

        public function obtenerTodos(){
            $sql = "SELECT * FROM persona";
            try{
                $query = $this -> db -> connect() -> query($sql);
                return $query -> fetchAll();
            }catch (PDOException  $e){
                return [];
            }
        }

        public function obtenerPorId($id){
            $sql = "SELECT * FROM persona WHERE ID_PERSONA = :id";
            try{
                $query = $this -> db -> connect() -> prepare($sql);
                $query -> execute([':id' => $id]);
                return $query -> fetch();
            }catch (PDOException  $e){
                echo $e -> getMessage();
                return [];
            }
        }
    }