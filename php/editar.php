<?php
    session_start();
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
</head>
<body>
    <?php
        require_once('../layout/headerResto.php');
    ?>

    <div class="container  my-3 bg-white">
        <div class="row">
            <?php
                require_once('funciones.php');
                $discos = obtenerDiscosConId();
                if(is_array($discos) && count($discos)>0) {
                    foreach($discos as $disco) {
                        echo "<div class='col-sm-12 col-md-6 col-lg-3 my-3'>";
                            echo "<table>";
                                echo "<tr>";
                                    echo "<th style='text-align: center;'><img src='".$disco['imagen']."' alt='imagen' /></th>";
                                echo "</tr>";

                                echo "<tr>";
                                    echo "<td>Nombre del disco: {$disco['nombre']}</td>";
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

                                echo "<tr>";
                                    echo "<td class='text-center'>";
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
                    echo "<p>No hay ningún disco</p>";
                }
                
                /* foreach($discos as $valor) {
                    echo "<img src='".substr($valor,3)."' alt='imagen' />";
                } */
            ?>

        </div>
    </div>

    <?php
        require_once('../layout/footerResto.php');
    ?>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>