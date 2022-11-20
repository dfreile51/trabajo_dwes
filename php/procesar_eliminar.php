<?php
    session_start();
    if((!isset($_SESSION['usuario']) && !isset($_SESSION['permisos'])) || ($_SESSION['permisos'] == "invitado") || (!isset($_REQUEST['eliminar']))) {
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
    <title>Eliminado</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<body>
    <?php
        include('../layout/headerResto.php');
    ?>

    <div class="container my-3 bg-white">
        <div class="row">
            <div class="col-12 my-3">
                <?php
                    $id = $_REQUEST['id'];

                    if(eliminarDatos($id)) {
                        echo "<h2 class='text-center'>Eliminado correctamente</h2>";
                    } else {
                        echo "<h2 class='text-center'>Error al eliminar</h2>";
                    }
                    echo "<br/>";
                    echo "<p class='text-center'><a class='btn btn-outline-warning m-auto' href='../index.php'>Volver a inicio</a></p>";
                ?>
            </div>
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