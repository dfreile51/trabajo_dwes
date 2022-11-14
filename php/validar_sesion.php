<?php
    if(isset($_REQUEST['iniciar-sesion'])) {
        require_once('funciones.php');
        
        session_start();
        $usuario = $_REQUEST['user'];
        $contrasena = $_REQUEST['password'];

        if(validarUsuario($usuario, $contrasena)) {
            if(validarUsuarioAdmin($usuario, $contrasena)) {
                $_SESSION['usuario'] = $usuario;
                $_SESSION['permisos'] = "admin";
                header('Location: ../index.php');
            } else {
                $_SESSION['usuario'] = $usuario;
                $_SESSION['permisos'] = "invitado";
                header('Location: ../index.php');
            }
        } else {
            header('Location: error_sesion.php');
        }
    } else {
        header('Location: ../index.php');
    }
?>