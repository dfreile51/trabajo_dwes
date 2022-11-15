<?php
    session_start();
    if((!isset($_SESSION['permisos']) && !isset($_SESSION['usuario'])) || ($_SESSION['usuario'] != "invitado")) {
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
    <title>Iniciar Sesión</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<body>
    <?php
        include('../layout/headerInicioSesion.php');
    ?>
        
    <div class="container m-auto">
        <div class="row">
            <div class="col-12">
            <div class="card m-auto" style="width: 30%">
                    <div class="d-flex justify-content-center card-header"><h3 class="card-title">Iniciar Sesión</h3></div>
                    <div class="card body p-4">
                        <form action="validar_sesion.php" method="post">
                            <div class="mb-3">
                                <label for="user" class="user">Usuario: </label>
                                <input type="text" class="form-control" id="user" name="user" placeholder="Nombre de usuario"/>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña: </label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña"/>
                            </div>
                            <div class="d-flex justify-content-center"> 
                                <input type="submit" class="btn btn-warning" value="Iniciar Sesión" id="iniciar-sesion" name="iniciar-sesion" />
                            </div>
                        </form>
                    </div>
                </div>
                
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