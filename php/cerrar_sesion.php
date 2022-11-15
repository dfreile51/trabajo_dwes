<?php
    session_start();
    $_SESSION['usuario'] = array();
    $_SESSION['permisos'] = array();
    session_destroy();
    header('Location: ../index.php');
?>