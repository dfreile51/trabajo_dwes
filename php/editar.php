<?php
    session_start();
    if((!isset($_SESSION['usuario']) && !isset($_SESSION['permisos'])) || ($_SESSION['permisos'] == "invitado")) {
        header('Location: ../index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Editar</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<style>
    td, th {
        width: 250px;
    }
</style>
<body>
    <?php
        require_once('../layout/headerResto.php');
    ?>

    <div class="container  my-3 bg-white">
        <div class="row">
            <?php
                include('funciones.php');
                $discos = obtenerDiscosConId();
                if(is_array($discos) && count($discos)>0) {
                    foreach($discos as $disco) {
                        echo "<div class='col-sm-12 col-md-6 col-lg-3 my-3'>";
                            echo "<table class='d-flex justify-content-center py-2 border border-2 rounded-2'>";
                                echo "<tr>";
                                    echo "<th style='text-align: center;'><img src='".$disco['imagen']."' alt='imagen' /></th>";
                                echo "</tr>";

                                echo "<tr>";
                                    echo "<td class='pt-2' style='font-size: 25px'><b><i>".strtoupper($disco['nombre'])."</i></b></td>";
                                echo "</tr>";

                                echo "<tr>";
                                    echo "<td style='font-size: 18px'><i>{$disco['artista']}</i></td>";
                                echo "</tr>";

                                echo "<tr>";
                                    echo "<td>Formato: {$disco['formato']}</td>";
                                echo "</tr>";

                                echo "<tr>";
                                    echo "<td>País: {$disco['pais']}</td>";
                                echo "</tr>";

                                echo "<tr>";
                                    echo "<td>Publicación: {$disco['fecha']}</td>";
                                echo "</tr>";

                                echo "<tr>";
                                    echo "<td>Género: {$disco['genero']}</td>";
                                echo "</tr>";

                                echo "<tr>";
                                    echo "<td><b>{$disco['precio']}€</b></td>";
                                echo "</tr>";

                                echo "<tr>";
                                    echo "<td class='pt-2 text-center'>";
                                        echo "<form action='formulario_editar.php' method='post'>";
                                            echo "<input type='hidden' id='id' name='id' value='{$disco['id_disco']}' />";
                                            echo "<input type='submit' class='btn btn-success' value='Editar' id='editar' name='editar' />";
                                        echo "</form>";
                                    echo "</td>";
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
        include('../layout/footerResto.php');
    ?>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>