<?php
    session_start();
    
    if(!isset($_SESSION['usuario']) && !isset($_SESSION['permisos'])) {
        $_SESSION['usuario'] = "invitado";
        $_SESSION['permisos'] = "invitado";
    }

    if(isset($_REQUEST['ver'])) {
        $artista = $_REQUEST['artista'];
        $nombreDisco = $_REQUEST['nombreDisco'];
        $genero = $_REQUEST['genero'];
        $orden = $_REQUEST['orden'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Inicio</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<style>
    .ficha {
        width: 250px;
    }
</style>
<body>
    <?php
        include('layout/header.php');
    ?>

    <?php
        require_once('php/funciones.php');
        $generos = obtenerGeneros();
    ?>
    <div class="container my-3">
        <div class="row">
            <div class="col-12">
                <div class="card m-auto" style="width: 60%">
                    <div class="d-flex justify-content-center card-header"><h3 class="card-title">Filtros</h3></div>
                    <div class="card-body">
                        <form action="#" method="post">
                            <div class="mb-3">
                                <label for="artista" class="form-label">Nombre del artista:</label>
                                <input type="text" class="form-control" name="artista" id="artista" value="<?php if(isset($_REQUEST['ver'])) { echo $artista; } ?>" />
                            </div>
                            <div class="mb-3">
                                <label for="nombreDisco" class="form-label">Nombre del disco: </label>
                                <input type="text" class="form-control" id="nombreDisco" name="nombreDisco" value="<?php if(isset($_REQUEST['ver'])) { echo $nombreDisco; } ?>" />
                            </div>
                            <div class="mb-3">
                                <table>
                                    <tr>
                                        <td>
                                            <label for="genero" class="form-label">Género: </label>
                                            <select class="form-select" id="genero" name="genero">
                                                <option>Todos</option>
                                                <?php
                                                    foreach($generos as $gen) {
                                                        echo "<option>$gen</option>";
                                                    }
                                                ?>
                                            </select>
                                        </td>
                                        <td>
                                            <label for="orden" class="form-label">Orden: </label>
                                            <select class="form-select" id="orden" name="orden">
                                                <option>Nada</option>
                                                <option>Orden ascendente por artista</option>
                                                <option>Orden descendente por artista</option>
                                                <option>Orden ascendente por nombre</option>
                                                <option>Orden descendente por nombre</option>
                                                <option>Orden ascendente por genero</option>
                                                <option>Orden descendente por genero</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div>
                                <input type="submit" class="btn btn-warning" value="Ver" id="ver" name="ver" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-3 bg-white">
        <div class="row ">
                <?php
                    if(!isset($_REQUEST['ver'])) {
                        $discos = obtenerDiscosSinId();
                    } else {
                        $discos = obtenerDiscosFiltros($artista, $nombreDisco, $orden, $genero);
                    }
                    if(is_array($discos) && count($discos)>0) {
                        foreach($discos as $disco) {
                            echo "<div class='col-sm-12 col-md-6 col-lg-3 my-3'>";
                                echo "<table class='d-flex justify-content-center py-2 border border-2 rounded-2'>";
                                    echo "<tr>";
                                        echo "<th class='ficha' style='text-align: center;'><img src='".substr($disco['imagen'],3)."' alt='imagen' /></th>";
                                    echo "</tr>";

                                    echo "<tr>";
                                        echo "<td class='pt-2 ficha' style='font-size: 25px'><b><i>".strtoupper($disco['nombre'])."</i></b></td>";
                                    echo "</tr>";

                                    echo "<tr>";
                                        echo "<td class='ficha' style='font-size: 18px'><i>{$disco['artista']}</i></td>";
                                    echo "</tr>";

                                    echo "<tr>";
                                        echo "<td class='ficha'>Formato: {$disco['formato']}</td>";
                                    echo "</tr>";

                                    echo "<tr>";
                                        echo "<td class='ficha'>País: {$disco['pais']}</td>";
                                    echo "</tr>";

                                    echo "<tr>";
                                        echo "<td class='ficha'>Publicación: {$disco['fecha']}</td>";
                                    echo "</tr>";

                                    echo "<tr>";
                                        echo "<td class='ficha'>Género: {$disco['genero']}</td>";
                                    echo "</tr>";

                                    echo "<tr>";
                                        echo "<td class='ficha'><b>{$disco['precio']}€</b></td>";
                                    echo "</tr>";
                                echo "</table>";
                            echo "</div>";
                        }
                    } else {
                        echo "<div class='col-12 py-2'>";
                            echo "<h3 class='text-center'>No hay discos</h3>";
                        echo "</div>";
                    }
                ?>
        </div>
    </div>

    <?php
        include('layout/footer.php');
    ?>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>