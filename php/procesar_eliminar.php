<?php
    if(!isset($_REQUEST['eliminar'])) {
        header('Location: ../index.php');
    }

    require_once('funciones.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Formulario editar</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
</head>
<body>
    <?php
        require_once('../layout/headerResto.php');
    ?>

    <div class="container my-3 bg-white">
        <div class="row">
            <div class="col-12">
                <?php
                    $id = $_REQUEST['id'];
                    if(eliminarDatos($id)) {
                        echo "<h2 class='text-center'>Eliminado correctamente</h2>";
                        echo "<a class='btn btn-outline-warning m-auto' href='../index.php'>Volver a inicio</a>";
                    } else {
                        echo "<h2 class='text-center'>Error al eliminar</h2>";
                        echo "<a class='btn btn-outline-warning m-auto' href='../index.php'>Volver a inicio</a>";
                    }
                ?>
            </div>
        </div>
        
    </div>

    <?php
        require_once('../layout/footerResto.php');
    ?>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>