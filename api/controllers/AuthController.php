<?php
    class AuthController {
        private $AuthModel;
        private $DocumentoController;
        private $UsuarioController;
        private $GeneroController;
        private $RolController;
        private $TipoDocumentoController;
        private $PersonaController;

        public function __construct() {
            $this->AuthModel = new UsuarioModel();
            $this->DocumentoController = new DocumentoController();
            $this->UsuarioController = new UsuarioController();
            $this->GeneroController = new GeneroController();
            $this->RolController = new RolController();
            $this->TipoDocumentoController = new TipoDocumentoController();
            $this->PersonaController = new PersonaController();
        }

        public function login($form_login) {
            validateformData($form_login, 'login', 'create');
            $usuario_correo = $this->AuthModel->obtenerPorCorreo($form_login['email']);
            
            if(empty($usuario_correo)) {
                return apiResponse(404, "El correo no se encuentra registrado");
            }

            if(!password_verify($form_login['password'], $usuario_correo[4])) {
                return apiResponse(401, "La contraseña es incorrecta");
            }

            return apiResponse(200, "Login exitoso", $usuario_correo);
        }




        public function registrar($form_registrar) {
            validateformData($form_registrar, 'registrar', 'create');

            if($this -> DocumentoController->validateExistDocumento($form_registrar['documento'])){
                return apiResponse(400, "El documento ya se encuentra registrado");
            }

            if($this -> UsuarioController->validarExistCorreo($form_registrar['email'])) {
                return apiResponse(400, "El correo ya se encuentra registrado");
            }

            if(!$this -> GeneroController->validarExistGeneroId($form_registrar['generoId'])) {
                return apiResponse(404, "El genero no se encuentra registrado");
            }

            if(!$this -> RolController->validarExistRolId($form_registrar['rolId'])) {
                return apiResponse(404, "El rol no se encuentra registrado");
            }

            if(!$this -> TipoDocumentoController->validarExistTipoDocumentoId($form_registrar['tipoDocumentoId'])) {
                return apiResponse(404, "El tipo de documento no se encuentra registrado");
            }

            $documentoId = $this->DocumentoController->insertar(['documento' => $form_registrar['documento'], 'id_tipo_doc' => $form_registrar['tipoDocumentoId']]);
            
            $personaId = $this->PersonaController->insertar(['id_documento' => intval($documentoId), 'nombre' => $form_registrar['nombre'], 'id_genero' => $form_registrar['generoId']]);
            
            return ApiResponse(200, "Usuario registrado", $this->UsuarioController->crear([
                'id_rol' => $form_registrar['rolId'], 
                'id_persona' => intval($personaId), 
                'correo' => $form_registrar['email'], 
                'password' => password_hash($form_registrar['password'], PASSWORD_BCRYPT) ]));

        }
    }