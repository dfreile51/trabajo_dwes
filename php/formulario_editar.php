<?php
    session_start();
    if(!isset($_REQUEST['editar'])) {
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

    <?php
        $id = $_REQUEST['id'];
        $discos = obtenerDiscosPorId($id);
        if(is_array($discos) && count($discos)==1) {
            foreach($discos as $disco) {
    ?>
        
    <div class="container my-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="d-flex justify-content-center card-header"><h3 class="card-title">Modificar Disco de la Base de Datos</h3></div>
                    <div class="card body p-4">
                        <form action="validar.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" id="id" name="id" value="<?php echo "{$disco['id_disco']}" ?>" />
                            <div class="mb-3">
                                <label for="nombreDisco" class="form-label">Nombre del disco: </label>
                                <input type="text" class="form-control" id="nombreDisco" name="nombreDisco" value="<?php echo "{$disco['nombre']}" ?>" />
                            </div>
                            <div class="mb-3">
                                <label for="nombreArtista" class="form-label">Nombre del artista/grupo: </label>
                                <input type="text" class="form-control" id="nombreArtista" name="nombreArtista" value="<?php echo "{$disco['artista']}" ?>" />
                            </div>
                            <div class="mb-3">
                                <label for="formato" class="form-label">Tipo de formato: </label>
                                <select class="form-select" id="formato" name="formato">
                                    <option value="cd">CD</option>
                                    <option value="vinilo">Vinilo</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="pais" class="form-label">Pais: </label>
                                <input type="text" class="form-control" id="pais" name="pais" value="<?php echo "{$disco['pais']}" ?>" />
                            </div>
                            <div class="mb-3">
                                <label for="fecha" class="form-label">Fecha: </label>
                                <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo "{$disco['fecha']}" ?>" />
                            </div>
                            <div class="mb-3">
                                <label for="genero" class="form-label">Género: </label>
                                <input type="text" class="form-control" id="genero" name="genero" value="<?php echo "{$disco['genero']}" ?>" />
                            </div>
                            <div class="mb-3">
                                <label for="caratula" class="form-label">Seleccionar imagen: </label>
                                <input type="file" class="form-control" id="caratula" name="caratula" />
                            </div>
                            <div class="d-flex justify-content-center"> 
                                <input type="submit" class="btn btn-warning" value="Actualizar" id="actualizar" name="actualizar" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <?php
            }
        } else {
            echo "<p>Error al mostrar el disco</p>";
        }
    ?>
    <?php
        require_once('../layout/footerResto.php');
    ?>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>