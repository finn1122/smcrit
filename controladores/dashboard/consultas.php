<?php

//esta documento se ejecuta desde el codigo javascript en index.php


//consulta para obtener todas las ubicaciones para ser mostradas en el select en index.php
function listarDispositivo(){
	
	require_once '../config/conexion.php';
	$query = mysqli_query($conection, "SELECT D.fl_dispositivo, D.nb_dispositivo DISPOSITIVO , CU.fl_ubicacion, CU.nb_ubicacion UBICACION , (SELECT M.no_valor FROM r_monitoreo M WHERE M.fl_dispositivo = D.fl_dispositivo AND M.fl_t_sensor = 1 ORDER BY M.fe_registro DESC LIMIT 1) TEMPERATURA , (SELECT M.no_valor FROM r_monitoreo M WHERE M.fl_dispositivo = D.fl_dispositivo AND M.fl_t_sensor = 2 ORDER BY M.fe_registro DESC LIMIT 1) HUMEDAD , (SELECT M.fe_registro FROM r_monitoreo M WHERE M.fl_dispositivo = D.fl_dispositivo AND M.fl_t_sensor = 1 ORDER BY M.fe_registro DESC LIMIT 1) FECHA from c_dispositivo D INNER JOIN c_ubicacion CU ON D.fl_ubicacion = CU.fl_ubicacion WHERE D.fg_activo = 1");
	mysqli_close($conection);

        //SELECT CU.fl_ubicacion, CD.fl_dispositivo, CU.nb_ubicacion, CD.nb_dispositivo  FROM c_ubicacion CU INNER JOIN c_dispositivo CD ON CU.fl_ubicacion = CD.fl_ubicacion
	return $query;


}

function obtenerGrafica(){
    $query = mysqli_query($conection, "SELECT * FROM r_grafica WHERE fl_dispositivo='$fl_dispositivo' AND fl_ubicacion='$fl_ubicacion'");
    mysqli_close($conection);
    return $query;
}


?>