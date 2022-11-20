<?php
    // PARAMETROS DE LA BASE DE DATOS

    define("HOST", "localhost");
    define("USER", "discomovida");
    define("PASS", "discomovida");
    define("BD", "discomovida");

    // FUNCION PARA OBTENER TODOS LOS DISCOS SIN EL ID

    function obtenerDiscosSinId() {
        $discos = false;
        try {
            $con = mysqli_connect(HOST, USER, PASS, BD);
            $sql = "SELECT nombre, artista, formato, pais, fecha, genero, precio, imagen FROM discos";
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
            $sql = "SELECT * FROM discos"; // Recojo tambien el id_disco, para luego poder usarlo a la hora de editar o eliminar un registro
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
            $sql = "SELECT * FROM discos WHERE id_disco = $id";
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

    // FUNCION PARA OBTENER DISCO SEGÚN LOS FILTROS

    function obtenerDiscosFiltros($artista, $nombreDisco, $orden, $genero) {
        $discos = false;
        try {
            $con = mysqli_connect(HOST, USER, PASS, BD);
            if($artista == '' && $nombreDisco == '' && $orden == 'Nada' && $genero == 'Todos') {
                $sql = "SELECT nombre, artista, formato, pais, fecha, genero, precio, imagen FROM discos";
            } else {
                $sql = "SELECT nombre, artista, formato, pais, fecha, genero, precio, imagen FROM discos ";

                if($artista != '' || $artista == '') {
                    $sql .= "WHERE artista LIKE '%".$artista."%' ";
                } 

                if($nombreDisco != '' || $nombreDisco == '') {
                    $sql .= "AND nombre LIKE '%".$nombreDisco."%' ";
                }

                if($genero != 'Todos') {
                    $sql .= "AND genero = '".$genero."' ";
                }

                if($orden == 'Orden ascendente por artista') {
                    $sql .= "ORDER BY artista ASC";
                }

                if($orden == 'Orden descendente por artista') {
                    $sql .= "ORDER BY artista DESC";
                }

                if($orden == 'Orden ascendente por nombre') {
                    $sql .= "ORDER BY nombre ASC";
                }

                if($orden == 'Orden descendente por nombre') {
                    $sql .= "ORDER BY nombre DESC";
                }

                if($orden == 'Orden ascendente por genero') {
                    $sql .= "ORDER BY genero ASC";
                }

                if($orden == 'Orden descendente por genero') {
                    $sql .= "ORDER BY genero DESC";
                }
            }
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

    // FUNCION PARA OBTENER LOS GENEROS

    function obtenerGeneros() {
        $generos = false;
        try {
            $con = mysqli_connect(HOST, USER, PASS, BD);
            $sql = "SELECT DISTINCT genero FROM discos";
            $result = mysqli_query($con, $sql);
            mysqli_close($con);
            if(mysqli_num_rows($result)>0) {
                $generos = array();
                while($reg = mysqli_fetch_row($result)) {
                    $generos[] = $reg[0];
                }
            }
        } catch(mysqli_sql_exception $e) {
            $generos = false;
        }
        return $generos;
    }

    // FUNCION PARA INSERTAR

    function insertar($nombreDisco, $artista, $formato, $pais, $fecha, $genero, $precio, $imagen) {
        $insertado = false;
        try {
            $con = mysqli_connect(HOST, USER, PASS, BD);
            $sql = "INSERT INTO discos(nombre, artista, formato, pais, fecha, genero, precio, imagen) values ('".$nombreDisco."', '".$artista."', '".$formato."', '".$pais."', '".$fecha."', '".$genero."', '".$precio."', '".$imagen."')";
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

    // FUNCION PARA ACTUALIZAR LOS DATOS DE UNA FILA

    function actualizarDatos($id, $nombreDisco, $artista, $formato, $pais, $fecha, $genero, $precio, $imagen) {
        $actualizado = false;
        try {
            $con = mysqli_connect(HOST, USER, PASS, BD);
            $sql = "UPDATE discos SET nombre='$nombreDisco', artista='$artista', formato='$formato', pais='$pais', fecha='$fecha', genero='$genero', precio='$precio', imagen='$imagen' WHERE id_disco=$id";
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

    // FUNCION PARA ELIMINAR LOS DATOS DE UNA FILA

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

    // FUNCION PARA VALIDAR SI EXISTE EL USUARIO EN LA BD

    function validarUsuario($user, $pass) {
        $sesion = false;
        try {
            $con = mysqli_connect(HOST, USER, PASS, BD);
            $sql = "SELECT * FROM usuarios WHERE username='$user' AND pass='$pass'";
            $result = mysqli_query($con, $sql);
            mysqli_close($con);
            if(mysqli_num_rows($result)>0) {
                $sesion = array();
                while($reg = mysqli_fetch_assoc($result)) {
                    $sesion[] = $reg;
                }
            }
        } catch (mysqli_sql_exception $e) {
            $sesion = false;
        }
        return $sesion;
    }

    // FUNCION PARA VALIDAR SI EL USUARIO ES ADMIN

    function validarUsuarioAdmin($user, $pass) {
        $sesion = false;
        try {
            $con = mysqli_connect(HOST, USER, PASS, BD);
            $sql = "SELECT * FROM usuarios WHERE username='$user' AND pass='$pass' AND permisos='admin'";
            $result = mysqli_query($con, $sql);
            mysqli_close($con);
            if(mysqli_num_rows($result)>0) {
                $sesion = array();
                while($reg = mysqli_fetch_assoc($result)) {
                    $sesion[] = $reg;
                }
            }
        } catch (mysqli_sql_exception $e) {
            $sesion = false;
        }
        return $sesion;
    }
?>