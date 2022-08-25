<?php
session_start();
require_once '../config/conexion.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link href="../assets/css/bootstrap.css" rel="stylesheet" />

    </head>
    <body>
        <?php require_once '../partials/header.php'; ?>
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
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="historialNotificacion.php">Historial de notificaciones</a>
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
                            <a class="nav-link" href="historialNotificacion.php">Historial de notificaciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../controladores/salir.php">Cerrar sesión</a>
                        </li>
                    </ul>
                </div>
            <?php } ?>
        </nav>
        <br>
        <div class="container-fluid">
            

            <div class="card">
                <h5 class="card-header alert-info">Agregar dispositivo</h5>
                
                <div class="card-body">
                    <form method="POST" action="../controladores/agregarDispositivo.php">
                        <input type="hidden" name="fl_dispositivo" />
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="text">Dispositivo</label>
                                <input type="text" class="form-control" name="nb_dispositivo" required placeholder="Dispositivo">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="text" >Modelo</label>
                                <input type="text" class="form-control" name="nb_modelo" required placeholder="Modelo">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="text">Seleccione:</label>

                                <select name="fl_ubicacion" class="form-control">
                                    <option value="0">Ubicación</option>
                                    <?php
                                    $query = mysqli_query($conection, "SELECT fl_ubicacion, nb_ubicacion FROM c_ubicacion WHERE 1");
                                    while ($valores = mysqli_fetch_array($query)) {
                                        echo '<option value="' . $valores[fl_ubicacion] . '">' . $valores[nb_ubicacion] . '</option>';
                                    }
                                    mysqli_close($conectar);
                                    ?>

                                </select>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="text">Descripción de dispositivo</label>
                            <textarea class="form-control" name="ds_dispositivo" id="exampleFormControlTextarea1" rows="1"></textarea>
                        </div>
                        <a href="agregarUbicacion.php">Agregar ubicación</a>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Guardar dispositivo</button>
                        </div>



                    </form>



                </div>
            </div>
            </div>

        </div>











        <script src="../assets/js/jquery.min.js" ></script>
        <script src="../assets/js/bootstrap.min.js"></script>

    </body>
</html>
