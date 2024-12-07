<?php
    require_once 'include/Model.class.php';

    class GeneroModel extends Model{
        public function __construct(){
            parent::__construct();
        }

        public function crear($genero) {
            $sql = "INSERT INTO GENERO (GENERO) VALUES (:genero)";
            try {
                $query = $this -> db -> connect() -> prepare($sql);
                $query -> execute([':genero' => $genero['genero']]);
                return $this -> obtenerTodos();
            }catch (PDOException  $e) {
                echo $e -> getMessage();
                return false;
            }
        }

        public function actualizar($id, $genero) {
            $sql = "UPDATE GENERO SET GENERO = :genero WHERE ID_GENERO = :id";
            try {
                $query = $this -> db -> connect() -> prepare($sql);
                $query -> execute([':genero' => $genero['genero'], ':id' => $id]);
                return $this -> obtenerPorId($id); 
            }catch (PDOException  $e) {
                echo $e -> getMessage();
                return false;
            }
        }

        public function obtenerPorId($id) {
            $sql = "SELECT * FROM GENERO WHERE ID_GENERO = :id";
            try {
                $query = $this -> db -> connect() -> prepare($sql);
                $query -> execute([':id' => $id]);
                return $query -> fetch();
            }catch (PDOException  $e) {
                echo $e -> getMessage();
                return [];
            }
        }

        public function obtenerTodos() {
            try {
                $query = $this -> db -> connect() -> query("SELECT * FROM GENERO");
                return $query -> fetchAll();
            }catch (PDOException  $e) {
                echo $e -> getMessage();
                return [];
            }
        }

        public function eliminar($id) {
            $sql = "DELETE FROM GENERO WHERE ID_GENERO = :id";
            try {
                $query = $this -> db -> connect() -> prepare($sql);
                $query -> execute([':id' => $id]);
                return $query -> rowCount();
            }catch (PDOException  $e) {
                echo $e -> getMessage();
                return false;
            }
        }

        public function obtenerPorGenero($genero) {
            $sql = "SELECT * FROM GENERO WHERE GENERO = :genero";
            try {
                $query = $this -> db -> connect() -> prepare($sql);
                $query -> execute([':genero' => $genero]);
                return $query -> fetch();
            }catch (PDOException  $e) {
                echo $e -> getMessage();
                return [];
            }
        }
    }