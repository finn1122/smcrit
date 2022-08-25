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
        <script type="text/javascript" src="../assets/js/mdb.min.js"></script>
        <link href="../assets/css/mdb.min.css" rel="stylesheet" />


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
        <?php
        require_once '../config/conexion.php';
        $fl_ubicacion = $_GET['fl_ubicacion'];
        $fl_dispositivo = $_GET['fl_dispositivo'];
        $nb_dispositivo = $_GET['nb_dispositivo'];
        $nb_ubicacion = $_GET['nb_ubicacion'];

        //consulta para obtener el promedio mensual de g_humedad para generar grafica de humedad
        $queryHumedad = mysqli_query($conection, "SELECT * FROM g_humedad WHERE fl_ubicacion='$fl_ubicacion' AND fl_dispositivo='$fl_dispositivo' AND anio = YEAR(NOW())");
        foreach ($queryHumedad as $row) {
            $anio = $row['anio'];
        }
        //consulta para obtener el promedio mensual de g_temperatura para generar grafica de temperatura
        $queryTemperatura = mysqli_query($conection, "SELECT * FROM g_temperatura WHERE fl_ubicacion='$fl_ubicacion' AND fl_dispositivo='$fl_dispositivo'  AND anio = YEAR(NOW())");


        mysqli_close($conection);
        ?>
        <div class="container">
            <div class="card border-dark">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card border">
                            <div class="card-body">
                                <center>
                                    <h5 class="card-title" style="font-family: monospace; color: #000; font-size: x-large">Promedio mensual <?php echo $anio; ?></h5>
                                    <center>
                                        <canvas id="lineChart" style="max-width:1000px"></canvas>
                                    </center>
                                </center>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer bg-light">
                    <div class="d-flex flex-row bd-highlight">
                        <div class="mr-auto p-2 bd-highlight" style="font-family: monospace; color: #000; font-size: large">Dispositivo: 
                            <a style="font-family: monospace; color: #007bff; font-size: large"><?php echo $nb_dispositivo; ?></a></div>
                        <div class="ml-auto p-2 bd-highlight" style="font-family: monospace; color: #000; font-size: large">Ubicación: 
                            <a style="font-family: monospace; color: #007bff; font-size: large"><?php echo $nb_ubicacion; ?></a></div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<br>




<script type="text/javascript">
    //line
    var ctxL = document.getElementById("lineChart").getContext('2d');
    var myLineChart = new Chart(ctxL, {
        type: 'line',
        data: {
            labels: ["En", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Agto", "Sept", "Oct", "Nov", "Dic"],
            datasets: [{
                    label: "Humedad (%)",
                    data: <?php foreach ($queryHumedad as $row) { ?> [<?php echo $row['enero']; ?>,<?php echo $row['febrero']; ?>,<?php echo $row['marzo']; ?>,<?php echo $row['abril']; ?>,<?php echo $row['mayo']; ?>,<?php echo $row['junio']; ?>,<?php echo $row['julio']; ?>,<?php echo $row['agosto']; ?>,<?php echo $row['septiembre']; ?>,<?php echo $row['octubre']; ?>,<?php echo $row['noviembre']; ?>,<?php
                            echo $row['diciembre'];
                        }
                        ?>],
                    backgroundColor: [
                        'rgba(20, 185, 224, .2)',
                    ],
                    borderColor: [
                        'rgba(0, 207, 255, .7)',
                    ],
                    borderWidth: 2
                },
                {
                    label: "Temperatura (°C)",
                    data: <?php foreach ($queryTemperatura as $row) { ?> [<?php echo $row['enero']; ?>,<?php echo $row['febrero']; ?>,<?php echo $row['marzo']; ?>,<?php echo $row['abril']; ?>,<?php echo $row['mayo']; ?>,<?php echo $row['junio']; ?>,<?php echo $row['julio']; ?>,<?php echo $row['agosto']; ?>,<?php echo $row['septiembre']; ?>,<?php echo $row['octubre']; ?>,<?php echo $row['noviembre']; ?>,<?php
                            echo $row['diciembre'];
                        }
                        ?>],
                    backgroundColor: [
                        'rgba(255, 80, 80, .2)',
                    ],
                    borderColor: [
                        'rgba(255, 0, 0, .7)',
                    ],
                    borderWidth: 2
                }
            ]
        },
        options: {
            responsive: true
        }
    });
</script>

<script src="../assets/js/bootstrap.min.js"></script>

</body>



