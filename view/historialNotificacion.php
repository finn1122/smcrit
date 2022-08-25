<?php
session_start();
if (!$_SESSION['active']) {
    header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script type="text/javascript" src="../assets/js/jquery.min.js" ></script>
        <script language="javascript">
            $(document).ready(function () {

                $("#cbx_anio").change(function () {


                    $("#cbx_anio option:selected").each(function () {
                        anio = $(this).val();
                        $.post("../controladores/obtenerMes.php", {anio: anio}, function (data) {
                            $("#cbx_mes").html(data);
                        });
                    });
                })
            });

            $(document).ready(function () {
                $("#cbx_mes").change(function () {
                    $("#cbx_mes option:selected").each(function () {
                        mes = $(this).val();
                        $.post("../controladores/obtenerNotificacionMes.php", {mes: mes, anio:anio}, function (data) {
                            $("#cbx_alerta_mes").html(data);
                        });
                    });
                })
            });
        </script>
    </head>
    <body>
        <?php require_once "../partials/header.php"; ?>
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
                            <a class="nav-link active" href="historialNotificacion.php">Historial de notificaciones</a>
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
                <a class="navbar-brand" href="dashboard.php">DASHBOARD</a>
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
        <?php
        require_once '../config/conexion.php';
        
        //obtener datos para el select anio
        $queryAnio = mysqli_query($conection, "SELECT DISTINCT YEAR(RA.fe_registro) anio FROM r_alerta RA INNER JOIN c_dispositivo CD ON RA.fl_dispositivo = CD.fl_dispositivo");


        mysqli_close($conection);
        ?>
        <br>

        <div class="container-fluid">
            <div class="card">
                <h5 class="card-header alert-info">Notificaciones</h5>
                <div class="card-body">
                    <div class="col-sm-12">
                        <div class="card border-0">
                            
                            <div class="row">
                                <div class="col-6">

                                    <div>Seleccionar: 
                                        <select  class="form-control" name="cbx_anio" id="cbx_anio">
                                            <option value="0">Año</option>
                                            <?php foreach ($queryAnio as $row) { ?>
                                                <option value="<?php echo $row['anio']; ?>"><?php echo $row['anio']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div>Seleccionar: <select  class="form-control" name="cbx_mes" id="cbx_mes"></select></div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <br>
                    <div class="table-responsive-sm">
                        <table class=" table table-sm " id="cbx_alerta_mes">

                        </table>
                        
                    </div>
                </div>
                
            </div>
        </div>





         <script src="../assets/js/jquery.min.js" ></script>
        <script src="../assets/js/bootstrap.min.js"></script>

    </body>


