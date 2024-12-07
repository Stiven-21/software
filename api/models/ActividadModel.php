<?php
require_once 'include/Model.class.php';

class ActividadModel extends Model {
    public function __construct(){
        parent::__construct();
    }

    public function crear($titulo, $id_fecha, $id_notas, $id_tipo_actividad) {
        $sql = "INSERT INTO ACTIVIDADES (TITULO, ID_FECHA, ID_NOTAS, ID_TIPO_ACTIVIDAD) 
                VALUES (:titulo, :id_fecha, :id_notas, :id_tipo_actividad)";

        try {
            $query = $this -> db -> connect() -> prepare($sql);
            $query -> execute([
                ':titulo' => $titulo,
                ':id_fecha' => $id_fecha,
                ':id_notas' => $id_notas,
                ':id_tipo_actividad' => $id_tipo_actividad
            ]);
            return $query -> rowCount();
        }catch (PDOException  $e){
            $error = $e->getMessage();
            return [];
        }
    }

    public function obtenerTodas() {
        try {
            $query = $this -> db -> connect() -> query("SELECT * FROM ACTIVIDADES");
            return $query -> fetchAll();
        }catch (PDOException  $e) {
            return [];
        }
    }

    public function obtenerPorId($id) {
        $sql = "SELECT * FROM ACTIVIDADES WHERE ID_ACTIVIDADES = :id";
        
        try{
            $query = $this -> db -> connect() -> prepare($sql);
            $query -> execute([':id' => $id]);
            return $query -> fetch();
        }catch (PDOException  $e){
            return [];
        }
    }

    public function actualizar($id, $titulo, $id_fecha, $id_notas, $id_tipo_actividad) {
        $sql = "UPDATE ACTIVIDADES SET TITULO = :titulo, ID_FECHA = :id_fecha, 
                ID_NOTAS = :id_notas, ID_TIPO_ACTIVIDAD = :id_tipo_actividad 
                WHERE ID_ACTIVIDADES = :id";

        try {
            $query = $this -> db -> connect() -> prepare($sql);
            $query -> execute([
                ':titulo' => $titulo,
                ':id_fecha' => $id_fecha,
                ':id_notas' => $id_notas,
                ':id_tipo_actividad' => $id_tipo_actividad,
                ':id' => $id
            ]);
            return $query -> rowCount();
        }catch (PDOException  $e){
            $error = $e->getMessage();
            return [];
        }
    }

    public function eliminar($id) {
        $sql = "DELETE FROM ACTIVIDADES WHERE ID_ACTIVIDADES = :id";

        try {
            $query = $this -> db -> connect() -> prepare($sql);
            $query -> execute([':id' => $id]);
            return $query -> rowCount();
        }catch (PDOException  $e){
            $error = $e->getMessage();
            return [];
        }
    }
}
