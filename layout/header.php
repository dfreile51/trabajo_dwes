<!-- ESTE ES EL HEADER PARA LA PAGINA DE INICIO/INVENTARIO (index.php) -->


<!-- Inicio del encabezado -->
<header class="py-3 bg-light">
    <div class="container-fluid d-flex flex-wrap justify-content-center">
        <a href="" class="d-flex align-items-center mb-lg-0 text-black text-decoration-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" fill="currentColor" class="bi bi-vinyl-fill me-2" viewBox="0 0 16 16">
                <path d="M8 6a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm0 3a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4 8a4 4 0 1 0 8 0 4 4 0 0 0-8 0z"/>
            </svg>
            <span class="fs-4">Disco Movida</span>
        </a>
    </div>
</header>
<!-- Inicicio del menú -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid">
       
        <!-- Boton del menú -->

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <!-- Elementos del menú colapsable -->
        
        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="">Inventario</a>
                </li>
                <?php
                    if($_SESSION['permisos'] == "admin") {
                        echo "
                        <li class='nav-item'>
                            <a class='nav-link' href='php/agregar.php'>Agregar</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='php/eliminar.php'>Eliminar</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='php/editar.php'>Modificar</a>
                        </li>";
                    }
                ?>
            </ul>

            <!-- Boton de inicio de sesion/cerrar sesion -->

            <div class="d-flex">
                <?php
                    if($_SESSION['usuario'] != "invitado") {
                        echo "<p class='text-white my-auto me-2'>Usuario, {$_SESSION['usuario']}</p>
                            <a class='d-md-inline-block btn btn-outline-warning m-auto' tabindex='-1' role='button' href='php/cerrar_sesion.php'>Cerrar sesión</a>";
                    } else {
                        echo "<p class='text-white my-auto me-2'>Usuario, {$_SESSION['usuario']}</p>
                            <a class='d-md-inline-block btn btn-outline-warning m-auto' tabindex='-1' role='button' href='php/iniciar_sesion.php'>Iniciar Sesión</a>";
                    }
                ?>
            </div>
           
        </div>
    </div>
</nav>