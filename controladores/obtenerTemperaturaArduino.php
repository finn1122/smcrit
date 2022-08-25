<?php
require_once '../config/conexion.php';

//lapso de tiempo entre registros en minutos
$lapso = 10;

$fl_ubicacion = $_GET['fl_ubicacion'];
$fl_dispositivo = $_GET['fl_dispositivo'];
$fl_sensor_temperatura = 1;
$fl_sensor_humedad = 2;
$temperatura = $_GET['temperatura'];
$humedad = $_GET['humedad'];
$temperaturaMax = 25;
$humedadMax =  55;
$nb_ubicacion = 'ubicación';
$nb_dispositivo = 'dispositivo';






$consultarTiempo = mysqli_query($conection, "SELECT fl_monitoreo, TIMEDIFF(NOW( ), fe_registro ) TIEMPO FROM r_monitoreo WHERE fl_dispositivo = $fl_dispositivo ORDER BY fl_monitoreo DESC LIMIT 1");

foreach ($consultarTiempo as $row){
    $tiempo = $row['TIEMPO'];
}

$separado = explode(":", $tiempo);
$hora = $separado[0]; // porción1
$minuto = $separado[1]; // porción2
$segundo = $separado[2]; // porción2



if ($hora > 0){


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
    //temperatura
    $calcularPromedioTemperatura = mysqli_query($conection, "SELECT AVG(no_valor) promedio FROM r_monitoreo WHERE MONTH(fe_registro) = 12 AND fl_t_sensor = '$fl_sensor_temperatura' AND fl_dispositivo = '$fl_dispositivo' AND YEAR(NOW())-1");
    foreach ($calcularPromedioTemperatura as $row){
        $promedio = $row['promedio'];
    }
    
    //humedad
    $calcularPromedioHumedad = mysqli_query($conection, "SELECT AVG(no_valor) promedio FROM r_monitoreo WHERE MONTH(fe_registro) = 12 AND fl_t_sensor = '$fl_sensor_humedad' AND fl_dispositivo = '$fl_dispositivo' AND YEAR(NOW())-1");
    foreach ($calcularPromedioHumedad as $row){
        $promedio = $row['promedio'];
    }
    //temperatura
    $insertarTemperatura = mysqli_query($conection, "INSERT INTO r_monitoreo (fl_monitoreo, no_valor, fe_registro, fl_t_sensor, fl_dispositivo) VALUES (NULL, '$temperatura', current_timestamp(), '$fl_sensor_temperatura', '$fl_dispositivo')");
    $insertarPromedioMensualTemperatura = mysqli_query($conection, "UPDATE g_temperatura SET diciembre= '$promedio'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = YEAR(NOW())-1");
    //humedad
    $insertarHumedad = mysqli_query($conection, "INSERT INTO r_monitoreo (fl_monitoreo, no_valor, fe_registro, fl_t_sensor, fl_dispositivo) VALUES (NULL, '$humedad', current_timestamp(), '$fl_sensor_humedad', '$fl_dispositivo')");
    $insertarPromedioMensualHumedad = mysqli_query($conection, "UPDATE g_humedad SET diciembre= '$promedio'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = YEAR(NOW())-1");
    
    //temperatura
    if ($temperatura >= $temperaturaMax){
        $insertarAlertaTemperatura = mysqli_query($conection, "INSERT INTO r_alerta (fl_alerta, fl_dispositivo, no_valor, fl_t_sensor, fe_registro) VALUES (NULL, '$fl_dispositivo', '$temperatura', '$fl_sensor_temperatura', current_timestamp());");
    }
    
    //humedad
    if ($humedad >= $humedadMax){
        $insertarAlertaHumedad = mysqli_query($conection, "INSERT INTO r_alerta (fl_alerta, fl_dispositivo, no_valor, fl_t_sensor, fe_registro) VALUES (NULL, '$fl_dispositivo', '$humedad', '$fl_sensor_humedad', current_timestamp());");
    }
    
    
    
}
elseif($diaActual == 1 && $mesActual > 1) {
    //temperatura
    $calcularPromedioTemperatura = mysqli_query($conection, "SELECT AVG(no_valor) promedio FROM r_monitoreo WHERE MONTH(fe_registro) = '$mesAnterior' AND fl_t_sensor = '$fl_sensor_temperatura' AND fl_dispositivo = '$fl_dispositivo'");
    foreach ($calcularPromedioTemperatura as $row){
        $promedioTemperatura = $row['promedio'];
        
    }
    //humedad
    $calcularPromedioHumedad = mysqli_query($conection, "SELECT AVG(no_valor) promedio FROM r_monitoreo WHERE MONTH(fe_registro) = '$mesAnterior' AND fl_t_sensor = '$fl_sensor_humedad' AND fl_dispositivo = '$fl_dispositivo'");
    foreach ($calcularPromedioHumedad as $row){
        $promedioHumedad = $row['promedio'];
        
    }
    //temperatura
    $insertarTemperatura = mysqli_query($conection, "INSERT INTO r_monitoreo (fl_monitoreo, no_valor, fe_registro, fl_t_sensor, fl_dispositivo) VALUES (NULL, '$temperatura', current_timestamp(), '$fl_sensor_temperatura', '$fl_dispositivo')");
    $insertarPromedioMensualTemperatura = mysqli_query($conection, "UPDATE g_temperatura SET " .$mesRegistrar. "='$promedioTemperatura'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = YEAR(NOW())");
    //humedad
    $insertarHumedad = mysqli_query($conection, "INSERT INTO r_monitoreo (fl_monitoreo, no_valor, fe_registro, fl_t_sensor, fl_dispositivo) VALUES (NULL, '$humedad', current_timestamp(), '$fl_sensor_humedad', '$fl_dispositivo')");
    $insertarPromedioMensualHumedad = mysqli_query($conection, "UPDATE g_humedad SET " .$mesRegistrar. "='$promedioHumedad'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = YEAR(NOW())");
    
    //temperatura
    if ($temperatura >= $temperaturaMax){
        $insertarAlertaTemperatura = mysqli_query($conection, "INSERT INTO r_alerta (fl_alerta, fl_dispositivo, no_valor, fl_t_sensor, fe_registro) VALUES (NULL, '$fl_dispositivo', '$temperatura', '$fl_sensor_temperatura', current_timestamp());");
    }
    
    //humedad
    if ($humedad >= $humedadMax){
        $insertarAlertaHumedad = mysqli_query($conection, "INSERT INTO r_alerta (fl_alerta, fl_dispositivo, no_valor, fl_t_sensor, fe_registro) VALUES (NULL, '$fl_dispositivo', '$humedad', '$fl_sensor_humedad', current_timestamp());");
    }
    
    
    
}

