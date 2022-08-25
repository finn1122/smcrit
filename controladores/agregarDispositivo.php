<?php

    $nb_dispositivo = $_POST['nb_dispositivo'];
    $nb_modelo = $_POST['nb_modelo'];
    $fl_ubicacion = $_POST['fl_ubicacion'];
    $ds_dispositivo = $_POST['ds_dispositivo'];
    $fg_activo = 1;
    

    require_once "../config/conexion.php";
    //guarda dispositivo
    $guardarDispositivo = mysqli_query($conection, "INSERT INTO c_dispositivo (fl_dispositivo, nb_dispositivo, nb_modelo, fe_creacion, fe_ultimod, fg_activo, fl_ubicacion, ds_dispositivo)  VALUES (NULL, '".$nb_dispositivo."', '".$nb_modelo."',  current_timestamp(), current_timestamp(), '".$fg_activo."', '".$fl_ubicacion."', '".$ds_dispositivo."');");
    
    //consulta folio del ultimo dispositivo
    $consultarFolio = mysqli_query($conection, "SELECT fl_dispositivo folio FROM c_dispositivo ORDER BY fl_dispositivo DESC LIMIT 1");
    foreach($consultarFolio as $row){
        $folio = $row['folio'];
    }


    //consulta año atual
    $consultarAño = mysqli_query($conection, "SELECT YEAR(NOW()) anio");
    foreach($consultarAño as $row){
        $anio = $row['anio'];
    }

    


    
    $crearTablaGraficaHumedad = mysqli_query($conection, "INSERT INTO `g_humedad` (`fl_g_humedad`, `anio`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `fl_dispositivo`, `fl_ubicacion`) VALUES (NULL, '$anio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$folio', '$fl_ubicacion');");
    $crearTablaGraficaTemperatura = mysqli_query($conection, "INSERT INTO `g_temperatura` (`fl_g_temperatura`, `anio`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `fl_dispositivo`, `fl_ubicacion`) VALUES (NULL, '$anio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$folio', '$fl_ubicacion');");
    mysqli_close($conection);
    
    header('location: ../view/dispositivos.php');
    
?>

