<?php
session_start();
if (!$_SESSION['active']) {
    header('location: ../index.php');
}

$fl_ubicacion = $_GET['fl_ubicacion'];
$fl_dispositivo = $_GET['fl_dispositivo'];
$nb_ubicacion = $_GET['nb_ubicacion'];
$nb_dispositivo = $_GET['nb_dispositivo'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script type="text/javascript" src="../assets/js/jquery.min.js" ></script>
        <script type="text/javascript" src="../assets/js/mdb.min.js"></script>
        <link href="../assets/css/mdb.min.css" rel="stylesheet" />
        <script language="javascript">
            $(document).ready(function () {

                $("#cbx_anio").change(function () {


                    $("#cbx_anio option:selected").each(function () {
                        anio = $(this).val();
                        $.post("../controladores/obtenerGrafica.php", {anio: anio, fl_dispositivo:<?php echo $fl_dispositivo ?>, fl_ubicacion:<?php echo $fl_ubicacion ?>}, function (data) {
                            $("#cbx_grafica").html(data);
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
                            <a class="nav-link" href="historialNotificacion.php">Registro de notificaciones</a>
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
        <?php
        require_once '../config/conexion.php';

        //obtener datos para el select anio
        $queryAnio = mysqli_query($conection, "SELECT DISTINCT YEAR(RA.fe_registro) anio FROM r_monitoreo RA INNER JOIN c_dispositivo CD ON RA.fl_dispositivo = CD.fl_dispositivo");


        mysqli_close($conection);
        ?>
        <br>

        <div class="container-fluid">
            <div class="card-header alert-info">
                <div class="d-flex flex-row bd-highlight">
                    <div class="mr-auto p-2 bd-highlight" style="font-family: monospace; color: #000; font-size: large"></div>
                    <div class="mr-auto p-2 bd-highlight" style="font-family: monospace; color: #000; font-size: large">Gráfica Dispositivo: 
                        <a style="font-family: monospace; color: #007bff; font-size: large"><?php echo $nb_dispositivo; ?></a></div>
                    <div class="mr-auto p-2 bd-highlight" style="font-family: monospace; color: #000; font-size: large">Ubicación: 
                        <a style="font-family: monospace; color: #007bff; font-size: large"><?php echo $nb_ubicacion; ?></a></div>
                        <div class="mr-auto p-2 bd-highlight" style="font-family: monospace; color: #000; font-size: large">
                            <select  class="form-control" name="cbx_anio" id="cbx_anio">
                                    <option value="0">Año</option>
                                    <?php foreach ($queryAnio as $row) { ?>
                                        <option value="<?php echo $row['anio']; ?>"><?php echo $row['anio']; ?></option>
                                    <?php } ?>
                                </select>
                        </div>
                </div>
            </div>
        </div>
            <div class="card-body">
                <!--<div class="col-sm-12">
                    <div class="row"> 
                        <div class="col-2"></div>
                        <div class="col-8">
                           
                        </div>
                        <div class="col-2"></div>
                    </div>


                </div>-->
                 <div name="cbx_grafica" id="cbx_grafica"></div>
                <br>
                <div class="table-responsive-sm">
                    <table class=" table table-sm " id="cbx_alerta_mes">

                    </table>

                </div>
            </div>


        </div>
        





        <script src="../assets/js/jquery.min.js" ></script>
        <script src="../assets/js/bootstrap.min.js"></script>

    </body>

