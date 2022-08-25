<?php


require_once '../config/conexion.php';


$query = mysqli_query($conection, "SELECT fl_alerta, TIMEDIFF(NOW( ), fe_registro ) TIEMPO FROM r_alerta ORDER BY fl_alerta DESC LIMIT 1");


foreach ($query as $row){
    $tiempo = $row['TIEMPO'];
    $fl_alerta = $row['fl_alerta'];
}

$separado = explode(":", $tiempo);
$hora = $separado[0]; // porción1
$minuto = $separado[1]; // porción2
$segundo = $separado[2]; // porción2
//echo $hora.' '.$minuto.' '.$segundo;



if ($hora == 0 && $minuto<=5){
    $query = mysqli_query($conection, "SELECT CU.nb_ubicacion, CD.nb_dispositivo, CTS.nb_sensor, RA.no_valor, RA.fe_registro FROM r_alerta RA INNER JOIN c_dispositivo CD ON RA.fl_dispositivo = CD.fl_dispositivo INNER JOIN c_t_sensor CTS ON RA.fl_t_sensor = CTS.fl_t_sensor INNER JOIN c_ubicacion CU ON CU.fl_ubicacion = CD.fl_ubicacion WHERE fl_alerta = '$fl_alerta'");
    
    foreach ($query as $row){
    $nb_ubicacion = $row['nb_ubicacion'];
    $nb_dispositivo = $row['nb_dispositivo'];
    $nb_sensor = $row['nb_sensor'];
    $no_valor = $row['no_valor'];
    $fe_registro = $row['fe_registro'];
    }

    echo '[{"ALERTA":"true","NB_UBICACION":"'.$nb_ubicacion.'","NB_DISPOSITIVO":"'.$nb_dispositivo.'","NB_SENSOR":"'.$nb_sensor.'","NO_VALOR":"'.$no_valor.'","FE_REGISTRO":"'.$fe_registro.'"}]';
 
    
    
}else{
    echo '[{"ALERTA":"false"}]';
}


/*
$result = $conection->query("SELECT TIMEDIFF(NOW( ), fe_registro ) TIEMPO FROM r_alerta ORDER BY fl_alerta DESC LIMIT 1");
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $array[] = $row;
        }

        echo json_encode($array);*/
        
mysqli_close($conection);
?> 