<?php
/*
if (!$_SESSION['active']) {
    header('location: ../index.php');
}*/
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>SMCRIT</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--<link href="assets/css/bootstrap.css" rel="stylesheet" />-->
   </head>
    <body>
        
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <?php
            if ($_SESSION['fl_rol'] == 1) {
            ?>
            <a class="navbar-brand" href="dashboard.php">DASHBOARD</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto nav-tabs ">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Administrador
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="usuarios.php">Usuarios</a>
                            <a class="dropdown-item" href="dispositivos.php">Dispositivos</a>
                            <a class="dropdown-item" href="ubicacion.php">Ubicación</a>
                            <a class="dropdown-item" href="#">Area</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Registro de alertas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Registro de notificaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../controladores/salir.php">Cerrar sesión</a>
                    </li>
                </ul>
            </div>
                <?php } ?>
            <?php
            if ($_SESSION['fl_rol'] == 2) {
            ?>
            <a class="navbar-brand" href="#">DASHBOARD</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto nav-tabs ">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Registro de alertas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Registro de notificaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../controladores/salir.php">Cerrar sesión</a>
                    </li>
                </ul>
            </div>
                <?php } ?>
        </nav>
    
        <script src="../assets/js/jquery-3.3.1.slim.min.js" ></script>
        <script src="../assets/js/bootstrap.min.js"></script>

    </body>
</html>