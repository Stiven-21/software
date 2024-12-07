<?php
    require_once 'include/Model.class.php';

    class DocumentoModel extends Model {
        public function __construct() {
            parent::__construct();
        }

        public function insertar($documento) {
            $db_connect = $this -> db -> connect();
            $sql = "INSERT INTO documento (NUM_DOC, ID_TIPO_DOC) VALUES (:documento, :id_tipo_doc)";
            try {
                $query = $db_connect -> prepare($sql);
                $query -> execute([':documento' => $documento['documento'], ':id_tipo_doc' => $documento['id_tipo_doc']]);
                return $db_connect -> lastInsertId();
            } catch (PDOException $e) {
                echo $e -> getMessage();
                return false;
            }
        }

        public function obtenerTodos() {
            $sql = "SELECT * FROM documento";
            try {
                $query = $this -> db -> connect() -> query($sql);
                return $query -> fetchAll();
            } catch (PDOException $e) {
                echo $e -> getMessage();
                return [];
            }
        }

        public function obtenerPorId($id) {
            $sql = "SELECT * FROM documento WHERE id = :id";
            try {
                $query = $this -> db -> connect() -> prepare($sql);
                $query -> execute([':id' => $id]);
                return $query -> fetch();
            } catch (PDOException $e) {
                echo $e -> getMessage();
                return [];
            }
        }

        public function obtenerPorDocumento($documento) {
            $sql = "SELECT * FROM documento WHERE NUM_DOC = :documento";
            try {
                $query = $this -> db -> connect() -> prepare($sql);
                $query -> execute([':documento' => $documento]);
                return $query -> fetch();
            } catch (PDOException $e) {
                echo $e -> getMessage();
                return [];
            }
        }
    }