<?php
require_once 'include/Model.class.php';

class UsuarioModel extends Model {
    public function __construct(){
        parent::__construct();
    }

    public function crear($data) {
        $sql = "INSERT INTO Usuario (ID_ROL, ID_PERSONA, CORREO, CONTRASEÑA) 
                VALUES (:id_rol, :id_persona, :correo, :contrasena)";

        try {
            $query = $this -> db -> connect() -> prepare($sql);
            $query -> execute([
                ':id_rol' => $data['id_rol'],
                ':id_persona' => $data['id_persona'],
                ':correo' => $data['correo'],
                ':contrasena' => $data['password']
            ]);
            return $query -> rowCount();
        }catch (PDOException  $e){
            $error = $e->getMessage();
            return [];
        }
    }

    public function obtenerTodos() {
        $sql = "SELECT Usuario.*, PERSONA.NOMBRE, ROL.ROL 
                FROM Usuario 
                JOIN PERSONA ON Usuario.ID_PERSONA = PERSONA.ID_PERSONA
                JOIN ROL ON Usuario.ID_ROL = ROL.ID_ROL";
        try{
            $query = $this -> db -> connect() -> query($sql);
            return $query -> fetchAll();
        }catch (PDOException  $e){
            return [];
        }
    }

    public function obtenerPorId($id) {
        $sql = "SELECT Usuario.*, PERSONA.NOMBRE, ROL.ROL 
                FROM Usuario 
                JOIN PERSONA ON Usuario.ID_PERSONA = PERSONA.ID_PERSONA
                JOIN ROL ON Usuario.ID_ROL = ROL.ID_ROL
                WHERE Usuario.ID_USUARIO = :id";
        try{
            $query = $this -> db -> connect() -> prepare($sql);
            $query -> execute([':id' => $id]);
            return $query -> fetch();
        }catch (PDOException  $e){
            return [];
        }
    }

    public function actualizar($id, $id_rol, $id_persona, $correo, $contrasena) {
        $sql = "UPDATE Usuario SET 
                ID_ROL = :id_rol, 
                ID_PERSONA = :id_persona, 
                CORREO = :correo, 
                CONTRASEÑA = :contrasena 
                WHERE ID_USUARIO = :id";
        try{
            $query = $this -> db -> connect() -> prepare($sql);
            $query -> execute([
                ':id_rol' => $id_rol,
                ':id_persona' => $id_persona,
                ':correo' => $correo,
                ':contrasena' => password_hash($contrasena, PASSWORD_BCRYPT),
                ':id' => $id
            ]);
            return $query -> rowCount();
        }catch (PDOException  $e){
            return [];
        }
    }

    public function eliminar($id) {
       try{
            $sql = "DELETE FROM Usuario WHERE ID_USUARIO = :id";
            $query = $this -> db -> connect() -> prepare($sql);
            $query -> execute([':id' => $id]);
            return $query -> rowCount();
       }catch (PDOException  $e){    
            return [];
       }
    }

    public function obtenerPorCorreo($correo) {
        $sql = "SELECT * FROM Usuario WHERE CORREO = :correo";
        try{
            $query = $this -> db -> connect() -> prepare($sql);
            $query -> execute([':correo' => $correo]);
            return $query -> fetch();
        }catch (PDOException  $e){
            return [];
        }
    }
}
