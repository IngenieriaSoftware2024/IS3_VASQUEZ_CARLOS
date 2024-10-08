<?php 
require_once __DIR__ . '/../includes/app.php';


use MVC\Router;
use Controllers\AppController;
use Controllers\EnvioController;
use Controllers\LoginController;

$router = new Router();
$router->setBaseURL('/' . $_ENV['APP_NAME']);

$router->get('/', [LoginController::class,'index']);
$router->post('/API/login', [LoginController::class,'loginAPI']);
$router->get('/inicio', [LoginController::class, 'inicio']);
$router->get('/logout', [LoginController::class, 'logout']);

// NVIOS

$router->get('/envios', [EnvioController::class,'index']);
$router->get('/API/envios/buscar', [EnvioController::class,'buscarAPI']);
$router->get('/estadistica', [EnvioController::class,'index2']);
$router->get('/API/envio/estadistica', [EnvioController::class,'estadisticaEnvioAPI']);
$router->get('/mapa', [EnvioController::class,'index3']);
$router->get('/API/envio/mapa', [EnvioController::class,'mapaAPI']);






// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
