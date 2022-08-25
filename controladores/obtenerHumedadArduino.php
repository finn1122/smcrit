<?php
require_once '../config/conexion.php';
$fl_ubicacion = $_GET['fl_ubicacion'];
$fl_dispositivo = $_GET['fl_dispositivo'];
$fl_sensor_humedad = $_GET['fl_t_sensor'];
$humedad = $_GET['humedad'];



$consultarDia = mysqli_query($conection, "SELECT DAY(NOW()) dia");
$consultarMes = mysqli_query($conection, "SELECT MONTH(NOW()) mes");

foreach ($consultarDia as $dia){
    $diaActual = $dia['dia'];
}

foreach ($consultarMes as $mes) {

    $mesActual = $mes['mes'];
}
$mesAnterior = $mesActual - 1;

if ($mesAnterior == 1) {
    $mesRegistrar = 'enero';
    //echo $mesRegistrar;
} elseif ($mesAnterior == 2) {
    $mesRegistrar = 'febrero';
    //echo $mesRegistrar;
} elseif ($mesAnterior == 3) {
    $mesRegistrar = 'marzo';
    //echo $mesRegistrar;
} elseif ($mesAnterior == 4) {
    $mesRegistrar = 'abril';
    //echo $mesRegistrar;
} elseif ($mesAnterior == 5) {
    $mesRegistrar = 'mayo';
    //echo $mesRegistrar;
} elseif ($mesAnterior == 6) {
    $mesRegistrar = 'junio';
    //echo $mesRegistrar;
} elseif ($mesAnterior == 7) {
    $mesRegistrar = 'julio';
    //echo $mesRegistrar;
} elseif ($mesAnterior == 8) {
    $mesRegistrar = 'agosto';
    //echo $mesRegistrar;
} elseif ($mesAnterior == 9) {
    $mesRegistrar = 'septiembre';
    //echo $mesRegistrar;
} elseif ($mesAnterior == 10) {
    $mesRegistrar = 'octubre';
    //echo $mesRegistrar;
} elseif ($mesAnterior == 11) {
    $mesRegistrar = 'noviembre';
    //echo $mesRegistrar;
} elseif ($mesAnterior == 12) {
    $mesRegistrar = 'diciembre';
    //echo $mesRegistrar;
}


if ($diaActual == 1 && $mesActual == 1){
    $calcularPromedioHumedad = mysqli_query($conection, "SELECT AVG(no_valor) promedio FROM r_monitoreo WHERE MONTH(fe_registro) = 12 AND fl_t_sensor = '$fl_sensor_humedad' AND fl_dispositivo = '$fl_dispositivo' AND YEAR(NOW())-1");
    foreach ($calcularPromedioHumedad as $row){
        $promedio = $row['promedio'];
    }
    $insertarHumedad = mysqli_query($conection, "INSERT INTO r_monitoreo (fl_monitoreo, no_valor, fe_registro, fl_t_sensor, fl_dispositivo) VALUES (NULL, '$humedad', current_timestamp(), '$fl_sensor_humedad', '$fl_dispositivo')");
    $insertarPromedioMensual = mysqli_query($conection, "UPDATE g_humedad SET diciembre= '$promedio'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = YEAR(NOW())-1");
    mysqli_close($conection);
}
elseif($diaActual == 1 && $mesActual != 1) {
    $calcularPromedioHumedad = mysqli_query($conection, "SELECT AVG(no_valor) promedio FROM r_monitoreo WHERE MONTH(fe_registro) = '$mesAnterior' AND fl_t_sensor = '$fl_sensor_humedad' AND fl_dispositivo = '$fl_dispositivo'");
    foreach ($calcularPromedioHumedad as $row){
        $promedio = $row['promedio'];
        
    }
    $insertarHumedad = mysqli_query($conection, "INSERT INTO r_monitoreo (fl_monitoreo, no_valor, fe_registro, fl_t_sensor, fl_dispositivo) VALUES (NULL, '$humedad', current_timestamp(), '$fl_sensor_humedad', '$fl_dispositivo')");
    $insertarPromedioMensual = mysqli_query($conection, "UPDATE g_humedad SET " .$mesRegistrar. "='$promedio'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = YEAR(NOW())");
    mysqli_close($conection);
}

elseif($diaActual != 1 && $mesActual != 1) {
    
    $insertarHumedad = mysqli_query($conection, "INSERT INTO r_monitoreo (fl_monitoreo, no_valor, fe_registro, fl_t_sensor, fl_dispositivo) VALUES (NULL, '$humedad', current_timestamp(), '$fl_sensor_humedad', '$fl_dispositivo')");
    mysqli_close($conection);
    echo 'entre aqui';
}


?>

