<?php




    require_once '../../config/conexion.php';
    /*$query = mysqli_query($conection, "SELECT U.nb_ubicacion, D.nb_dispositivo, S.nb_sensor, M.no_valor, M.fl_monitoreo FROM c_ubicacion U INNER JOIN c_dispositivo D ON U.fl_ubicacion = D.fl_ubicacion INNER JOIN c_t_sensor S ON d.fl_dispositivo = S.fl_dispositivo INNER JOIN r_monitoreo M ON S.fl_t_sensor = M.fl_t_sensor WHERE U.fl_ubicacion = 2 ORDER BY M.fl_monitoreo DESC LIMIT 2");
    return $query;*/
    $result = $conection->query("SELECT D.nb_dispositivo NOMBRE , CU.nb_ubicacion UBICACION , (SELECT M.no_valor FROM r_monitoreo M WHERE M.fl_dispositivo = D.fl_dispositivo AND M.fl_t_sensor = 1 ORDER BY M.fe_registro DESC LIMIT 1) TEMPERATURA , (SELECT M.no_valor FROM r_monitoreo M WHERE M.fl_dispositivo = D.fl_dispositivo AND M.fl_t_sensor = 2 ORDER BY M.fe_registro DESC LIMIT 1) HUMEDAD , (SELECT M.fe_registro FROM r_monitoreo M WHERE M.fl_dispositivo = D.fl_dispositivo AND M.fl_t_sensor = 1 ORDER BY M.fe_registro DESC LIMIT 1) FECHA from c_dispositivo D INNER JOIN c_ubicacion CU ON D.fl_ubicacion = CU.fl_ubicacion WHERE CU.fl_ubicacion = 1");
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $array[] = $row;
        }

        echo json_encode($array);
