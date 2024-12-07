<?php
    require_once "./controllers/RouteController.php";
    require_once './Controllers/formsController.php';
    require_once "./controllers/AuthController.php";
    require_once "./controllers/DocumentoController.php";
    require_once "./controllers/UsuarioController.php";
    require_once "./controllers/GeneroController.php";
    require_once "./controllers/RolController.php";
    require_once "./controllers/TipoDocumentoController.php";
    require_once "./controllers/PersonaController.php";
    require_once "./controllers/NotasController.php";

    require_once "./models/ActividadModel.php";
    require_once "./models/UsuarioModel.php";
    require_once "./models/GeneroModel.php";
    require_once "./models/DocumentoModel.php";
    require_once "./models/RolModel.php";
    require_once "./models/TipoDocumentoModel.php";
    require_once "./models/PersonaModel.php";
    require_once "./models/NotasModel.php";

    require_once './middleware/validation.middleware.php';
    require_once './middleware/error.middleware.php';

    require_once "./include/Database.class.php";

    require_once "./config/config.php";

    require_once './utils/response.php';
    require_once './utils/httpStatus.php';
    require_once './utils/update.php';

    require_once './validations/forms.php';

    $route= new RouteController();
    $route->index();