<?php
    // PARAMETROS DE LA BASE DE DATOS

    define("HOST", "localhost");
    define("USER", "discomovida");
    define("PASS", "discomovida");
    define("BD", "discomovida");

    // FUNCION PARA INSERTAR

    function insertar($nombreDisco, $artista, $formato, $pais, $fecha, $genero, $imagen) {
        $insertado = false;
        try {
            $con = mysqli_connect(HOST, USER, PASS, BD);
            $sql = "INSERT INTO discos(nombre, artista, formato, pais, fecha, genero, imagen) values ('".$nombreDisco."', '".$artista."', '".$formato."', '".$pais."', '".$fecha."', '".$genero."', '".$imagen."')";
            $result = mysqli_query($con, $sql);
            if($result && mysqli_affected_rows($con)==1) {
                $insertado = true;
            }
            mysqli_close($con);
        } catch (mysqli_sql_exception $e) {
            $insertado = false;
        }
        return $insertado;
    }

    // FUNCION PARA OBTENER TODOS LOS DISCOS SIN EL ID

    function obtenerDiscosSinId() {
        $discos = false;
        try {
            $con = mysqli_connect(HOST, USER, PASS, BD);
            $sql = "SELECT nombre, artista, formato, pais, fecha, genero, imagen FROM discos";
            $result = mysqli_query($con, $sql);
            mysqli_close($con);
            if(mysqli_num_rows($result)>0) {
                $discos = array();
                while($reg = mysqli_fetch_assoc($result)) {
                    $discos[] = $reg;
                }
            }
        } catch (mysqli_sql_exception $e) {
            $discos = false;
        }
        return $discos;
    }

    // FUNCION PARA OBTENER TODOS LOS DISCOS CON EL ID

    function obtenerDiscosConId() {
        $discos = false;
        try {
            $con = mysqli_connect(HOST, USER, PASS, BD);
            $sql = "SELECT id_disco, nombre, artista, formato, pais, fecha, genero, imagen FROM discos"; // Recojo tambien el id_disco, para luego poder usarlo a la hora de editar o eliminar un registro
            $result = mysqli_query($con, $sql);
            mysqli_close($con);
            if(mysqli_num_rows($result)>0) {
                $discos = array();
                while($reg = mysqli_fetch_assoc($result)) {
                    $discos[] = $reg;
                }
            }
        } catch (mysqli_sql_exception $e) {
            $discos = false;
        }
        return $discos;
    }

    // FUNCION PARA OBTENER UN DISCO SEGUN EL ID

    function obtenerDiscosPorId($id) {
        $discos = false;
        try {
            $con = mysqli_connect(HOST, USER, PASS, BD);
            $sql = "SELECT id_disco, nombre, artista, pais, fecha, genero FROM discos WHERE id_disco = $id";
            $result = mysqli_query($con, $sql);
            mysqli_close($con);
            if(mysqli_num_rows($result)>0) {
                $discos = array();
                while($reg = mysqli_fetch_assoc($result)) {
                    $discos[] = $reg;
                }
            }
        } catch (mysqli_sql_exception $e) {
            $discos = false;
        }
        return $discos;
    }

    // FUNCION PARA ACTUALIZAR LOS DATOS DE UNA FILA

    function actualizarDatos($id, $nombreDisco, $artista, $formato, $pais, $fecha, $genero, $imagen) {
        $actualizado = false;
        try {
            $con = mysqli_connect(HOST, USER, PASS, BD);
            $sql = "UPDATE discos SET nombre='$nombreDisco', artista='$artista', formato='$formato', pais='$pais', fecha='$fecha', genero='$genero', imagen='$imagen' WHERE id_disco=$id";
            $result = mysqli_query($con, $sql);
            if($result && mysqli_affected_rows($con)==1) {
                $actualizado = true;
            }
            mysqli_close($con);
        } catch (mysqli_sql_exception $e) {
            $actualizado = false;
        }
        return $actualizado;
    }

    function eliminarDatos($id) {
        $eliminado = false;
        try {
            $con = mysqli_connect(HOST, USER, PASS, BD);
            $sql = "DELETE FROM discos WHERE id_disco=$id";
            $result = mysqli_query($con, $sql);
            if($result && mysqli_affected_rows($con)==1) {
                $eliminado = true;
            }
            mysqli_close($con);
        } catch (mysqli_sql_exception $e) {
            $eliminado = false;
        }
        return $eliminado;
    }
?>