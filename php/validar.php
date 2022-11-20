<?php
    /* Utilizar el archivo funciones */
    require_once('funciones.php');

    /* Validar que se ha pulsado el boton para agregar un disco */
    if(isset($_REQUEST['agregar'])) {
        $nombreDisco = $_REQUEST['nombreDisco'];
        $nombreArtista = $_REQUEST['nombreArtista'];
        $formato = $_REQUEST['formato'];
        $pais = $_REQUEST['pais'];
        $fecha = $_REQUEST['fecha'];
        $genero = $_REQUEST['genero'];
        $precio = $_REQUEST['precio'];

        $caratula = $_FILES['caratula']['name'];
        $archivo = $_FILES['caratula']['tmp_name'];
        $ruta = "../imgs";

        $rutaCompleta = $ruta."/".$caratula;

        if(!file_exists($rutaCompleta)) {
            move_uploaded_file($archivo, $rutaCompleta);
        }

        if(insertar($nombreDisco, $nombreArtista, $formato, $pais, $fecha, $genero, $precio, $rutaCompleta)) {
            header('Location: agregar.php');
        } else {
            header('Location: ../index.php');
        }
        
        /* insertar($nombreDisco, $nombreArtista, $formato, $pais, $fecha, $genero, $caratula);

        header('Location: agregar.php'); */

    } else if(isset($_REQUEST['actualizar'])) {
        $id = $_REQUEST['id'];
        $nombreDisco = $_REQUEST['nombreDisco'];
        $nombreArtista = $_REQUEST['nombreArtista'];
        $formato = $_REQUEST['formato'];
        $pais = $_REQUEST['pais'];
        $fecha = $_REQUEST['fecha'];
        $genero = $_REQUEST['genero'];
        $precio = $_REQUEST['precio'];

        $caratula = $_FILES['caratula']['name'];
        $archivo = $_FILES['caratula']['tmp_name'];
        $ruta = "../imgs";

        $rutaCompleta = $ruta."/".$caratula;

        if(!file_exists($rutaCompleta)) {
            move_uploaded_file($archivo, $rutaCompleta);
        }

        if(actualizarDatos($id, $nombreDisco, $nombreArtista, $formato, $pais, $fecha, $genero, $precio, $rutaCompleta)) {
            header('Location: editar.php');
        } else {
            header('Location: ../index.php');
        }
    } else {
        header('Location: ../index.php');
    }
?>