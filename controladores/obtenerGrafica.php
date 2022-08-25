<?php
require_once '../config/conexion.php';

$fl_dispositivo = $_POST['fl_dispositivo'];
$fl_ubicacion = $_POST['fl_ubicacion'];
$anio = $_POST['anio'];
//$nb_dispositivo = $_GET['nb_dispositivo'];
//$nb_ubicacion = $_GET['nb_ubicacion'];
//consulta para obtener el promedio mensual de g_humedad para generar grafica de humedad
$queryHumedad = mysqli_query($conection, "SELECT * FROM g_humedad WHERE fl_ubicacion='$fl_ubicacion' AND fl_dispositivo='$fl_dispositivo' AND anio = '$anio'");
foreach ($queryHumedad as $row) {
    $anio = $row['anio'];
}
//consulta para obtener el promedio mensual de g_temperatura para generar grafica de temperatura
$queryTemperatura = mysqli_query($conection, "SELECT * FROM g_temperatura WHERE fl_ubicacion='$fl_ubicacion' AND fl_dispositivo='$fl_dispositivo'  AND anio = '$anio'");

//consulta para obtener el ultimo año disponible para graficar
$queryUltimoAnio = mysqli_query($conection, "SELECT anio FROM g_humedad WHERE fl_dispositivo = '$fl_dispositivo' AND fl_ubicacion = '$fl_ubicacion' ORDER BY anio DESC LIMIT 1");
foreach ($queryUltimoAnio as $rowUltimoAnio) {
    $anioUltimoTabla = $rowUltimoAnio['anio'];
}

mysqli_close($conection);
?>

<html>
    <div class="card border-dark">
        <div class="row">
            <div class="col-sm-12">
                <div class="card border">
                    <div class="card-body">
                        <center>
                            <h5 class="card-title" style="font-family: monospace; color: #000; font-size: x-large">Promedio mensual <?php echo $anio; ?></h5>
                            <div class="mr-auto p-2 bd-highlight" style="font-family: monospace; color: #000; font-size: large"><div class="d-flex flex-row bd-highlight">
                                    <div class="ml-auto p-2 bd-highlight">
                                        <span class="badge badge-info" data-toggle="modal" data-target="#exampleModal">
                                            ¿Falta algún dato?
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <center>
                                <canvas id="lineChart" style="max-width:1000px"></canvas>
                            </center>
                        </center>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-footer bg-light">

        </div>


    </div>
    <br>
    <div class="card-header alert-info">
        <div class="d-flex flex-row bd-highlight">
            <div class="mr-auto p-2 bd-highlight" style="font-family: monospace; color: #000; font-size: large">Gráfica disponible hasta: 
                <a style="font-family: monospace; color: #007bff; font-size: large"><?php echo $anioUltimoTabla ?></a></div>
            <div class="mr-auto p-8 bd-highlight" style="font-family: monospace; color: #000; font-size: large"></div>
            <div class="ml-auto p-2 bd-highlight" style="font-family: monospace; color: #000; font-size: large"><a type="button" class="btn btn-primary btn-sm" href="../controladores/agregarAnioGrafica.php?fl_dispositivo=<?php echo $fl_dispositivo; ?>&fl_ubicacion=<?php echo $fl_ubicacion; ?>">Agregar año</a>
</div>

        </div>
    </div>

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
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sincronización</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    Si considera que hace falta un dato presione sincronizar.
                    <br>
                    El promedio se calcula de forma automática el día 1 de cada mes, si el servidor estuvo fuera de servicio en esta fecha es necesario presionar el botón sincronizar.

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a class="btn btn-info" role="button" aria-expanded="false" aria-controls="collapseExample" href="/smcrit/controladores/sincronizarGrafica.php?fl_dispositivo=<?php echo $fl_dispositivo ?>&fl_ubicacion=<?php echo $fl_ubicacion ?>&anio=<?php echo $anio ?>">
                        Sincronizar
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/js/bootstrap.min.js"></script>


</html>
