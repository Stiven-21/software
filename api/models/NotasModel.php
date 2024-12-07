<?php
    require_once 'include/Model.class.php';

    class NotasModel extends Model {
        public function __construct() {
            parent::__construct();
        }

        public function insertar($nota) {
            $db_connect = $this->db->connect();
            $sql = "INSERT INTO NOTAS (NOTAS) VALUES (:nota)";
            try {
                $query = $db_connect->prepare($sql);
                $query->execute([':nota' => $nota['nota']]);
                return $db_connect->lastInsertId();
            } catch (PDOException $e) {
                return false;
            }
        }

        public function obtenerTodos() {
            try {
                $query = $this->db->connect()->query("SELECT * FROM NOTAS");
                return $query->fetchAll();
            } catch (PDOException $e) {
                return [];
            }
        }

        public function obtenerPorId($id) {
            $sql = "SELECT * FROM NOTAS WHERE ID_NOTAS = :id";
            try {
                $query = $this->db->connect()->prepare($sql);
                $query->execute([':id' => $id]);
                return $query->fetch();
            } catch (PDOException $e) {
                return [];
            }
        }
    } 