<?php

namespace Controllers;

use Exception;
use Model\Usuario;
use MVC\Router;

class LoginController {
    public static function index(Router $router){
        isNotAuth();
        $router->render('login/login', [], 'layouts/layout');
    }

    public static function loginAPI()
    {
        getHeadersApi();
        $_POST['usu_codigo'] = filter_var($_POST['usu_codigo'], FILTER_SANITIZE_NUMBER_INT);
        $_POST['usu_password'] = htmlspecialchars($_POST['usu_password']);
        try {
            $usuario = new Usuario($_POST);

            if ($usuario->validarUsuarioExistente()) {
                $usuarioBD = $usuario->usuarioExistente();
                //VALIDA QUE LA CONTRASEÑA ESTE CORRECTA
                if (password_verify($_POST['usu_password'], $usuarioBD['usu_password'])) {
                    session_start();
                    $_SESSION['user'] = $usuarioBD;

     
                    $permisos = Usuario::fetchArray("SELECT * FROM permiso inner join rol on permiso_rol = rol_id where rol_situacion = 1 AND permiso_usuario = " . $usuarioBD['usu_id']);
       
                    
                    foreach ($permisos as $permiso) {
                        $_SESSION[$permiso['rol_nombre_ct']] = 1;
                    }

                    http_response_code(200);
                    echo json_encode([
                        'codigo' => 1,
                        // 'mensaje' => 'Bienvenido al CARGO EXPRESSO, ' . $usuarioBD['usu_nombre'],
                    ]);
                    exit;
                } else {
                    http_response_code(404);
                    echo json_encode([
                        'codigo' => 0,
                        'mensaje' => 'La constraseña no coincide',
                        'detalle' => 'Verifique la contraseña ingresada',
                    ]);
                    exit;
                }
            } else {
                http_response_code(404);
                echo json_encode([
                    'codigo' => 0,
                    'mensaje' => 'El usuario no existe',
                    'detalle' => 'No existe un usuario registrado con el codigo proporcionado',
                ]);
                exit;
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al generar usuario',
                'detalle' => $e->getMessage(),
            ]);
            exit;
        }
        
    }

    public static function inicio(Router $router)
    {
        isAuth();
        hasPermission(['USER', 'ADMINISTRATIVO', 'ADMINSTRADOR']);
        $router->render('login/inicio', [], 'layouts/menu');
    }

    public static function logout()
    {
        isAuth();
        $_SESSION = [];
        session_destroy();
        header('Location: /IS3_VASQUEZ_CARLOS/');
    }

}