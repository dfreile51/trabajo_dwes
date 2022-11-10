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

        $caratula = $_FILES['caratula']['name'];
        $archivo = $_FILES['caratula']['tmp_name'];
        $ruta = "../imgs";

        $rutaCompleta = $ruta."/".$caratula;

        move_uploaded_file($archivo, $rutaCompleta);

        /* insertar($nombreDisco, $nombreArtista, $formato, $pais, $fecha, $genero, $caratula);

        header('Location: agregar.php'); */

    } else {
        header('Location: ../index.php');
    }

    if(insertar($nombreDisco, $nombreArtista, $formato, $pais, $fecha, $genero, $rutaCompleta)) {
        header('Location: agregar.php');
    } else {
        header('Location: ../index.php');
    }

?>