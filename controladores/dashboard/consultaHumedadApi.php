<?php

require_once '../../config/conexion.php';
    

    if(isset($_GET['fl_ubicacion'])&& isset($_GET['fl_dispositivo'])){
        $fl_ubicacion = $_GET['fl_ubicacion'];
        $fl_dispositivo = $_GET['fl_dispositivo'];
        
        
        $result = $conection->query("SELECT D.nb_dispositivo NOMBRE , CU.nb_ubicacion UBICACION , (SELECT M.no_valor FROM r_monitoreo M WHERE M.fl_dispositivo = D.fl_dispositivo AND M.fl_t_sensor = 2 ORDER BY M.fe_registro DESC LIMIT 1) HUMEDAD , (SELECT M.fe_registro FROM r_monitoreo M WHERE M.fl_dispositivo = D.fl_dispositivo AND M.fl_t_sensor = 1 ORDER BY M.fe_registro DESC LIMIT 1) FECHA from c_dispositivo D INNER JOIN c_ubicacion CU ON D.fl_ubicacion = CU.fl_ubicacion WHERE CU.fl_ubicacion = '$fl_ubicacion' AND D.fl_dispositivo = '$fl_dispositivo'");
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $array[] = $row;
        }

        echo json_encode($array);
    }
    
        
        
        
   