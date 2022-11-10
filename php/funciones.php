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

    function obtenerDiscos() {
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
?>