elseif($diaActual > 1 && $mesActual == 1) {
    
    $insertarTemperatura = mysqli_query($conection, "INSERT INTO r_monitoreo (fl_monitoreo, no_valor, fe_registro, fl_t_sensor, fl_dispositivo) VALUES (NULL, '$temperatura', current_timestamp(), '$fl_sensor_temperatura', '$fl_dispositivo')");
    $insertarHumedad = mysqli_query($conection, "INSERT INTO r_monitoreo (fl_monitoreo, no_valor, fe_registro, fl_t_sensor, fl_dispositivo) VALUES (NULL, '$humedad', current_timestamp(), '$fl_sensor_humedad', '$fl_dispositivo')");
    
    //temperatura
    if ($temperatura >= $temperaturaMax){
        $insertarAlertaTemperatura = mysqli_query($conection, "INSERT INTO r_alerta (fl_alerta, fl_dispositivo, no_valor, fl_t_sensor, fe_registro) VALUES (NULL, '$fl_dispositivo', '$temperatura', '$fl_sensor_temperatura', current_timestamp());");
        require_once '../controladores/mail.php';
        
        enviarAlerta($conection, $temperatura, $humedad, $nb_ubicacion, $nb_dispositivo);
        
    }
    
    //humedad
    if ($humedad >= $humedadMax){
        $insertarAlertaHumedad = mysqli_query($conection, "INSERT INTO r_alerta (fl_alerta, fl_dispositivo, no_valor, fl_t_sensor, fe_registro) VALUES (NULL, '$fl_dispositivo', '$humedad', '$fl_sensor_humedad', current_timestamp());");
        //enviarAlerta($conection, $temperatura, $nb_ubicacion, $nb_dispositivo);
    }

}

    elseif($diaActual > 1 && $mesActual > 1){

    $insertarTemperatura = mysqli_query($conection, "INSERT INTO r_monitoreo (fl_monitoreo, no_valor, fe_registro, fl_t_sensor, fl_dispositivo) VALUES (NULL, '$temperatura', current_timestamp(), '$fl_sensor_temperatura', '$fl_dispositivo')");
    $insertarHumedad = mysqli_query($conection, "INSERT INTO r_monitoreo (fl_monitoreo, no_valor, fe_registro, fl_t_sensor, fl_dispositivo) VALUES (NULL, '$humedad', current_timestamp(), '$fl_sensor_humedad', '$fl_dispositivo')");
    
    //temperatura
    if ($temperatura >= $temperaturaMax){
        $insertarAlertaTemperatura = mysqli_query($conection, "INSERT INTO r_alerta (fl_alerta, fl_dispositivo, no_valor, fl_t_sensor, fe_registro) VALUES (NULL, '$fl_dispositivo', '$temperatura', '$fl_sensor_temperatura', current_timestamp());");
        require_once '../controladores/mail.php';
        
        enviarAlerta($conection, $temperatura, $humedad, $nb_ubicacion, $nb_dispositivo);
        
    }
    
    //humedad
    if ($humedad >= $humedadMax){
        $insertarAlertaHumedad = mysqli_query($conection, "INSERT INTO r_alerta (fl_alerta, fl_dispositivo, no_valor, fl_t_sensor, fe_registro) VALUES (NULL, '$fl_dispositivo', '$humedad', '$fl_sensor_humedad', current_timestamp());");
        //enviarAlerta($conection, $temperatura, $nb_ubicacion, $nb_dispositivo);
    }

    }
}




