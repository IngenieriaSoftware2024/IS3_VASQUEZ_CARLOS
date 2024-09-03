<?php 
require_once __DIR__ . '/../includes/app.php';


use MVC\Router;
use Controllers\AppController;
use Controllers\LoginController;

$router = new Router();
$router->setBaseURL('/' . $_ENV['APP_NAME']);

$router->get('/', [LoginController::class,'index']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
