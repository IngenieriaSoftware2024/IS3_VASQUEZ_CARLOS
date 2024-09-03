<?php

namespace Controllers;

use Exception;
use Model\Usuario;
use MVC\Router;

class EnvioController {
    public static function index(Router $router)
    {   
        isAuth();
        hasPermission(['USER', 'ADMINISTRATIVO', 'ADMINSTRADOR']);
        $router->render('envios/index', [], 'layouts/menu');
    }
    public static function index2(Router $router)
    {   
        isAuth();
        hasPermission(['USER', 'ADMINISTRATIVO', 'ADMINSTRADOR']);
        $router->render('envios/estadistica', [], 'layouts/menu');
    }
    public static function index3(Router $router)
    {   
        isAuth();
        hasPermission(['USER', 'ADMINISTRATIVO', 'ADMINSTRADOR']);
        $router->render('envios/mapa', [], 'layouts/menu');
    }

    public static function BuscarAPI()
    {
        try {
 
            $usuarioRol = $_SESSION['user']['rol_nombre_ct']; 
            $usuarioId = $_SESSION['user']['usu_id']; 
    
    
            if ($usuarioRol === 'ADMINSTRADOR') {
                $sql = "SELECT usu_nombre, envio_empleado, envio_fecha, envio_situacion from envios INNER JOIN usuario ON usu_id = envio_cliente";
            } else {
                $sql = "SELECT usu_nombre, envio_empleado, envio_fecha, envio_situacion from envios INNER JOIN usuario ON usu_id = envio_cliente WHERE envio_cliente = $usuarioId";
            }
            $productos = Usuario::fetchArray($sql);
            http_response_code(200);
            echo json_encode($productos);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al buscar envíos',
                'detalle' => $e->getMessage(),
            ]);
        }
    }

    public static function estadisticaEnvioAPI(){

        try {
            $sql = "SELECT usu_nombre, COUNT(envio_cliente) AS envios
                    FROM envios
                    INNER JOIN usuario ON usu_id = envio_cliente
                    GROUP BY usu_nombre
                    ORDER BY envios DESC;";

            $datos = Usuario::fetchArray($sql);
    
            echo json_encode($datos);

        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Error al realizar la consulta',
                'codigo' => 0  
            ]);
        }

    }

    public static function mapaAPI()
    {
        $sql = "SELECT * FROM envios";

        try {
            $envios = Usuario::fetchArray($sql);
            echo json_encode($envios);
            exit;
        } catch (Exception $e) {
            return [];
        }
    }
}