if($hora == 0 && $minuto >= $lapso){

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
    //temperatura
    $calcularPromedioTemperatura = mysqli_query($conection, "SELECT AVG(no_valor) promedio FROM r_monitoreo WHERE MONTH(fe_registro) = 12 AND fl_t_sensor = '$fl_sensor_temperatura' AND fl_dispositivo = '$fl_dispositivo' AND YEAR(NOW())-1");
    foreach ($calcularPromedioTemperatura as $row){
        $promedioTemperatura = $row['promedio'];
    }
    
    //humedad
    $calcularPromedioHumedad = mysqli_query($conection, "SELECT AVG(no_valor) promedio FROM r_monitoreo WHERE MONTH(fe_registro) = 12 AND fl_t_sensor = '$fl_sensor_humedad' AND fl_dispositivo = '$fl_dispositivo' AND YEAR(NOW())-1");
    foreach ($calcularPromedioHumedad as $row){
        $promedioHumedad = $row['promedio'];
    }
    //temperatura
    $insertarTemperatura = mysqli_query($conection, "INSERT INTO r_monitoreo (fl_monitoreo, no_valor, fe_registro, fl_t_sensor, fl_dispositivo) VALUES (NULL, '$temperatura', current_timestamp(), '$fl_sensor_temperatura', '$fl_dispositivo')");
    $insertarPromedioMensualTemperatura = mysqli_query($conection, "UPDATE g_temperatura SET diciembre= '$promedioTemperatura'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = YEAR(NOW())-1");
    //humedad
    $insertarHumedad = mysqli_query($conection, "INSERT INTO r_monitoreo (fl_monitoreo, no_valor, fe_registro, fl_t_sensor, fl_dispositivo) VALUES (NULL, '$humedad', current_timestamp(), '$fl_sensor_humedad', '$fl_dispositivo')");
    $insertarPromedioMensualHumedad = mysqli_query($conection, "UPDATE g_humedad SET diciembre= '$promedioHumedad'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = YEAR(NOW())-1");
    
    //temperatura
    if ($temperatura >= $temperaturaMax){
        $insertarAlertaTemperatura = mysqli_query($conection, "INSERT INTO r_alerta (fl_alerta, fl_dispositivo, no_valor, fl_t_sensor, fe_registro) VALUES (NULL, '$fl_dispositivo', '$temperatura', '$fl_sensor_temperatura', current_timestamp());");
    }
    
    //humedad
    if ($humedad >= $humedadMax){
        $insertarAlertaHumedad = mysqli_query($conection, "INSERT INTO r_alerta (fl_alerta, fl_dispositivo, no_valor, fl_t_sensor, fe_registro) VALUES (NULL, '$fl_dispositivo', '$humedad', '$fl_sensor_humedad', current_timestamp());");
    }
    
    
    
}
elseif($diaActual == 1 && $mesActual > 1) {
    //temperatura
    $calcularPromedioTemperatura = mysqli_query($conection, "SELECT AVG(no_valor) promedio FROM r_monitoreo WHERE MONTH(fe_registro) = '$mesAnterior' AND fl_t_sensor = '$fl_sensor_temperatura' AND fl_dispositivo = '$fl_dispositivo'");
    foreach ($calcularPromedioTemperatura as $row){
        $promedioTemperatura = $row['promedio'];
        
    }
    //humedad
    $calcularPromedioHumedad = mysqli_query($conection, "SELECT AVG(no_valor) promedio FROM r_monitoreo WHERE MONTH(fe_registro) = '$mesAnterior' AND fl_t_sensor = '$fl_sensor_humedad' AND fl_dispositivo = '$fl_dispositivo'");
    foreach ($calcularPromedioHumedad as $row){
        $promedioHumedad = $row['promedio'];
        
    }
    //temperatura
    $insertarTemperatura = mysqli_query($conection, "INSERT INTO r_monitoreo (fl_monitoreo, no_valor, fe_registro, fl_t_sensor, fl_dispositivo) VALUES (NULL, '$temperatura', current_timestamp(), '$fl_sensor_temperatura', '$fl_dispositivo')");
    $insertarPromedioMensualTemperatura = mysqli_query($conection, "UPDATE g_temperatura SET " .$mesRegistrar. "='$promedioTemperatura'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = YEAR(NOW())");
    //humedad
    $insertarHumedad = mysqli_query($conection, "INSERT INTO r_monitoreo (fl_monitoreo, no_valor, fe_registro, fl_t_sensor, fl_dispositivo) VALUES (NULL, '$humedad', current_timestamp(), '$fl_sensor_humedad', '$fl_dispositivo')");
    $insertarPromedioMensualHumedad = mysqli_query($conection, "UPDATE g_humedad SET " .$mesRegistrar. "='$promedioHumedad'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = YEAR(NOW())");
    
    //temperatura
    if ($temperatura >= $temperaturaMax){
        $insertarAlertaTemperatura = mysqli_query($conection, "INSERT INTO r_alerta (fl_alerta, fl_dispositivo, no_valor, fl_t_sensor, fe_registro) VALUES (NULL, '$fl_dispositivo', '$temperatura', '$fl_sensor_temperatura', current_timestamp());");
    }
    
    //humedad
    if ($humedad >= $humedadMax){
        $insertarAlertaHumedad = mysqli_query($conection, "INSERT INTO r_alerta (fl_alerta, fl_dispositivo, no_valor, fl_t_sensor, fe_registro) VALUES (NULL, '$fl_dispositivo', '$humedad', '$fl_sensor_humedad', current_timestamp());");
    }
    
    
    
}

