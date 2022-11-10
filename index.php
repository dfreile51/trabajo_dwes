<?php
    require_once('php/funciones.php');
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
</head>
<body>
    <?php
        require_once('layout/header.php');
    ?>

    <div class="container py-3 my-3 bg-white">
<!--         <div class="row"> -->
            <?php
                $discos = obtenerDiscos();
                if(is_array($discos) && count($discos)>0) {
                    foreach($discos as $disco) {
                        echo "<table>";
                            echo "<tr>";
                                echo "<th><img src='".substr($disco['imagen'],3)."' alt='imagen' /></th>";
                            echo "</tr>";

                            echo "<tr>";
                                echo "<th>Nombre del disco: {$disco['nombre']}</th>";
                            echo "</tr>";

                            echo "<tr>";
                                echo "<th>Nombre artista/grupo: {$disco['artista']}</th>";
                            echo "</tr>";

                            echo "<tr>";
                                echo "<th>Formato: {$disco['formato']}</th>";
                            echo "</tr>";

                            echo "<tr>";
                                echo "<th>País: {$disco['pais']}</th>";
                            echo "</tr>";

                            echo "<tr>";
                                echo "<th>Fecha publicación: {$disco['fecha']}</th>";
                            echo "</tr>";

                            echo "<tr>";
                                echo "<th>Género: {$disco['genero']}</th>";
                            echo "</tr>";
                        echo "</table>";
                    }
                } else {
                    echo "<p>No hay ningún disco</p>";
                }
                
                /* foreach($discos as $valor) {
                    echo "<img src='".substr($valor,3)."' alt='imagen' />";
                } */
            ?>
<!--         </div> -->
        
    </div>

    <?php
        require_once('layout/footer.php');
    ?>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>