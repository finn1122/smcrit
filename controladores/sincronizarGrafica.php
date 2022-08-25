<?php

require_once '../config/conexion.php';

$fl_dispositivo = $_GET['fl_dispositivo'];
$fl_ubicacion = $_GET['fl_ubicacion'];
$anio = $_GET['anio'];
$nb_dispositivo = $_GET['nb_dispositivo'];
$nb_ubicacion = $_GET['nb_ubicacion'];

$query = mysqli_query($conection, "SELECT MONTH(NOW()) mes, YEAR(NOW()) anio");

foreach ($query as $row) {
    //$mesActual = $row['mes'];
    $mesActual = 2;
    $anioActual = $row['anio'];
}

if ($anio == $anioActual) {
    
    if($mesActual == 1){
        echo 'El mes actual es enero, la sincronización no necesaria.';
    }

    if ($mesActual == 2) {
        //calcular promedio temperatura enero
        $calcularPromedioTemperatura = mysqli_query($conection, "SELECT AVG(no_valor) promedioEneroTemperatura FROM r_monitoreo WHERE MONTH(fe_registro) = 1 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperatura as $rowEneroTemperatura) {
            $promedioEneroTemperatura = $rowEneroTemperatura['promedioEneroTemperatura'];
        }
        //calcular promedio humedad enero
        $calcularPromedioHumedad = mysqli_query($conection, "SELECT AVG(no_valor) promedioEneroHumedad FROM r_monitoreo WHERE MONTH(fe_registro) = 1 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedad as $rowEneroHumedad) {
            $promedioEneroHumedad = $rowEneroHumedad['promedioEneroHumedad'];
        }

        //insertar promedio de temperatura de enero
        $insertarPromedioMensualTemperaturaEnero = mysqli_query($conection, "UPDATE g_temperatura SET enero= '$promedioEneroTemperatura'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad enero
        $insertarPromedioMensualHumedadEnero = mysqli_query($conection, "UPDATE g_humedad SET enero= '$promedioEneroHumedad'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        //echo $promedioEneroTemperatura . ' ' . $promedioEneroHumedad;
    }elseif($mesActual ==3){
        //calcular promedio temperatura enero
        $calcularPromedioTemperaturaEnero = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaEnero FROM r_monitoreo WHERE MONTH(fe_registro) = 1 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaEnero as $rowTemperaturaEnero) {
            $promedioTemperaturaEnero = $rowTemperaturaEnero['promedioTemperaturaEnero'];
        }
        //calcular promedio humedad enero
        $calcularPromedioHumedadEnero = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadEnero FROM r_monitoreo WHERE MONTH(fe_registro) = 1 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadEnero as $rowHumedadEnero) {
            $promedioHumedadEnero = $rowHumedadEnero['promedioHumedadEnero'];
        }
        
        //calcular promedio temperatura febrero
        $calcularPromedioTemperaturaFebrero = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaFebrero FROM r_monitoreo WHERE MONTH(fe_registro) = 2 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaFebrero as $rowTemperaturaFebrero) {
            $promedioTemperaturaFebrero = $rowTemperaturaFebrero['promedioTemperaturaFebrero'];
        }
        //calcular promedio humedad febrero
        $calcularPromedioHumedadFebrero = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadFebrero FROM r_monitoreo WHERE MONTH(fe_registro) = 2 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadFebrero as $rowHumedadFebrero) {
            $promedioHumedadFebrero = $rowHumedadFebrero['promedioHumedadFebrero'];
        }

        //insertar promedio de temperatura de enero
        $insertarPromedioMensualTemperaturaEnero = mysqli_query($conection, "UPDATE g_temperatura SET enero= '$promedioTemperaturaEnero'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad enero
        $insertarPromedioMensualHumedadEnero = mysqli_query($conection, "UPDATE g_humedad SET enero= '$promedioHumedadEnero'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de febrero
        $insertarPromedioMensualTemperaturaFebrero = mysqli_query($conection, "UPDATE g_temperatura SET febrero= '$promedioTemperaturaFebrero'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad febrero
        $insertarPromedioMensualHumedadFebrero = mysqli_query($conection, "UPDATE g_humedad SET febrero= '$promedioHumedadFebrero'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
    }elseif($mesActual ==4){
        //calcular promedio temperatura enero
        $calcularPromedioTemperaturaEnero = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaEnero FROM r_monitoreo WHERE MONTH(fe_registro) = 1 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaEnero as $rowTemperaturaEnero) {
            $promedioTemperaturaEnero = $rowTemperaturaEnero['promedioTemperaturaEnero'];
        }
        //calcular promedio humedad enero
        $calcularPromedioHumedadEnero = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadEnero FROM r_monitoreo WHERE MONTH(fe_registro) = 1 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadEnero as $rowHumedadEnero) {
            $promedioHumedadEnero = $rowHumedadEnero['promedioHumedadEnero'];
        }
        
        //calcular promedio temperatura febrero
        $calcularPromedioTemperaturaFebrero = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaFebrero FROM r_monitoreo WHERE MONTH(fe_registro) = 2 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaFebrero as $rowTemperaturaFebrero) {
            $promedioTemperaturaFebrero = $rowTemperaturaFebrero['promedioTemperaturaFebrero'];
        }
        //calcular promedio humedad febrero
        $calcularPromedioHumedadFebrero = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadFebrero FROM r_monitoreo WHERE MONTH(fe_registro) = 2 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadFebrero as $rowHumedadFebrero) {
            $promedioHumedadFebrero = $rowHumedadFebrero['promedioHumedadFebrero'];
        }
        
        //calcular promedio temperatura marzo
        $calcularPromedioTemperaturaMarzo = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaMarzo FROM r_monitoreo WHERE MONTH(fe_registro) = 3 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaMarzo as $rowTemperaturaMarzo) {
            $promedioTemperaturaMarzo = $rowTemperaturaMarzo['promedioTemperaturaMarzo'];
        }
        //calcular promedio humedad marzo
        $calcularPromedioHumedadMarzo = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadMarzo FROM r_monitoreo WHERE MONTH(fe_registro) = 3 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadMarzo as $rowHumedadMarzo) {
            $promedioHumedadMarzo = $rowHumedadMarzo['promedioHumedadMarzo'];
        }

        //insertar promedio de temperatura de enero
        $insertarPromedioMensualTemperaturaEnero = mysqli_query($conection, "UPDATE g_temperatura SET enero= '$promedioTemperaturaEnero'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad enero
        $insertarPromedioMensualHumedadEnero = mysqli_query($conection, "UPDATE g_humedad SET enero= '$promedioHumedadEnero'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de febrero
        $insertarPromedioMensualTemperaturaFebrero = mysqli_query($conection, "UPDATE g_temperatura SET febrero= '$promedioTemperaturaFebrero'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad febrero
        $insertarPromedioMensualHumedadFebrero = mysqli_query($conection, "UPDATE g_humedad SET febrero= '$promedioHumedadFebrero'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de marzo
        $insertarPromedioMensualTemperaturaMarzo = mysqli_query($conection, "UPDATE g_temperatura SET marzo= '$promedioTemperaturaMarzo'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad marzo
        $insertarPromedioMensualHumedadMarzo = mysqli_query($conection, "UPDATE g_humedad SET marzo= '$promedioHumedadMarzo'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
    }elseif($mesActual ==5){
        //calcular promedio temperatura enero
        $calcularPromedioTemperaturaEnero = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaEnero FROM r_monitoreo WHERE MONTH(fe_registro) = 1 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaEnero as $rowTemperaturaEnero) {
            $promedioTemperaturaEnero = $rowTemperaturaEnero['promedioTemperaturaEnero'];
        }
        //calcular promedio humedad enero
        $calcularPromedioHumedadEnero = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadEnero FROM r_monitoreo WHERE MONTH(fe_registro) = 1 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadEnero as $rowHumedadEnero) {
            $promedioHumedadEnero = $rowHumedadEnero['promedioHumedadEnero'];
        }
        
        //calcular promedio temperatura febrero
        $calcularPromedioTemperaturaFebrero = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaFebrero FROM r_monitoreo WHERE MONTH(fe_registro) = 2 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaFebrero as $rowTemperaturaFebrero) {
            $promedioTemperaturaFebrero = $rowTemperaturaFebrero['promedioTemperaturaFebrero'];
        }
        //calcular promedio humedad febrero
        $calcularPromedioHumedadFebrero = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadFebrero FROM r_monitoreo WHERE MONTH(fe_registro) = 2 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadFebrero as $rowHumedadFebrero) {
            $promedioHumedadFebrero = $rowHumedadFebrero['promedioHumedadFebrero'];
        }
        
        //calcular promedio temperatura marzo
        $calcularPromedioTemperaturaMarzo = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaMarzo FROM r_monitoreo WHERE MONTH(fe_registro) = 3 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaMarzo as $rowTemperaturaMarzo) {
            $promedioTemperaturaMarzo = $rowTemperaturaMarzo['promedioTemperaturaMarzo'];
        }
        //calcular promedio humedad marzo
        $calcularPromedioHumedadMarzo = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadMarzo FROM r_monitoreo WHERE MONTH(fe_registro) = 3 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadMarzo as $rowHumedadMarzo) {
            $promedioHumedadMarzo = $rowHumedadMarzo['promedioHumedadMarzo'];
        }
        
        //calcular promedio temperatura abril
        $calcularPromedioTemperaturaAbril = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaAbril FROM r_monitoreo WHERE MONTH(fe_registro) = 4 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaAbril as $rowTemperaturaAbril) {
            $promedioTemperaturaAbril = $rowTemperaturaAbril['promedioTemperaturaAbril'];
        }
        //calcular promedio humedad Abril
        $calcularPromedioHumedadAbril = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadAbril FROM r_monitoreo WHERE MONTH(fe_registro) = 4 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadAbril as $rowHumedadAbril) {
            $promedioHumedadAbril = $rowHumedadAbril['promedioHumedadAbril'];
        }

        //insertar promedio de temperatura de enero
        $insertarPromedioMensualTemperaturaEnero = mysqli_query($conection, "UPDATE g_temperatura SET enero= '$promedioTemperaturaEnero'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad enero
        $insertarPromedioMensualHumedadEnero = mysqli_query($conection, "UPDATE g_humedad SET enero= '$promedioHumedadEnero'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de febrero
        $insertarPromedioMensualTemperaturaFebrero = mysqli_query($conection, "UPDATE g_temperatura SET febrero= '$promedioTemperaturaFebrero'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad febrero
        $insertarPromedioMensualHumedadFebrero = mysqli_query($conection, "UPDATE g_humedad SET febrero= '$promedioHumedadFebrero'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de marzo
        $insertarPromedioMensualTemperaturaMarzo = mysqli_query($conection, "UPDATE g_temperatura SET marzo= '$promedioTemperaturaMarzo'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad marzo
        $insertarPromedioMensualHumedadMarzo = mysqli_query($conection, "UPDATE g_humedad SET marzo= '$promedioHumedadMarzo'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Abril
        $insertarPromedioMensualTemperaturaAbril = mysqli_query($conection, "UPDATE g_temperatura SET abril= '$promedioTemperaturaAbril'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Abril
        $insertarPromedioMensualHumedadAbril = mysqli_query($conection, "UPDATE g_humedad SET abril= '$promedioHumedadAbril'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
    }elseif($mesActual ==6){
        //calcular promedio temperatura enero
        $calcularPromedioTemperaturaEnero = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaEnero FROM r_monitoreo WHERE MONTH(fe_registro) = 1 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaEnero as $rowTemperaturaEnero) {
            $promedioTemperaturaEnero = $rowTemperaturaEnero['promedioTemperaturaEnero'];
        }
        //calcular promedio humedad enero
        $calcularPromedioHumedadEnero = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadEnero FROM r_monitoreo WHERE MONTH(fe_registro) = 1 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadEnero as $rowHumedadEnero) {
            $promedioHumedadEnero = $rowHumedadEnero['promedioHumedadEnero'];
        }
        
        //calcular promedio temperatura febrero
        $calcularPromedioTemperaturaFebrero = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaFebrero FROM r_monitoreo WHERE MONTH(fe_registro) = 2 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaFebrero as $rowTemperaturaFebrero) {
            $promedioTemperaturaFebrero = $rowTemperaturaFebrero['promedioTemperaturaFebrero'];
        }
        //calcular promedio humedad febrero
        $calcularPromedioHumedadFebrero = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadFebrero FROM r_monitoreo WHERE MONTH(fe_registro) = 2 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadFebrero as $rowHumedadFebrero) {
            $promedioHumedadFebrero = $rowHumedadFebrero['promedioHumedadFebrero'];
        }
        
        //calcular promedio temperatura marzo
        $calcularPromedioTemperaturaMarzo = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaMarzo FROM r_monitoreo WHERE MONTH(fe_registro) = 3 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaMarzo as $rowTemperaturaMarzo) {
            $promedioTemperaturaMarzo = $rowTemperaturaMarzo['promedioTemperaturaMarzo'];
        }
        //calcular promedio humedad marzo
        $calcularPromedioHumedadMarzo = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadMarzo FROM r_monitoreo WHERE MONTH(fe_registro) = 3 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadMarzo as $rowHumedadMarzo) {
            $promedioHumedadMarzo = $rowHumedadMarzo['promedioHumedadMarzo'];
        }
        
        //calcular promedio temperatura abril
        $calcularPromedioTemperaturaAbril = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaAbril FROM r_monitoreo WHERE MONTH(fe_registro) = 4 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaAbril as $rowTemperaturaAbril) {
            $promedioTemperaturaAbril = $rowTemperaturaAbril['promedioTemperaturaAbril'];
        }
        //calcular promedio humedad Abril
        $calcularPromedioHumedadAbril = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadAbril FROM r_monitoreo WHERE MONTH(fe_registro) = 4 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadAbril as $rowHumedadAbril) {
            $promedioHumedadAbril = $rowHumedadAbril['promedioHumedadAbril'];
        }
        
        //calcular promedio temperatura Mayo
        $calcularPromedioTemperaturaMayo = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaMayo FROM r_monitoreo WHERE MONTH(fe_registro) = 5 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaMayo as $rowTemperaturaMayo) {
            $promedioTemperaturaMayo = $rowTemperaturaMayo['promedioTemperaturaMayo'];
        }
        
        //calcular promedio humedad Mayo
        $calcularPromedioHumedadMayo = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadMayo FROM r_monitoreo WHERE MONTH(fe_registro) = 5 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadMayo as $rowHumedadMayo) {
            $promedioHumedadMayo = $rowHumedadMayo['promedioHumedadMayo'];
        }

        //insertar promedio de temperatura de enero
        $insertarPromedioMensualTemperaturaEnero = mysqli_query($conection, "UPDATE g_temperatura SET enero= '$promedioTemperaturaEnero'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad enero
        $insertarPromedioMensualHumedadEnero = mysqli_query($conection, "UPDATE g_humedad SET enero= '$promedioHumedadEnero'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de febrero
        $insertarPromedioMensualTemperaturaFebrero = mysqli_query($conection, "UPDATE g_temperatura SET febrero= '$promedioTemperaturaFebrero'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad febrero
        $insertarPromedioMensualHumedadFebrero = mysqli_query($conection, "UPDATE g_humedad SET febrero= '$promedioHumedadFebrero'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de marzo
        $insertarPromedioMensualTemperaturaMarzo = mysqli_query($conection, "UPDATE g_temperatura SET marzo= '$promedioTemperaturaMarzo'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad marzo
        $insertarPromedioMensualHumedadMarzo = mysqli_query($conection, "UPDATE g_humedad SET marzo= '$promedioHumedadMarzo'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Abril
        $insertarPromedioMensualTemperaturaAbril = mysqli_query($conection, "UPDATE g_temperatura SET abril= '$promedioTemperaturaAbril'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Abril
        $insertarPromedioMensualHumedadAbril = mysqli_query($conection, "UPDATE g_humedad SET abril= '$promedioHumedadAbril'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Mayo
        $insertarPromedioMensualTemperaturaMayo = mysqli_query($conection, "UPDATE g_temperatura SET mayo= '$promedioTemperaturaMayo'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Mayo
        $insertarPromedioMensualHumedadMayo = mysqli_query($conection, "UPDATE g_humedad SET mayo= '$promedioHumedadMayo'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
    }elseif($mesActual ==7){
        //calcular promedio temperatura enero
        $calcularPromedioTemperaturaEnero = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaEnero FROM r_monitoreo WHERE MONTH(fe_registro) = 1 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaEnero as $rowTemperaturaEnero) {
            $promedioTemperaturaEnero = $rowTemperaturaEnero['promedioTemperaturaEnero'];
        }
        //calcular promedio humedad enero
        $calcularPromedioHumedadEnero = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadEnero FROM r_monitoreo WHERE MONTH(fe_registro) = 1 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadEnero as $rowHumedadEnero) {
            $promedioHumedadEnero = $rowHumedadEnero['promedioHumedadEnero'];
        }
        
        //calcular promedio temperatura febrero
        $calcularPromedioTemperaturaFebrero = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaFebrero FROM r_monitoreo WHERE MONTH(fe_registro) = 2 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaFebrero as $rowTemperaturaFebrero) {
            $promedioTemperaturaFebrero = $rowTemperaturaFebrero['promedioTemperaturaFebrero'];
        }
        //calcular promedio humedad febrero
        $calcularPromedioHumedadFebrero = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadFebrero FROM r_monitoreo WHERE MONTH(fe_registro) = 2 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadFebrero as $rowHumedadFebrero) {
            $promedioHumedadFebrero = $rowHumedadFebrero['promedioHumedadFebrero'];
        }
        
        //calcular promedio temperatura marzo
        $calcularPromedioTemperaturaMarzo = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaMarzo FROM r_monitoreo WHERE MONTH(fe_registro) = 3 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaMarzo as $rowTemperaturaMarzo) {
            $promedioTemperaturaMarzo = $rowTemperaturaMarzo['promedioTemperaturaMarzo'];
        }
        //calcular promedio humedad marzo
        $calcularPromedioHumedadMarzo = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadMarzo FROM r_monitoreo WHERE MONTH(fe_registro) = 3 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadMarzo as $rowHumedadMarzo) {
            $promedioHumedadMarzo = $rowHumedadMarzo['promedioHumedadMarzo'];
        }
        
        //calcular promedio temperatura abril
        $calcularPromedioTemperaturaAbril = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaAbril FROM r_monitoreo WHERE MONTH(fe_registro) = 4 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaAbril as $rowTemperaturaAbril) {
            $promedioTemperaturaAbril = $rowTemperaturaAbril['promedioTemperaturaAbril'];
        }
        //calcular promedio humedad Abril
        $calcularPromedioHumedadAbril = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadAbril FROM r_monitoreo WHERE MONTH(fe_registro) = 4 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadAbril as $rowHumedadAbril) {
            $promedioHumedadAbril = $rowHumedadAbril['promedioHumedadAbril'];
        }
        
        //calcular promedio temperatura Mayo
        $calcularPromedioTemperaturaMayo = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaMayo FROM r_monitoreo WHERE MONTH(fe_registro) = 5 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaMayo as $rowTemperaturaMayo) {
            $promedioTemperaturaMayo = $rowTemperaturaMayo['promedioTemperaturaMayo'];
        }
        
        //calcular promedio humedad Mayo
        $calcularPromedioHumedadMayo = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadMayo FROM r_monitoreo WHERE MONTH(fe_registro) = 5 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadMayo as $rowHumedadMayo) {
            $promedioHumedadMayo = $rowHumedadMayo['promedioHumedadMayo'];
        }
        
        //calcular promedio temperatura Junio
        $calcularPromedioTemperaturaJunio = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaJunio FROM r_monitoreo WHERE MONTH(fe_registro) = 6 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaJunio as $rowTemperaturaJunio) {
            $promedioTemperaturaJunio = $rowTemperaturaJunio['promedioTemperaturaJunio'];
        }
        
        //calcular promedio humedad Junio
        $calcularPromedioHumedadJunio = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadJunio FROM r_monitoreo WHERE MONTH(fe_registro) = 6 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadJunio as $rowHumedadJunio) {
            $promedioHumedadJunio = $rowHumedadJunio['promedioHumedadJunio'];
        }

        //insertar promedio de temperatura de enero
        $insertarPromedioMensualTemperaturaEnero = mysqli_query($conection, "UPDATE g_temperatura SET enero= '$promedioTemperaturaEnero'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad enero
        $insertarPromedioMensualHumedadEnero = mysqli_query($conection, "UPDATE g_humedad SET enero= '$promedioHumedadEnero'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de febrero
        $insertarPromedioMensualTemperaturaFebrero = mysqli_query($conection, "UPDATE g_temperatura SET febrero= '$promedioTemperaturaFebrero'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad febrero
        $insertarPromedioMensualHumedadFebrero = mysqli_query($conection, "UPDATE g_humedad SET febrero= '$promedioHumedadFebrero'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de marzo
        $insertarPromedioMensualTemperaturaMarzo = mysqli_query($conection, "UPDATE g_temperatura SET marzo= '$promedioTemperaturaMarzo'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad marzo
        $insertarPromedioMensualHumedadMarzo = mysqli_query($conection, "UPDATE g_humedad SET marzo= '$promedioHumedadMarzo'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Abril
        $insertarPromedioMensualTemperaturaAbril = mysqli_query($conection, "UPDATE g_temperatura SET abril= '$promedioTemperaturaAbril'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Abril
        $insertarPromedioMensualHumedadAbril = mysqli_query($conection, "UPDATE g_humedad SET abril= '$promedioHumedadAbril'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Mayo
        $insertarPromedioMensualTemperaturaMayo = mysqli_query($conection, "UPDATE g_temperatura SET mayo= '$promedioTemperaturaMayo'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Mayo
        $insertarPromedioMensualHumedadMayo = mysqli_query($conection, "UPDATE g_humedad SET mayo= '$promedioHumedadMayo'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Junio
        $insertarPromedioMensualTemperaturaJunio = mysqli_query($conection, "UPDATE g_temperatura SET junio= '$promedioTemperaturaJunio'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Mayo
        $insertarPromedioMensualHumedadJunio = mysqli_query($conection, "UPDATE g_humedad SET junio= '$promedioHumedadJunio'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
    }elseif($mesActual ==8){
        //calcular promedio temperatura enero
        $calcularPromedioTemperaturaEnero = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaEnero FROM r_monitoreo WHERE MONTH(fe_registro) = 1 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaEnero as $rowTemperaturaEnero) {
            $promedioTemperaturaEnero = $rowTemperaturaEnero['promedioTemperaturaEnero'];
        }
        //calcular promedio humedad enero
        $calcularPromedioHumedadEnero = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadEnero FROM r_monitoreo WHERE MONTH(fe_registro) = 1 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadEnero as $rowHumedadEnero) {
            $promedioHumedadEnero = $rowHumedadEnero['promedioHumedadEnero'];
        }
        
        //calcular promedio temperatura febrero
        $calcularPromedioTemperaturaFebrero = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaFebrero FROM r_monitoreo WHERE MONTH(fe_registro) = 2 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaFebrero as $rowTemperaturaFebrero) {
            $promedioTemperaturaFebrero = $rowTemperaturaFebrero['promedioTemperaturaFebrero'];
        }
        //calcular promedio humedad febrero
        $calcularPromedioHumedadFebrero = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadFebrero FROM r_monitoreo WHERE MONTH(fe_registro) = 2 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadFebrero as $rowHumedadFebrero) {
            $promedioHumedadFebrero = $rowHumedadFebrero['promedioHumedadFebrero'];
        }
        
        //calcular promedio temperatura marzo
        $calcularPromedioTemperaturaMarzo = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaMarzo FROM r_monitoreo WHERE MONTH(fe_registro) = 3 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaMarzo as $rowTemperaturaMarzo) {
            $promedioTemperaturaMarzo = $rowTemperaturaMarzo['promedioTemperaturaMarzo'];
        }
        //calcular promedio humedad marzo
        $calcularPromedioHumedadMarzo = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadMarzo FROM r_monitoreo WHERE MONTH(fe_registro) = 3 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadMarzo as $rowHumedadMarzo) {
            $promedioHumedadMarzo = $rowHumedadMarzo['promedioHumedadMarzo'];
        }
        
        //calcular promedio temperatura abril
        $calcularPromedioTemperaturaAbril = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaAbril FROM r_monitoreo WHERE MONTH(fe_registro) = 4 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaAbril as $rowTemperaturaAbril) {
            $promedioTemperaturaAbril = $rowTemperaturaAbril['promedioTemperaturaAbril'];
        }
        //calcular promedio humedad Abril
        $calcularPromedioHumedadAbril = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadAbril FROM r_monitoreo WHERE MONTH(fe_registro) = 4 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadAbril as $rowHumedadAbril) {
            $promedioHumedadAbril = $rowHumedadAbril['promedioHumedadAbril'];
        }
        
        //calcular promedio temperatura Mayo
        $calcularPromedioTemperaturaMayo = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaMayo FROM r_monitoreo WHERE MONTH(fe_registro) = 5 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaMayo as $rowTemperaturaMayo) {
            $promedioTemperaturaMayo = $rowTemperaturaMayo['promedioTemperaturaMayo'];
        }
        
        //calcular promedio humedad Mayo
        $calcularPromedioHumedadMayo = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadMayo FROM r_monitoreo WHERE MONTH(fe_registro) = 5 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadMayo as $rowHumedadMayo) {
            $promedioHumedadMayo = $rowHumedadMayo['promedioHumedadMayo'];
        }
        
        //calcular promedio temperatura Junio
        $calcularPromedioTemperaturaJunio = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaJunio FROM r_monitoreo WHERE MONTH(fe_registro) = 6 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaJunio as $rowTemperaturaJunio) {
            $promedioTemperaturaJunio = $rowTemperaturaJunio['promedioTemperaturaJunio'];
        }
        
        //calcular promedio humedad Junio
        $calcularPromedioHumedadJunio = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadJunio FROM r_monitoreo WHERE MONTH(fe_registro) = 6 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadJunio as $rowHumedadJunio) {
            $promedioHumedadJunio = $rowHumedadJunio['promedioHumedadJunio'];
        }
        
        //calcular promedio temperatura Julio
        $calcularPromedioTemperaturaJulio = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaJulio FROM r_monitoreo WHERE MONTH(fe_registro) = 7 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaJulio as $rowTemperaturaJulio) {
            $promedioTemperaturaJulio = $rowTemperaturaJulio['promedioTemperaturaJulio'];
        }
        
        //calcular promedio humedad Julio
        $calcularPromedioHumedadJulio = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadJulio FROM r_monitoreo WHERE MONTH(fe_registro) = 7 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadJulio as $rowHumedadJulio) {
            $promedioHumedadJulio = $rowHumedadJulio['promedioHumedadJulio'];
        }

        //insertar promedio de temperatura de enero
        $insertarPromedioMensualTemperaturaEnero = mysqli_query($conection, "UPDATE g_temperatura SET enero= '$promedioTemperaturaEnero'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad enero
        $insertarPromedioMensualHumedadEnero = mysqli_query($conection, "UPDATE g_humedad SET enero= '$promedioHumedadEnero'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de febrero
        $insertarPromedioMensualTemperaturaFebrero = mysqli_query($conection, "UPDATE g_temperatura SET febrero= '$promedioTemperaturaFebrero'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad febrero
        $insertarPromedioMensualHumedadFebrero = mysqli_query($conection, "UPDATE g_humedad SET febrero= '$promedioHumedadFebrero'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de marzo
        $insertarPromedioMensualTemperaturaMarzo = mysqli_query($conection, "UPDATE g_temperatura SET marzo= '$promedioTemperaturaMarzo'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad marzo
        $insertarPromedioMensualHumedadMarzo = mysqli_query($conection, "UPDATE g_humedad SET marzo= '$promedioHumedadMarzo'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Abril
        $insertarPromedioMensualTemperaturaAbril = mysqli_query($conection, "UPDATE g_temperatura SET abril= '$promedioTemperaturaAbril'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Abril
        $insertarPromedioMensualHumedadAbril = mysqli_query($conection, "UPDATE g_humedad SET abril= '$promedioHumedadAbril'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Mayo
        $insertarPromedioMensualTemperaturaMayo = mysqli_query($conection, "UPDATE g_temperatura SET mayo= '$promedioTemperaturaMayo'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Mayo
        $insertarPromedioMensualHumedadMayo = mysqli_query($conection, "UPDATE g_humedad SET mayo= '$promedioHumedadMayo'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Junio
        $insertarPromedioMensualTemperaturaJunio = mysqli_query($conection, "UPDATE g_temperatura SET junio= '$promedioTemperaturaJunio'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Junio
        $insertarPromedioMensualHumedadJunio = mysqli_query($conection, "UPDATE g_humedad SET junio= '$promedioHumedadJunio'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Julio
        $insertarPromedioMensualTemperaturaJulio = mysqli_query($conection, "UPDATE g_temperatura SET julio= '$promedioTemperaturaJulio'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Julio
        $insertarPromedioMensualHumedadJulio = mysqli_query($conection, "UPDATE g_humedad SET julio= '$promedioHumedadJulio'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
}elseif($mesActual ==9){
        //calcular promedio temperatura enero
        $calcularPromedioTemperaturaEnero = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaEnero FROM r_monitoreo WHERE MONTH(fe_registro) = 1 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaEnero as $rowTemperaturaEnero) {
            $promedioTemperaturaEnero = $rowTemperaturaEnero['promedioTemperaturaEnero'];
        }
        //calcular promedio humedad enero
        $calcularPromedioHumedadEnero = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadEnero FROM r_monitoreo WHERE MONTH(fe_registro) = 1 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadEnero as $rowHumedadEnero) {
            $promedioHumedadEnero = $rowHumedadEnero['promedioHumedadEnero'];
        }
        
        //calcular promedio temperatura febrero
        $calcularPromedioTemperaturaFebrero = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaFebrero FROM r_monitoreo WHERE MONTH(fe_registro) = 2 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaFebrero as $rowTemperaturaFebrero) {
            $promedioTemperaturaFebrero = $rowTemperaturaFebrero['promedioTemperaturaFebrero'];
        }
        //calcular promedio humedad febrero
        $calcularPromedioHumedadFebrero = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadFebrero FROM r_monitoreo WHERE MONTH(fe_registro) = 2 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadFebrero as $rowHumedadFebrero) {
            $promedioHumedadFebrero = $rowHumedadFebrero['promedioHumedadFebrero'];
        }
        
        //calcular promedio temperatura marzo
        $calcularPromedioTemperaturaMarzo = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaMarzo FROM r_monitoreo WHERE MONTH(fe_registro) = 3 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaMarzo as $rowTemperaturaMarzo) {
            $promedioTemperaturaMarzo = $rowTemperaturaMarzo['promedioTemperaturaMarzo'];
        }
        //calcular promedio humedad marzo
        $calcularPromedioHumedadMarzo = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadMarzo FROM r_monitoreo WHERE MONTH(fe_registro) = 3 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadMarzo as $rowHumedadMarzo) {
            $promedioHumedadMarzo = $rowHumedadMarzo['promedioHumedadMarzo'];
        }
        
        //calcular promedio temperatura abril
        $calcularPromedioTemperaturaAbril = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaAbril FROM r_monitoreo WHERE MONTH(fe_registro) = 4 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaAbril as $rowTemperaturaAbril) {
            $promedioTemperaturaAbril = $rowTemperaturaAbril['promedioTemperaturaAbril'];
        }
        //calcular promedio humedad Abril
        $calcularPromedioHumedadAbril = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadAbril FROM r_monitoreo WHERE MONTH(fe_registro) = 4 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadAbril as $rowHumedadAbril) {
            $promedioHumedadAbril = $rowHumedadAbril['promedioHumedadAbril'];
        }
        
        //calcular promedio temperatura Mayo
        $calcularPromedioTemperaturaMayo = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaMayo FROM r_monitoreo WHERE MONTH(fe_registro) = 5 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaMayo as $rowTemperaturaMayo) {
            $promedioTemperaturaMayo = $rowTemperaturaMayo['promedioTemperaturaMayo'];
        }
        
        //calcular promedio humedad Mayo
        $calcularPromedioHumedadMayo = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadMayo FROM r_monitoreo WHERE MONTH(fe_registro) = 5 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadMayo as $rowHumedadMayo) {
            $promedioHumedadMayo = $rowHumedadMayo['promedioHumedadMayo'];
        }
        
        //calcular promedio temperatura Junio
        $calcularPromedioTemperaturaJunio = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaJunio FROM r_monitoreo WHERE MONTH(fe_registro) = 6 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaJunio as $rowTemperaturaJunio) {
            $promedioTemperaturaJunio = $rowTemperaturaJunio['promedioTemperaturaJunio'];
        }
        
        //calcular promedio humedad Junio
        $calcularPromedioHumedadJunio = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadJunio FROM r_monitoreo WHERE MONTH(fe_registro) = 6 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadJunio as $rowHumedadJunio) {
            $promedioHumedadJunio = $rowHumedadJunio['promedioHumedadJunio'];
        }
        
        //calcular promedio temperatura Julio
        $calcularPromedioTemperaturaJulio = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaJulio FROM r_monitoreo WHERE MONTH(fe_registro) = 7 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaJulio as $rowTemperaturaJulio) {
            $promedioTemperaturaJulio = $rowTemperaturaJulio['promedioTemperaturaJulio'];
        }
        
        //calcular promedio humedad Julio
        $calcularPromedioHumedadJulio = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadJulio FROM r_monitoreo WHERE MONTH(fe_registro) = 7 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadJulio as $rowHumedadJulio) {
            $promedioHumedadJulio = $rowHumedadJulio['promedioHumedadJulio'];
        }
        
        //calcular promedio temperatura Agosto
        $calcularPromedioTemperaturaAgosto = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaAgosto FROM r_monitoreo WHERE MONTH(fe_registro) = 8 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaAgosto as $rowTemperaturaAgosto) {
            $promedioTemperaturaAgosto = $rowTemperaturaAgosto['promedioTemperaturaAgosto'];
        }
        
        //calcular promedio humedad Agosto
        $calcularPromedioHumedadAgosto = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadAgosto FROM r_monitoreo WHERE MONTH(fe_registro) = 8 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadAgosto as $rowHumedadAgosto) {
            $promedioHumedadAgosto = $rowHumedadAgosto['promedioHumedadAgosto'];
        }

        //insertar promedio de temperatura de enero
        $insertarPromedioMensualTemperaturaEnero = mysqli_query($conection, "UPDATE g_temperatura SET enero= '$promedioTemperaturaEnero'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad enero
        $insertarPromedioMensualHumedadEnero = mysqli_query($conection, "UPDATE g_humedad SET enero= '$promedioHumedadEnero'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de febrero
        $insertarPromedioMensualTemperaturaFebrero = mysqli_query($conection, "UPDATE g_temperatura SET febrero= '$promedioTemperaturaFebrero'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad febrero
        $insertarPromedioMensualHumedadFebrero = mysqli_query($conection, "UPDATE g_humedad SET febrero= '$promedioHumedadFebrero'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de marzo
        $insertarPromedioMensualTemperaturaMarzo = mysqli_query($conection, "UPDATE g_temperatura SET marzo= '$promedioTemperaturaMarzo'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad marzo
        $insertarPromedioMensualHumedadMarzo = mysqli_query($conection, "UPDATE g_humedad SET marzo= '$promedioHumedadMarzo'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Abril
        $insertarPromedioMensualTemperaturaAbril = mysqli_query($conection, "UPDATE g_temperatura SET abril= '$promedioTemperaturaAbril'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Abril
        $insertarPromedioMensualHumedadAbril = mysqli_query($conection, "UPDATE g_humedad SET abril= '$promedioHumedadAbril'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Mayo
        $insertarPromedioMensualTemperaturaMayo = mysqli_query($conection, "UPDATE g_temperatura SET mayo= '$promedioTemperaturaMayo'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Mayo
        $insertarPromedioMensualHumedadMayo = mysqli_query($conection, "UPDATE g_humedad SET mayo= '$promedioHumedadMayo'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Junio
        $insertarPromedioMensualTemperaturaJunio = mysqli_query($conection, "UPDATE g_temperatura SET junio= '$promedioTemperaturaJunio'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Junio
        $insertarPromedioMensualHumedadJunio = mysqli_query($conection, "UPDATE g_humedad SET junio= '$promedioHumedadJunio'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Julio
        $insertarPromedioMensualTemperaturaJulio = mysqli_query($conection, "UPDATE g_temperatura SET julio= '$promedioTemperaturaJulio'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Julio
        $insertarPromedioMensualHumedadJulio = mysqli_query($conection, "UPDATE g_humedad SET julio= '$promedioHumedadJulio'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Agosto
        $insertarPromedioMensualTemperaturaAgosto = mysqli_query($conection, "UPDATE g_temperatura SET agosto= '$promedioTemperaturaAgosto'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Agosto
        $insertarPromedioMensualHumedadAgosto = mysqli_query($conection, "UPDATE g_humedad SET agosto= '$promedioHumedadAgosto'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
    }elseif($mesActual ==10){
        //calcular promedio temperatura enero
        $calcularPromedioTemperaturaEnero = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaEnero FROM r_monitoreo WHERE MONTH(fe_registro) = 1 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaEnero as $rowTemperaturaEnero) {
            $promedioTemperaturaEnero = $rowTemperaturaEnero['promedioTemperaturaEnero'];
        }
        //calcular promedio humedad enero
        $calcularPromedioHumedadEnero = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadEnero FROM r_monitoreo WHERE MONTH(fe_registro) = 1 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadEnero as $rowHumedadEnero) {
            $promedioHumedadEnero = $rowHumedadEnero['promedioHumedadEnero'];
        }
        
        //calcular promedio temperatura febrero
        $calcularPromedioTemperaturaFebrero = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaFebrero FROM r_monitoreo WHERE MONTH(fe_registro) = 2 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaFebrero as $rowTemperaturaFebrero) {
            $promedioTemperaturaFebrero = $rowTemperaturaFebrero['promedioTemperaturaFebrero'];
        }
        //calcular promedio humedad febrero
        $calcularPromedioHumedadFebrero = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadFebrero FROM r_monitoreo WHERE MONTH(fe_registro) = 2 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadFebrero as $rowHumedadFebrero) {
            $promedioHumedadFebrero = $rowHumedadFebrero['promedioHumedadFebrero'];
        }
        
        //calcular promedio temperatura marzo
        $calcularPromedioTemperaturaMarzo = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaMarzo FROM r_monitoreo WHERE MONTH(fe_registro) = 3 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaMarzo as $rowTemperaturaMarzo) {
            $promedioTemperaturaMarzo = $rowTemperaturaMarzo['promedioTemperaturaMarzo'];
        }
        //calcular promedio humedad marzo
        $calcularPromedioHumedadMarzo = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadMarzo FROM r_monitoreo WHERE MONTH(fe_registro) = 3 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadMarzo as $rowHumedadMarzo) {
            $promedioHumedadMarzo = $rowHumedadMarzo['promedioHumedadMarzo'];
        }
        
        //calcular promedio temperatura abril
        $calcularPromedioTemperaturaAbril = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaAbril FROM r_monitoreo WHERE MONTH(fe_registro) = 4 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaAbril as $rowTemperaturaAbril) {
            $promedioTemperaturaAbril = $rowTemperaturaAbril['promedioTemperaturaAbril'];
        }
        //calcular promedio humedad Abril
        $calcularPromedioHumedadAbril = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadAbril FROM r_monitoreo WHERE MONTH(fe_registro) = 4 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadAbril as $rowHumedadAbril) {
            $promedioHumedadAbril = $rowHumedadAbril['promedioHumedadAbril'];
        }
        
        //calcular promedio temperatura Mayo
        $calcularPromedioTemperaturaMayo = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaMayo FROM r_monitoreo WHERE MONTH(fe_registro) = 5 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaMayo as $rowTemperaturaMayo) {
            $promedioTemperaturaMayo = $rowTemperaturaMayo['promedioTemperaturaMayo'];
        }
        
        //calcular promedio humedad Mayo
        $calcularPromedioHumedadMayo = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadMayo FROM r_monitoreo WHERE MONTH(fe_registro) = 5 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadMayo as $rowHumedadMayo) {
            $promedioHumedadMayo = $rowHumedadMayo['promedioHumedadMayo'];
        }
        
        //calcular promedio temperatura Junio
        $calcularPromedioTemperaturaJunio = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaJunio FROM r_monitoreo WHERE MONTH(fe_registro) = 6 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaJunio as $rowTemperaturaJunio) {
            $promedioTemperaturaJunio = $rowTemperaturaJunio['promedioTemperaturaJunio'];
        }
        
        //calcular promedio humedad Junio
        $calcularPromedioHumedadJunio = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadJunio FROM r_monitoreo WHERE MONTH(fe_registro) = 6 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadJunio as $rowHumedadJunio) {
            $promedioHumedadJunio = $rowHumedadJunio['promedioHumedadJunio'];
        }
        
        //calcular promedio temperatura Julio
        $calcularPromedioTemperaturaJulio = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaJulio FROM r_monitoreo WHERE MONTH(fe_registro) = 7 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaJulio as $rowTemperaturaJulio) {
            $promedioTemperaturaJulio = $rowTemperaturaJulio['promedioTemperaturaJulio'];
        }
        
        //calcular promedio humedad Julio
        $calcularPromedioHumedadJulio = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadJulio FROM r_monitoreo WHERE MONTH(fe_registro) = 7 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadJulio as $rowHumedadJulio) {
            $promedioHumedadJulio = $rowHumedadJulio['promedioHumedadJulio'];
        }
        
        //calcular promedio temperatura Agosto
        $calcularPromedioTemperaturaAgosto = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaAgosto FROM r_monitoreo WHERE MONTH(fe_registro) = 8 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaAgosto as $rowTemperaturaAgosto) {
            $promedioTemperaturaAgosto = $rowTemperaturaAgosto['promedioTemperaturaAgosto'];
        }
        
        //calcular promedio humedad Agosto
        $calcularPromedioHumedadAgosto = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadAgosto FROM r_monitoreo WHERE MONTH(fe_registro) = 8 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadAgosto as $rowHumedadAgosto) {
            $promedioHumedadAgosto = $rowHumedadAgosto['promedioHumedadAgosto'];
        }
        
        //calcular promedio temperatura Septiembre
        $calcularPromedioTemperaturaSeptiembre = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaSeptiembre FROM r_monitoreo WHERE MONTH(fe_registro) = 9 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaSeptiembre as $rowTemperaturaSeptiembre) {
            $promedioTemperaturaSeptiembre = $rowTemperaturaSeptiembre['promedioTemperaturaSeptiembre'];
        }
        
        //calcular promedio humedad Septiembre
        $calcularPromedioHumedadSeptiembre = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadSeptiembre FROM r_monitoreo WHERE MONTH(fe_registro) = 9 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadSeptiembre as $rowHumedadSeptiembre) {
            $promedioHumedadAgosto = $rowHumedadSeptiembre['promedioHumedadSeptiembre'];
        }

        //insertar promedio de temperatura de enero
        $insertarPromedioMensualTemperaturaEnero = mysqli_query($conection, "UPDATE g_temperatura SET enero= '$promedioTemperaturaEnero'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad enero
        $insertarPromedioMensualHumedadEnero = mysqli_query($conection, "UPDATE g_humedad SET enero= '$promedioHumedadEnero'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de febrero
        $insertarPromedioMensualTemperaturaFebrero = mysqli_query($conection, "UPDATE g_temperatura SET febrero= '$promedioTemperaturaFebrero'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad febrero
        $insertarPromedioMensualHumedadFebrero = mysqli_query($conection, "UPDATE g_humedad SET febrero= '$promedioHumedadFebrero'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de marzo
        $insertarPromedioMensualTemperaturaMarzo = mysqli_query($conection, "UPDATE g_temperatura SET marzo= '$promedioTemperaturaMarzo'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad marzo
        $insertarPromedioMensualHumedadMarzo = mysqli_query($conection, "UPDATE g_humedad SET marzo= '$promedioHumedadMarzo'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Abril
        $insertarPromedioMensualTemperaturaAbril = mysqli_query($conection, "UPDATE g_temperatura SET abril= '$promedioTemperaturaAbril'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Abril
        $insertarPromedioMensualHumedadAbril = mysqli_query($conection, "UPDATE g_humedad SET abril= '$promedioHumedadAbril'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Mayo
        $insertarPromedioMensualTemperaturaMayo = mysqli_query($conection, "UPDATE g_temperatura SET mayo= '$promedioTemperaturaMayo'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Mayo
        $insertarPromedioMensualHumedadMayo = mysqli_query($conection, "UPDATE g_humedad SET mayo= '$promedioHumedadMayo'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Junio
        $insertarPromedioMensualTemperaturaJunio = mysqli_query($conection, "UPDATE g_temperatura SET junio= '$promedioTemperaturaJunio'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Junio
        $insertarPromedioMensualHumedadJunio = mysqli_query($conection, "UPDATE g_humedad SET junio= '$promedioHumedadJunio'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Julio
        $insertarPromedioMensualTemperaturaJulio = mysqli_query($conection, "UPDATE g_temperatura SET julio= '$promedioTemperaturaJulio'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Julio
        $insertarPromedioMensualHumedadJulio = mysqli_query($conection, "UPDATE g_humedad SET julio= '$promedioHumedadJulio'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Agosto
        $insertarPromedioMensualTemperaturaAgosto = mysqli_query($conection, "UPDATE g_temperatura SET agosto= '$promedioTemperaturaAgosto'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Agosto
        $insertarPromedioMensualHumedadAgosto = mysqli_query($conection, "UPDATE g_humedad SET agosto= '$promedioHumedadAgosto'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Septiembre
        $insertarPromedioMensualTemperaturaSeptiembre = mysqli_query($conection, "UPDATE g_temperatura SET septiembre= '$promedioTemperaturaSeptiembre'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Septiembre
        $insertarPromedioMensualHumedadSeptiembre = mysqli_query($conection, "UPDATE g_humedad SET septiembre= '$promedioHumedadSeptiembre'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
    }elseif($mesActual ==11){
        //calcular promedio temperatura enero
        $calcularPromedioTemperaturaEnero = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaEnero FROM r_monitoreo WHERE MONTH(fe_registro) = 1 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaEnero as $rowTemperaturaEnero) {
            $promedioTemperaturaEnero = $rowTemperaturaEnero['promedioTemperaturaEnero'];
        }
        //calcular promedio humedad enero
        $calcularPromedioHumedadEnero = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadEnero FROM r_monitoreo WHERE MONTH(fe_registro) = 1 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadEnero as $rowHumedadEnero) {
            $promedioHumedadEnero = $rowHumedadEnero['promedioHumedadEnero'];
        }
        
        //calcular promedio temperatura febrero
        $calcularPromedioTemperaturaFebrero = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaFebrero FROM r_monitoreo WHERE MONTH(fe_registro) = 2 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaFebrero as $rowTemperaturaFebrero) {
            $promedioTemperaturaFebrero = $rowTemperaturaFebrero['promedioTemperaturaFebrero'];
        }
        //calcular promedio humedad febrero
        $calcularPromedioHumedadFebrero = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadFebrero FROM r_monitoreo WHERE MONTH(fe_registro) = 2 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadFebrero as $rowHumedadFebrero) {
            $promedioHumedadFebrero = $rowHumedadFebrero['promedioHumedadFebrero'];
        }
        
        //calcular promedio temperatura marzo
        $calcularPromedioTemperaturaMarzo = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaMarzo FROM r_monitoreo WHERE MONTH(fe_registro) = 3 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaMarzo as $rowTemperaturaMarzo) {
            $promedioTemperaturaMarzo = $rowTemperaturaMarzo['promedioTemperaturaMarzo'];
        }
        //calcular promedio humedad marzo
        $calcularPromedioHumedadMarzo = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadMarzo FROM r_monitoreo WHERE MONTH(fe_registro) = 3 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadMarzo as $rowHumedadMarzo) {
            $promedioHumedadMarzo = $rowHumedadMarzo['promedioHumedadMarzo'];
        }
        
        //calcular promedio temperatura abril
        $calcularPromedioTemperaturaAbril = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaAbril FROM r_monitoreo WHERE MONTH(fe_registro) = 4 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaAbril as $rowTemperaturaAbril) {
            $promedioTemperaturaAbril = $rowTemperaturaAbril['promedioTemperaturaAbril'];
        }
        //calcular promedio humedad Abril
        $calcularPromedioHumedadAbril = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadAbril FROM r_monitoreo WHERE MONTH(fe_registro) = 4 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadAbril as $rowHumedadAbril) {
            $promedioHumedadAbril = $rowHumedadAbril['promedioHumedadAbril'];
        }
        
        //calcular promedio temperatura Mayo
        $calcularPromedioTemperaturaMayo = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaMayo FROM r_monitoreo WHERE MONTH(fe_registro) = 5 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaMayo as $rowTemperaturaMayo) {
            $promedioTemperaturaMayo = $rowTemperaturaMayo['promedioTemperaturaMayo'];
        }
        
        //calcular promedio humedad Mayo
        $calcularPromedioHumedadMayo = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadMayo FROM r_monitoreo WHERE MONTH(fe_registro) = 5 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadMayo as $rowHumedadMayo) {
            $promedioHumedadMayo = $rowHumedadMayo['promedioHumedadMayo'];
        }
        
        //calcular promedio temperatura Junio
        $calcularPromedioTemperaturaJunio = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaJunio FROM r_monitoreo WHERE MONTH(fe_registro) = 6 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaJunio as $rowTemperaturaJunio) {
            $promedioTemperaturaJunio = $rowTemperaturaJunio['promedioTemperaturaJunio'];
        }
        
        //calcular promedio humedad Junio
        $calcularPromedioHumedadJunio = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadJunio FROM r_monitoreo WHERE MONTH(fe_registro) = 6 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadJunio as $rowHumedadJunio) {
            $promedioHumedadJunio = $rowHumedadJunio['promedioHumedadJunio'];
        }
        
        //calcular promedio temperatura Julio
        $calcularPromedioTemperaturaJulio = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaJulio FROM r_monitoreo WHERE MONTH(fe_registro) = 7 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaJulio as $rowTemperaturaJulio) {
            $promedioTemperaturaJulio = $rowTemperaturaJulio['promedioTemperaturaJulio'];
        }
        
        //calcular promedio humedad Julio
        $calcularPromedioHumedadJulio = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadJulio FROM r_monitoreo WHERE MONTH(fe_registro) = 7 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadJulio as $rowHumedadJulio) {
            $promedioHumedadJulio = $rowHumedadJulio['promedioHumedadJulio'];
        }
        
        //calcular promedio temperatura Agosto
        $calcularPromedioTemperaturaAgosto = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaAgosto FROM r_monitoreo WHERE MONTH(fe_registro) = 8 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaAgosto as $rowTemperaturaAgosto) {
            $promedioTemperaturaAgosto = $rowTemperaturaAgosto['promedioTemperaturaAgosto'];
        }
        
        //calcular promedio humedad Agosto
        $calcularPromedioHumedadAgosto = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadAgosto FROM r_monitoreo WHERE MONTH(fe_registro) = 8 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadAgosto as $rowHumedadAgosto) {
            $promedioHumedadAgosto = $rowHumedadAgosto['promedioHumedadAgosto'];
        }
        
        //calcular promedio temperatura Septiembre
        $calcularPromedioTemperaturaSeptiembre = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaSeptiembre FROM r_monitoreo WHERE MONTH(fe_registro) = 9 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaSeptiembre as $rowTemperaturaSeptiembre) {
            $promedioTemperaturaSeptiembre = $rowTemperaturaSeptiembre['promedioTemperaturaSeptiembre'];
        }
        
        //calcular promedio humedad Septiembre
        $calcularPromedioHumedadSeptiembre = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadSeptiembre FROM r_monitoreo WHERE MONTH(fe_registro) = 9 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadSeptiembre as $rowHumedadSeptiembre) {
            $promedioHumedadAgosto = $rowHumedadSeptiembre['promedioHumedadSeptiembre'];
        }
        
        //calcular promedio temperatura Octubre
        $calcularPromedioTemperaturaOctubre = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaOctubre FROM r_monitoreo WHERE MONTH(fe_registro) = 10 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaOctubre as $rowTemperaturaOctubre) {
            $promedioTemperaturaOctubre = $rowTemperaturaOctubre['promedioTemperaturaOctubre'];
        }
        
        //calcular promedio humedad Octubre
        $calcularPromedioHumedadOctubre = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadOctubre FROM r_monitoreo WHERE MONTH(fe_registro) = 10 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadOctubre as $rowHumedadOctubre) {
            $promedioHumedadOctubre = $rowHumedadOctubre['promedioHumedadOctubre'];
        }
        //insertar promedio de temperatura de enero
        $insertarPromedioMensualTemperaturaEnero = mysqli_query($conection, "UPDATE g_temperatura SET enero= '$promedioTemperaturaEnero'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad enero
        $insertarPromedioMensualHumedadEnero = mysqli_query($conection, "UPDATE g_humedad SET enero= '$promedioHumedadEnero'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de febrero
        $insertarPromedioMensualTemperaturaFebrero = mysqli_query($conection, "UPDATE g_temperatura SET febrero= '$promedioTemperaturaFebrero'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad febrero
        $insertarPromedioMensualHumedadFebrero = mysqli_query($conection, "UPDATE g_humedad SET febrero= '$promedioHumedadFebrero'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de marzo
        $insertarPromedioMensualTemperaturaMarzo = mysqli_query($conection, "UPDATE g_temperatura SET marzo= '$promedioTemperaturaMarzo'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad marzo
        $insertarPromedioMensualHumedadMarzo = mysqli_query($conection, "UPDATE g_humedad SET marzo= '$promedioHumedadMarzo'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Abril
        $insertarPromedioMensualTemperaturaAbril = mysqli_query($conection, "UPDATE g_temperatura SET abril= '$promedioTemperaturaAbril'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Abril
        $insertarPromedioMensualHumedadAbril = mysqli_query($conection, "UPDATE g_humedad SET abril= '$promedioHumedadAbril'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Mayo
        $insertarPromedioMensualTemperaturaMayo = mysqli_query($conection, "UPDATE g_temperatura SET mayo= '$promedioTemperaturaMayo'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Mayo
        $insertarPromedioMensualHumedadMayo = mysqli_query($conection, "UPDATE g_humedad SET mayo= '$promedioHumedadMayo'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Junio
        $insertarPromedioMensualTemperaturaJunio = mysqli_query($conection, "UPDATE g_temperatura SET junio= '$promedioTemperaturaJunio'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Junio
        $insertarPromedioMensualHumedadJunio = mysqli_query($conection, "UPDATE g_humedad SET junio= '$promedioHumedadJunio'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Julio
        $insertarPromedioMensualTemperaturaJulio = mysqli_query($conection, "UPDATE g_temperatura SET julio= '$promedioTemperaturaJulio'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Julio
        $insertarPromedioMensualHumedadJulio = mysqli_query($conection, "UPDATE g_humedad SET julio= '$promedioHumedadJulio'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Agosto
        $insertarPromedioMensualTemperaturaAgosto = mysqli_query($conection, "UPDATE g_temperatura SET agosto= '$promedioTemperaturaAgosto'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Agosto
        $insertarPromedioMensualHumedadAgosto = mysqli_query($conection, "UPDATE g_humedad SET agosto= '$promedioHumedadAgosto'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Septiembre
        $insertarPromedioMensualTemperaturaSeptiembre = mysqli_query($conection, "UPDATE g_temperatura SET septiembre= '$promedioTemperaturaSeptiembre'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Septiembre
        $insertarPromedioMensualHumedadSeptiembre = mysqli_query($conection, "UPDATE g_humedad SET septiembre= '$promedioHumedadSeptiembre'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Octubre
        $insertarPromedioMensualTemperaturaOctubre = mysqli_query($conection, "UPDATE g_temperatura SET octubre= '$promedioTemperaturaOctubre'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Octubre
        $insertarPromedioMensualHumedadOctubre = mysqli_query($conection, "UPDATE g_humedad SET octubre= '$promedioHumedadOctubre'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
    }elseif($mesActual ==12){
        //calcular promedio temperatura enero
        $calcularPromedioTemperaturaEnero = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaEnero FROM r_monitoreo WHERE MONTH(fe_registro) = 1 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaEnero as $rowTemperaturaEnero) {
            $promedioTemperaturaEnero = $rowTemperaturaEnero['promedioTemperaturaEnero'];
        }
        //calcular promedio humedad enero
        $calcularPromedioHumedadEnero = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadEnero FROM r_monitoreo WHERE MONTH(fe_registro) = 1 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadEnero as $rowHumedadEnero) {
            $promedioHumedadEnero = $rowHumedadEnero['promedioHumedadEnero'];
        }
        
        //calcular promedio temperatura febrero
        $calcularPromedioTemperaturaFebrero = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaFebrero FROM r_monitoreo WHERE MONTH(fe_registro) = 2 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaFebrero as $rowTemperaturaFebrero) {
            $promedioTemperaturaFebrero = $rowTemperaturaFebrero['promedioTemperaturaFebrero'];
        }
        //calcular promedio humedad febrero
        $calcularPromedioHumedadFebrero = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadFebrero FROM r_monitoreo WHERE MONTH(fe_registro) = 2 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadFebrero as $rowHumedadFebrero) {
            $promedioHumedadFebrero = $rowHumedadFebrero['promedioHumedadFebrero'];
        }
        
        //calcular promedio temperatura marzo
        $calcularPromedioTemperaturaMarzo = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaMarzo FROM r_monitoreo WHERE MONTH(fe_registro) = 3 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaMarzo as $rowTemperaturaMarzo) {
            $promedioTemperaturaMarzo = $rowTemperaturaMarzo['promedioTemperaturaMarzo'];
        }
        //calcular promedio humedad marzo
        $calcularPromedioHumedadMarzo = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadMarzo FROM r_monitoreo WHERE MONTH(fe_registro) = 3 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadMarzo as $rowHumedadMarzo) {
            $promedioHumedadMarzo = $rowHumedadMarzo['promedioHumedadMarzo'];
        }
        
        //calcular promedio temperatura abril
        $calcularPromedioTemperaturaAbril = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaAbril FROM r_monitoreo WHERE MONTH(fe_registro) = 4 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaAbril as $rowTemperaturaAbril) {
            $promedioTemperaturaAbril = $rowTemperaturaAbril['promedioTemperaturaAbril'];
        }
        //calcular promedio humedad Abril
        $calcularPromedioHumedadAbril = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadAbril FROM r_monitoreo WHERE MONTH(fe_registro) = 4 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadAbril as $rowHumedadAbril) {
            $promedioHumedadAbril = $rowHumedadAbril['promedioHumedadAbril'];
        }
        
        //calcular promedio temperatura Mayo
        $calcularPromedioTemperaturaMayo = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaMayo FROM r_monitoreo WHERE MONTH(fe_registro) = 5 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaMayo as $rowTemperaturaMayo) {
            $promedioTemperaturaMayo = $rowTemperaturaMayo['promedioTemperaturaMayo'];
        }
        
        //calcular promedio humedad Mayo
        $calcularPromedioHumedadMayo = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadMayo FROM r_monitoreo WHERE MONTH(fe_registro) = 5 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadMayo as $rowHumedadMayo) {
            $promedioHumedadMayo = $rowHumedadMayo['promedioHumedadMayo'];
        }
        
        //calcular promedio temperatura Junio
        $calcularPromedioTemperaturaJunio = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaJunio FROM r_monitoreo WHERE MONTH(fe_registro) = 6 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaJunio as $rowTemperaturaJunio) {
            $promedioTemperaturaJunio = $rowTemperaturaJunio['promedioTemperaturaJunio'];
        }
        
        //calcular promedio humedad Junio
        $calcularPromedioHumedadJunio = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadJunio FROM r_monitoreo WHERE MONTH(fe_registro) = 6 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadJunio as $rowHumedadJunio) {
            $promedioHumedadJunio = $rowHumedadJunio['promedioHumedadJunio'];
        }
        
        //calcular promedio temperatura Julio
        $calcularPromedioTemperaturaJulio = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaJulio FROM r_monitoreo WHERE MONTH(fe_registro) = 7 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaJulio as $rowTemperaturaJulio) {
            $promedioTemperaturaJulio = $rowTemperaturaJulio['promedioTemperaturaJulio'];
        }
        
        //calcular promedio humedad Julio
        $calcularPromedioHumedadJulio = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadJulio FROM r_monitoreo WHERE MONTH(fe_registro) = 7 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadJulio as $rowHumedadJulio) {
            $promedioHumedadJulio = $rowHumedadJulio['promedioHumedadJulio'];
        }
        
        //calcular promedio temperatura Agosto
        $calcularPromedioTemperaturaAgosto = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaAgosto FROM r_monitoreo WHERE MONTH(fe_registro) = 8 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaAgosto as $rowTemperaturaAgosto) {
            $promedioTemperaturaAgosto = $rowTemperaturaAgosto['promedioTemperaturaAgosto'];
        }
        
        //calcular promedio humedad Agosto
        $calcularPromedioHumedadAgosto = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadAgosto FROM r_monitoreo WHERE MONTH(fe_registro) = 8 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadAgosto as $rowHumedadAgosto) {
            $promedioHumedadAgosto = $rowHumedadAgosto['promedioHumedadAgosto'];
        }
        
        //calcular promedio temperatura Septiembre
        $calcularPromedioTemperaturaSeptiembre = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaSeptiembre FROM r_monitoreo WHERE MONTH(fe_registro) = 9 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaSeptiembre as $rowTemperaturaSeptiembre) {
            $promedioTemperaturaSeptiembre = $rowTemperaturaSeptiembre['promedioTemperaturaSeptiembre'];
        }
        
        //calcular promedio humedad Septiembre
        $calcularPromedioHumedadSeptiembre = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadSeptiembre FROM r_monitoreo WHERE MONTH(fe_registro) = 9 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadSeptiembre as $rowHumedadSeptiembre) {
            $promedioHumedadAgosto = $rowHumedadSeptiembre['promedioHumedadSeptiembre'];
        }
        
        //calcular promedio temperatura Octubre
        $calcularPromedioTemperaturaOctubre = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaOctubre FROM r_monitoreo WHERE MONTH(fe_registro) = 10 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaOctubre as $rowTemperaturaOctubre) {
            $promedioTemperaturaOctubre = $rowTemperaturaOctubre['promedioTemperaturaOctubre'];
        }
        
        //calcular promedio humedad Octubre
        $calcularPromedioHumedadOctubre = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadOctubre FROM r_monitoreo WHERE MONTH(fe_registro) = 10 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadOctubre as $rowHumedadOctubre) {
            $promedioHumedadOctubre = $rowHumedadOctubre['promedioHumedadOctubre'];
        }
        
        //calcular promedio temperatura Noviembre
        $calcularPromedioTemperaturaNoviembre = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaNoviembre FROM r_monitoreo WHERE MONTH(fe_registro) = 11 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaNoviembre as $rowTemperaturaNoviembre) {
            $promedioTemperaturaNoviembre = $rowTemperaturaNoviembre['promedioTemperaturaNoviembre'];
        }
        
        //calcular promedio humedad Noviembre
        $calcularPromedioHumedadNoviembre = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadNoviembre FROM r_monitoreo WHERE MONTH(fe_registro) = 11 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadNoviembre as $rowHumedadNoviembre) {
            $promedioHumedadNoviembre = $rowHumedadNoviembre['promedioHumedadNoviembre'];
        }
        
        //insertar promedio de temperatura de enero
        $insertarPromedioMensualTemperaturaEnero = mysqli_query($conection, "UPDATE g_temperatura SET enero= '$promedioTemperaturaEnero'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad enero
        $insertarPromedioMensualHumedadEnero = mysqli_query($conection, "UPDATE g_humedad SET enero= '$promedioHumedadEnero'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de febrero
        $insertarPromedioMensualTemperaturaFebrero = mysqli_query($conection, "UPDATE g_temperatura SET febrero= '$promedioTemperaturaFebrero'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad febrero
        $insertarPromedioMensualHumedadFebrero = mysqli_query($conection, "UPDATE g_humedad SET febrero= '$promedioHumedadFebrero'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de marzo
        $insertarPromedioMensualTemperaturaMarzo = mysqli_query($conection, "UPDATE g_temperatura SET marzo= '$promedioTemperaturaMarzo'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad marzo
        $insertarPromedioMensualHumedadMarzo = mysqli_query($conection, "UPDATE g_humedad SET marzo= '$promedioHumedadMarzo'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Abril
        $insertarPromedioMensualTemperaturaAbril = mysqli_query($conection, "UPDATE g_temperatura SET abril= '$promedioTemperaturaAbril'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Abril
        $insertarPromedioMensualHumedadAbril = mysqli_query($conection, "UPDATE g_humedad SET abril= '$promedioHumedadAbril'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Mayo
        $insertarPromedioMensualTemperaturaMayo = mysqli_query($conection, "UPDATE g_temperatura SET mayo= '$promedioTemperaturaMayo'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Mayo
        $insertarPromedioMensualHumedadMayo = mysqli_query($conection, "UPDATE g_humedad SET mayo= '$promedioHumedadMayo'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Junio
        $insertarPromedioMensualTemperaturaJunio = mysqli_query($conection, "UPDATE g_temperatura SET junio= '$promedioTemperaturaJunio'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Junio
        $insertarPromedioMensualHumedadJunio = mysqli_query($conection, "UPDATE g_humedad SET junio= '$promedioHumedadJunio'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Julio
        $insertarPromedioMensualTemperaturaJulio = mysqli_query($conection, "UPDATE g_temperatura SET julio= '$promedioTemperaturaJulio'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Julio
        $insertarPromedioMensualHumedadJulio = mysqli_query($conection, "UPDATE g_humedad SET julio= '$promedioHumedadJulio'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Agosto
        $insertarPromedioMensualTemperaturaAgosto = mysqli_query($conection, "UPDATE g_temperatura SET agosto= '$promedioTemperaturaAgosto'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Agosto
        $insertarPromedioMensualHumedadAgosto = mysqli_query($conection, "UPDATE g_humedad SET agosto= '$promedioHumedadAgosto'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Septiembre
        $insertarPromedioMensualTemperaturaSeptiembre = mysqli_query($conection, "UPDATE g_temperatura SET septiembre= '$promedioTemperaturaSeptiembre'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Septiembre
        $insertarPromedioMensualHumedadSeptiembre = mysqli_query($conection, "UPDATE g_humedad SET septiembre= '$promedioHumedadSeptiembre'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Octubre
        $insertarPromedioMensualTemperaturaOctubre = mysqli_query($conection, "UPDATE g_temperatura SET octubre= '$promedioTemperaturaOctubre'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Octubre
        $insertarPromedioMensualHumedadOctubre = mysqli_query($conection, "UPDATE g_humedad SET octubre= '$promedioHumedadOctubre'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Noviembre
        $insertarPromedioMensualTemperaturaNoviembre = mysqli_query($conection, "UPDATE g_temperatura SET noviembre= '$promedioTemperaturaNoviembre'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Noviembre
        $insertarPromedioMensualHumedadNoviembre = mysqli_query($conection, "UPDATE g_humedad SET noviembre= '$promedioHumedadNoviembre'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
    }
} elseif ($anio < $anioActual) {
    //calcular promedio temperatura enero
        $calcularPromedioTemperaturaEnero = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaEnero FROM r_monitoreo WHERE MONTH(fe_registro) = 1 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaEnero as $rowTemperaturaEnero) {
            $promedioTemperaturaEnero = $rowTemperaturaEnero['promedioTemperaturaEnero'];
        }
        //calcular promedio humedad enero
        $calcularPromedioHumedadEnero = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadEnero FROM r_monitoreo WHERE MONTH(fe_registro) = 1 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadEnero as $rowHumedadEnero) {
            $promedioHumedadEnero = $rowHumedadEnero['promedioHumedadEnero'];
        }
        
        //calcular promedio temperatura febrero
        $calcularPromedioTemperaturaFebrero = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaFebrero FROM r_monitoreo WHERE MONTH(fe_registro) = 2 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaFebrero as $rowTemperaturaFebrero) {
            $promedioTemperaturaFebrero = $rowTemperaturaFebrero['promedioTemperaturaFebrero'];
        }
        //calcular promedio humedad febrero
        $calcularPromedioHumedadFebrero = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadFebrero FROM r_monitoreo WHERE MONTH(fe_registro) = 2 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadFebrero as $rowHumedadFebrero) {
            $promedioHumedadFebrero = $rowHumedadFebrero['promedioHumedadFebrero'];
        }
        
        //calcular promedio temperatura marzo
        $calcularPromedioTemperaturaMarzo = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaMarzo FROM r_monitoreo WHERE MONTH(fe_registro) = 3 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaMarzo as $rowTemperaturaMarzo) {
            $promedioTemperaturaMarzo = $rowTemperaturaMarzo['promedioTemperaturaMarzo'];
        }
        //calcular promedio humedad marzo
        $calcularPromedioHumedadMarzo = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadMarzo FROM r_monitoreo WHERE MONTH(fe_registro) = 3 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadMarzo as $rowHumedadMarzo) {
            $promedioHumedadMarzo = $rowHumedadMarzo['promedioHumedadMarzo'];
        }
        
        //calcular promedio temperatura abril
        $calcularPromedioTemperaturaAbril = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaAbril FROM r_monitoreo WHERE MONTH(fe_registro) = 4 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaAbril as $rowTemperaturaAbril) {
            $promedioTemperaturaAbril = $rowTemperaturaAbril['promedioTemperaturaAbril'];
        }
        //calcular promedio humedad Abril
        $calcularPromedioHumedadAbril = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadAbril FROM r_monitoreo WHERE MONTH(fe_registro) = 4 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadAbril as $rowHumedadAbril) {
            $promedioHumedadAbril = $rowHumedadAbril['promedioHumedadAbril'];
        }
        
        //calcular promedio temperatura Mayo
        $calcularPromedioTemperaturaMayo = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaMayo FROM r_monitoreo WHERE MONTH(fe_registro) = 5 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaMayo as $rowTemperaturaMayo) {
            $promedioTemperaturaMayo = $rowTemperaturaMayo['promedioTemperaturaMayo'];
        }
        
        //calcular promedio humedad Mayo
        $calcularPromedioHumedadMayo = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadMayo FROM r_monitoreo WHERE MONTH(fe_registro) = 5 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadMayo as $rowHumedadMayo) {
            $promedioHumedadMayo = $rowHumedadMayo['promedioHumedadMayo'];
        }
        
        //calcular promedio temperatura Junio
        $calcularPromedioTemperaturaJunio = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaJunio FROM r_monitoreo WHERE MONTH(fe_registro) = 6 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaJunio as $rowTemperaturaJunio) {
            $promedioTemperaturaJunio = $rowTemperaturaJunio['promedioTemperaturaJunio'];
        }
        
        //calcular promedio humedad Junio
        $calcularPromedioHumedadJunio = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadJunio FROM r_monitoreo WHERE MONTH(fe_registro) = 6 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadJunio as $rowHumedadJunio) {
            $promedioHumedadJunio = $rowHumedadJunio['promedioHumedadJunio'];
        }
        
        //calcular promedio temperatura Julio
        $calcularPromedioTemperaturaJulio = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaJulio FROM r_monitoreo WHERE MONTH(fe_registro) = 7 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaJulio as $rowTemperaturaJulio) {
            $promedioTemperaturaJulio = $rowTemperaturaJulio['promedioTemperaturaJulio'];
        }
        
        //calcular promedio humedad Julio
        $calcularPromedioHumedadJulio = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadJulio FROM r_monitoreo WHERE MONTH(fe_registro) = 7 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadJulio as $rowHumedadJulio) {
            $promedioHumedadJulio = $rowHumedadJulio['promedioHumedadJulio'];
        }
        
        //calcular promedio temperatura Agosto
        $calcularPromedioTemperaturaAgosto = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaAgosto FROM r_monitoreo WHERE MONTH(fe_registro) = 8 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaAgosto as $rowTemperaturaAgosto) {
            $promedioTemperaturaAgosto = $rowTemperaturaAgosto['promedioTemperaturaAgosto'];
        }
        
        //calcular promedio humedad Agosto
        $calcularPromedioHumedadAgosto = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadAgosto FROM r_monitoreo WHERE MONTH(fe_registro) = 8 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadAgosto as $rowHumedadAgosto) {
            $promedioHumedadAgosto = $rowHumedadAgosto['promedioHumedadAgosto'];
        }
        
        //calcular promedio temperatura Septiembre
        $calcularPromedioTemperaturaSeptiembre = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaSeptiembre FROM r_monitoreo WHERE MONTH(fe_registro) = 9 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaSeptiembre as $rowTemperaturaSeptiembre) {
            $promedioTemperaturaSeptiembre = $rowTemperaturaSeptiembre['promedioTemperaturaSeptiembre'];
        }
        
        //calcular promedio humedad Septiembre
        $calcularPromedioHumedadSeptiembre = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadSeptiembre FROM r_monitoreo WHERE MONTH(fe_registro) = 9 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadSeptiembre as $rowHumedadSeptiembre) {
            $promedioHumedadAgosto = $rowHumedadSeptiembre['promedioHumedadSeptiembre'];
        }
        
        //calcular promedio temperatura Octubre
        $calcularPromedioTemperaturaOctubre = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaOctubre FROM r_monitoreo WHERE MONTH(fe_registro) = 10 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaOctubre as $rowTemperaturaOctubre) {
            $promedioTemperaturaOctubre = $rowTemperaturaOctubre['promedioTemperaturaOctubre'];
        }
        
        //calcular promedio humedad Octubre
        $calcularPromedioHumedadOctubre = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadOctubre FROM r_monitoreo WHERE MONTH(fe_registro) = 10 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadOctubre as $rowHumedadOctubre) {
            $promedioHumedadOctubre = $rowHumedadOctubre['promedioHumedadOctubre'];
        }
        
        //calcular promedio temperatura Noviembre
        $calcularPromedioTemperaturaNoviembre = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaNoviembre FROM r_monitoreo WHERE MONTH(fe_registro) = 11 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaNoviembre as $rowTemperaturaNoviembre) {
            $promedioTemperaturaNoviembre = $rowTemperaturaNoviembre['promedioTemperaturaNoviembre'];
        }
        
        //calcular promedio humedad Noviembre
        $calcularPromedioHumedadNoviembre = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadNoviembre FROM r_monitoreo WHERE MONTH(fe_registro) = 11 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadNoviembre as $rowHumedadNoviembre) {
            $promedioHumedadNoviembre = $rowHumedadNoviembre['promedioHumedadNoviembre'];
        }
        
        //calcular promedio temperatura Diciembre
        $calcularPromedioTemperaturaDiciembre = mysqli_query($conection, "SELECT AVG(no_valor) promedioTemperaturaDiciembre FROM r_monitoreo WHERE MONTH(fe_registro) = 12 AND fl_t_sensor = 1 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioTemperaturaDiciembre as $rowTemperaturaDiciembre) {
            $promedioTemperaturaDiciembre = $rowTemperaturaDiciembre['promedioTemperaturaDiciembre'];
        }
        
        //calcular promedio humedad Diciembre
        $calcularPromedioHumedadDiciembre = mysqli_query($conection, "SELECT AVG(no_valor) promedioHumedadDiciembre FROM r_monitoreo WHERE MONTH(fe_registro) = 12 AND fl_t_sensor = 2 AND fl_dispositivo = '$fl_dispositivo' AND YEAR(fe_registro) = '$anio'");
        foreach ($calcularPromedioHumedadDiciembre as $rowHumedadDiciembre) {
            $promedioHumedadDiciembre = $rowHumedadDiciembre['promedioHumedadDiciembre'];
        }
        
        //insertar promedio de temperatura de enero
        $insertarPromedioMensualTemperaturaEnero = mysqli_query($conection, "UPDATE g_temperatura SET enero= '$promedioTemperaturaEnero'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad enero
        $insertarPromedioMensualHumedadEnero = mysqli_query($conection, "UPDATE g_humedad SET enero= '$promedioHumedadEnero'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de febrero
        $insertarPromedioMensualTemperaturaFebrero = mysqli_query($conection, "UPDATE g_temperatura SET febrero= '$promedioTemperaturaFebrero'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad febrero
        $insertarPromedioMensualHumedadFebrero = mysqli_query($conection, "UPDATE g_humedad SET febrero= '$promedioHumedadFebrero'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de marzo
        $insertarPromedioMensualTemperaturaMarzo = mysqli_query($conection, "UPDATE g_temperatura SET marzo= '$promedioTemperaturaMarzo'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad marzo
        $insertarPromedioMensualHumedadMarzo = mysqli_query($conection, "UPDATE g_humedad SET marzo= '$promedioHumedadMarzo'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Abril
        $insertarPromedioMensualTemperaturaAbril = mysqli_query($conection, "UPDATE g_temperatura SET abril= '$promedioTemperaturaAbril'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Abril
        $insertarPromedioMensualHumedadAbril = mysqli_query($conection, "UPDATE g_humedad SET abril= '$promedioHumedadAbril'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Mayo
        $insertarPromedioMensualTemperaturaMayo = mysqli_query($conection, "UPDATE g_temperatura SET mayo= '$promedioTemperaturaMayo'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Mayo
        $insertarPromedioMensualHumedadMayo = mysqli_query($conection, "UPDATE g_humedad SET mayo= '$promedioHumedadMayo'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Junio
        $insertarPromedioMensualTemperaturaJunio = mysqli_query($conection, "UPDATE g_temperatura SET junio= '$promedioTemperaturaJunio'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Junio
        $insertarPromedioMensualHumedadJunio = mysqli_query($conection, "UPDATE g_humedad SET junio= '$promedioHumedadJunio'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Julio
        $insertarPromedioMensualTemperaturaJulio = mysqli_query($conection, "UPDATE g_temperatura SET julio= '$promedioTemperaturaJulio'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Julio
        $insertarPromedioMensualHumedadJulio = mysqli_query($conection, "UPDATE g_humedad SET julio= '$promedioHumedadJulio'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Agosto
        $insertarPromedioMensualTemperaturaAgosto = mysqli_query($conection, "UPDATE g_temperatura SET agosto= '$promedioTemperaturaAgosto'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Agosto
        $insertarPromedioMensualHumedadAgosto = mysqli_query($conection, "UPDATE g_humedad SET agosto= '$promedioHumedadAgosto'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Septiembre
        $insertarPromedioMensualTemperaturaSeptiembre = mysqli_query($conection, "UPDATE g_temperatura SET septiembre= '$promedioTemperaturaSeptiembre'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Septiembre
        $insertarPromedioMensualHumedadSeptiembre = mysqli_query($conection, "UPDATE g_humedad SET septiembre= '$promedioHumedadSeptiembre'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Octubre
        $insertarPromedioMensualTemperaturaOctubre = mysqli_query($conection, "UPDATE g_temperatura SET octubre= '$promedioTemperaturaOctubre'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Octubre
        $insertarPromedioMensualHumedadOctubre = mysqli_query($conection, "UPDATE g_humedad SET octubre= '$promedioHumedadOctubre'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Noviembre
        $insertarPromedioMensualTemperaturaNoviembre = mysqli_query($conection, "UPDATE g_temperatura SET noviembre= '$promedioTemperaturaNoviembre'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Noviembre
        $insertarPromedioMensualHumedadNoviembre = mysqli_query($conection, "UPDATE g_humedad SET noviembre= '$promedioHumedadNoviembre'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
        //insertar promedio de temperatura de Diciembre
        $insertarPromedioMensualTemperaturaDiciembre = mysqli_query($conection, "UPDATE g_temperatura SET diciembre= '$promedioTemperaturaDiciembre'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");

        //insertar promedio de humedad Diciembre
        $insertarPromedioMensualHumedadDiciembre= mysqli_query($conection, "UPDATE g_humedad SET diciembre= '$promedioHumedadDiciembre'  WHERE fl_ubicacion = '$fl_ubicacion' AND fl_dispositivo = '$fl_dispositivo' AND anio = '$anio'");
        
}

mysqli_close($conection);

header("location: ../view/dashboard.php" );



echo $fl_dispositivo . $fl_ubicacion . $anio . 'mes ' . $mesActual . ' anio' . $anioActual;