elseif($diaActual > 1 && $mesActual == 1) {
    
    $insertarTemperatura = mysqli_query($conection, "INSERT INTO r_monitoreo (fl_monitoreo, no_valor, fe_registro, fl_t_sensor, fl_dispositivo) VALUES (NULL, '$temperatura', current_timestamp(), '$fl_sensor_temperatura', '$fl_dispositivo')");
    $insertarHumedad = mysqli_query($conection, "INSERT INTO r_monitoreo (fl_monitoreo, no_valor, fe_registro, fl_t_sensor, fl_dispositivo) VALUES (NULL, '$humedad', current_timestamp(), '$fl_sensor_humedad', '$fl_dispositivo')");
    
    //temperatura
    if ($temperatura >= $temperaturaMax){
        $insertarAlertaTemperatura = mysqli_query($conection, "INSERT INTO r_alerta (fl_alerta, fl_dispositivo, no_valor, fl_t_sensor, fe_registro) VALUES (NULL, '$fl_dispositivo', '$temperatura', '$fl_sensor_temperatura', current_timestamp());");
        require_once '../controladores/mail.php';
        
        enviarAlerta($conection, $temperatura, $humedad, $nb_ubicacion, $nb_dispositivo);
        
    }
    
    //humedad
    if ($humedad >= $humedadMax){
        $insertarAlertaHumedad = mysqli_query($conection, "INSERT INTO r_alerta (fl_alerta, fl_dispositivo, no_valor, fl_t_sensor, fe_registro) VALUES (NULL, '$fl_dispositivo', '$humedad', '$fl_sensor_humedad', current_timestamp());");
        //enviarAlerta($conection, $temperatura, $nb_ubicacion, $nb_dispositivo);
    }

    echo 'entre aqui hora = 0 y minuto mayor a 10';
}

