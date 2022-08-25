<?php
require_once '../controladores/listarUbicacion.php';

//session_start();
if (!$_SESSION['active']) {
    header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link href="../assets/css/bootstrap.css" rel="stylesheet" />
        <script language="javascript" src="../assets/js/jquery.min.js "></script>

        <script language="javascript">
            $(document).ready(function () {

                $("#cbx_ubicacion").change(function () {


                    $("#cbx_ubicacion option:selected").each(function () {
                        fl_ubicacion = $(this).val();
                        $.post("../controladores/obtenerDispositivo.php", {fl_ubicacion: fl_ubicacion}, function (data) {
                            $("#cbx_dispositivo").html(data);
                        });
                    });
                })
            });

            $(document).ready(function () {
                $("#cbx_dispositivo").change(function () {
                    $("#cbx_dispositivo option:selected").each(function () {
                        fl_dispositivo = $(this).val();
                        $.post("../controladores/obtenerTablaDispositivo.php", {fl_dispositivo: fl_dispositivo}, function (data) {
                            $("#cbx_dispositivo_tabla").html(data);
                        });
                    });
                })
            });
        </script>

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
                                <a class="dropdown-item active" href="dispositivos.php">Dispositivos</a>
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
                <h5 class="card-header alert-info">Administrador de dispositivos</h5>
                <div class="card-body">
                    <div class="container">
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <div>Seleccione:<select  class="form-control" name="cbx_ubicacion" id="cbx_ubicacion">
                                        <option value="0">Ubicación</option>
                                        <?php
                                        $query = listarUbicacion();
                                        foreach ($query as $row) {
                                            ?>
                                            <option value="<?php echo $row['fl_ubicacion']; ?>"><?php echo $row['nb_ubicacion']; ?></option>
                                        <?php } ?>
                                    </select></div>
                            </div>
                            <div class="form-group col-md-5">
                                <div>Seleccione:<select  class="form-control" name="cbx_dispositivo" id="cbx_dispositivo"></select></div>
                            </div>
                            <div class="form-group col-md-2" style="align-items: flex-end">
                                <br>
                                <div class="d-flex justify-content-end">
                                    <a class="btn btn-primary" href="agregarDispositivo.php" >Agregar dispositivo</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <table class="table table" id="cbx_dispositivo_tabla">

                        </table>
                    </div>

                </div>
            </div>
        </div>


        <br> 








        <script src="../assets/js/jquery.min.js" ></script>
        <script src="../assets/js/bootstrap.min.js"></script>

    </body>
</html>
