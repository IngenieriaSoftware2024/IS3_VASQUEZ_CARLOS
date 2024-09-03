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
}

SELECT usu_nombre, COUNT(envio_cliente) AS envios
FROM envios
INNER JOIN usuario ON usu_id = envio_cliente
GROUP BY usu_nombre
ORDER BY envios DESC;