elseif($diaActual > 1 && $mesActual > 1){

    $insertarTemperatura = mysqli_query($conection, "INSERT INTO r_monitoreo (fl_monitoreo, no_valor, fe_registro, fl_t_sensor, fl_dispositivo) VALUES (NULL, '$temperatura', current_timestamp(), '$fl_sensor_temperatura', '$fl_dispositivo')");
    $insertarHumedad = mysqli_query($conection, "INSERT INTO r_monitoreo (fl_monitoreo, no_valor, fe_registro, fl_t_sensor, fl_dispositivo) VALUES (NULL, '$humedad', current_timestamp(), '$fl_sensor_humedad', '$fl_dispositivo')");
    
    //temperatura
    if ($temperatura >= $temperaturaMax){
        $insertarAlertaTemperatura = mysqli_query($conection, "INSERT INTO r_alerta (fl_alerta, fl_dispositivo, no_valor, fl_t_sensor, fe_registro) VALUES (NULL, '$fl_dispositivo', '$temperatura', '$fl_sensor_temperatura', current_timestamp());");
        require_once '../controladores/mail.php';
        
        enviarAlerta($conection, $temperatura, $humedad, $nb_ubicacion, $nb_dispositivo);
        
    }
    
    //humedad
    if ($humedad >= $humedadMax){
        $insertarAlertaHumedad = mysqli_query($conection, "INSERT INTO r_alerta (fl_alerta, fl_dispositivo, no_valor, fl_t_sensor, fe_registro) VALUES (NULL, '$fl_dispositivo', '$humedad', '$fl_sensor_humedad', current_timestamp());");
        //enviarAlerta($conection, $temperatura, $nb_ubicacion, $nb_dispositivo);
    }

    }
}




?>

