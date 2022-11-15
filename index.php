<?php
    session_start();
    
    if(!isset($_SESSION['usuario']) && !isset($_SESSION['permisos'])) {
        $_SESSION['usuario'] = "invitado";
        $_SESSION['permisos'] = "invitado";
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
<body>
    <?php
        include('layout/header.php');
    ?>

    <div class="container my-3 bg-white">
        <div class="row ">
                <?php
                    require_once('php/funciones.php');
                    $discos = obtenerDiscosSinId();
                    if(is_array($discos) && count($discos)>0) {
                        foreach($discos as $disco) {
                            echo "<div class='col-sm-12 col-md-6 col-lg-3 my-3'>";
                                echo "<table class='d-flex justify-content-center py-2 border border-2 rounded-2'>";
                                    echo "<tr>";
                                        echo "<th style='text-align: center;'><img src='".substr($disco['imagen'],3)."' alt='imagen' /></th>";
                                    echo "</tr>";

                                    echo "<tr>";
                                        echo "<td class='pt-2'>Nombre del disco: {$disco['nombre']}</td>";
                                    echo "</tr>";

                                    echo "<tr>";
                                        echo "<td>Nombre artista/grupo: {$disco['artista']}</td>";
                                    echo "</tr>";

                                    echo "<tr>";
                                        echo "<td>Formato: {$disco['formato']}</td>";
                                    echo "</tr>";

                                    echo "<tr>";
                                        echo "<td>País: {$disco['pais']}</td>";
                                    echo "</tr>";

                                    echo "<tr>";
                                        echo "<td>Fecha publicación: {$disco['fecha']}</td>";
                                    echo "</tr>";

                                    echo "<tr>";
                                        echo "<td>Género: {$disco['genero']}</td>";
                                    echo "</tr>";
                                echo "</table>";
                            echo "</div>";
                        }
                    } else {
                        echo "<p>No hay ningún disco</p>";
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