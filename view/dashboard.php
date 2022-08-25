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
        <script type="text/javascript" src="../assets/js/jquery-charts.min.js"></script>
        <script type="text/javascript" src="../assets/js/loader-charts.js"></script>
        <script type="text/javascript" src="../assets/js/push.min.js"></script>
        

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
        require_once '../controladores/dashboard/consultas.php';

        $datos = listarDispositivo();
        foreach ($datos as $row) {
            $temperatura = $row['fl_dispositivo'];
            $humedad = $row['DISPOSITIVO'];
            ?>

            <script type="text/javascript">

                google.charts.load('current', {'packages': ['gauge']});
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {

                    var data = google.visualization.arrayToDataTable([
                        ['Label', 'Value'],
                        ['Temperatura', 0]

                    ]);

                    var options = {
                        min: 0, max: 50,
                        width: 150, height: 150,
                        redFrom: 30, redTo: 50,
                        yellowFrom: 24, yellowTo: 30,
                        greenFrom: 15, greenTo: 24,
                        minorTicks: 5
                    };

                    var chart = new google.visualization.Gauge(document.getElementById('<?php echo $temperatura ?>'));

                    chart.draw(data, options);

                    setInterval(function () {
                        var JSON = $.ajax({
                            type: "POST",
                            url: "http://201.122.204.4:49999/smcrit/controladores/dashboard/consultaTemperaturaApi.php",
                            data: {'fl_dispositivo':<?php echo $row['fl_dispositivo'] ?>, 'fl_ubicacion':<?php echo $row['fl_ubicacion'] ?>},
                            dataType: 'json',
                            async: false}).responseText;

                        var Respuesta = jQuery.parseJSON(JSON);


                        data.setValue(0, 1, Respuesta[0].TEMPERATURA);


                        chart.draw(data, options);
                    }, 1000);
                }
            </script>
            <script type="text/javascript">

                google.charts.load('current', {'packages': ['gauge']});
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {

                    var data = google.visualization.arrayToDataTable([
                        ['Label', 'Value'],
                        ['Humedad', 0]
                    ]);

                    var options = {
                        min: 0, max: 100,
                        width: 150, height: 150,
                        redFrom: 75, redTo: 100,
                        yellowFrom: 55, yellowTo: 75,
                        greenFrom: 30, greenTo: 55,
                        minorTicks: 5
                    };

                    var chart = new google.visualization.Gauge(document.getElementById('<?php echo $humedad ?>'));

                    chart.draw(data, options);

                    setInterval(function () {
                        var JSON = $.ajax({
                            url: "http://201.122.204.4:49999/smcrit/controladores/dashboard/consultaHumedadApi.php?fl_dispositivo=<?php echo $row['fl_dispositivo']; ?>&fl_ubicacion=<?php echo $row['fl_ubicacion']; ?>",
                            dataType: 'json',
                            async: false}).responseText;

                        var Respuesta = jQuery.parseJSON(JSON);



                        data.setValue(0, 1, Respuesta[0].HUMEDAD);

                        chart.draw(data, options);
                    }, 1000);
                }
            </script>
            <br>
            <div class="container-fluid">
                <div class="card border-dark">
                    <div class="card-header bg-light">
                        <div class="d-flex flex-row bd-highlight">
                            <div class="mr-auto p-2 bd-highlight" style="font-family: monospace; color: #000; font-size: large">Dispositivo: 
                                <a style="font-family: monospace; color: #007bff; font-size: large"><?php echo $row['DISPOSITIVO']; ?></a></div>
                            <div class="ml-auto p-2 bd-highlight" style="font-family: monospace; color: #000; font-size: large">Ubicación: 
                                <a style="font-family: monospace; color: #007bff; font-size: large"><?php echo $row['UBICACION']; ?></a></div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card border">
                                <div class="card-body">
                                    <center>
                                        <h5 class="card-title" style="font-family: monospace; color: #000; font-size: x-large">Temperatura °C</h5>
                                        <a id="<?php echo $temperatura ?>"></a>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card border">
                                <div class="card-body">
                                    <center>
                                        <h5 class="card-title" style="font-family: monospace; color: #000; font-size: x-large">Humedad %</h5>
                                        <a id="<?php echo $humedad ?>"></a>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-light">
                        <div class="d-flex flex-row bd-highlight">
                            <div class="mr-auto p-2 bd-highlight" style="font-family: monospace; color: #000; font-size: small">
                                <a style="font-family: monospace; color: #007bff; font-size: small"><?php echo $row['FECHA']; ?></a>
                            </div>
                            <div class="ml-auto " style="font-family: monospace; color: #000; font-size: x-large"> 
                                <a class="btn btn-info"  href="grafica.php?fl_ubicacion=<?php echo $row['fl_ubicacion']; ?>&fl_dispositivo=<?php echo $row['fl_dispositivo']; ?>&nb_dispositivo=<?php echo $row['DISPOSITIVO']; ?>&nb_ubicacion=<?php echo $row['UBICACION']; ?>"  role="button" aria-expanded="false" aria-controls="collapseExample">
                                    Gráfica
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <br>
            <?php
        }
        ;
        ?>
            
            
           






        <script src="../assets/js/jquery.min.js" ></script>
        <script src="../assets/js/bootstrap.min.js"></script>

    </body>
</html>