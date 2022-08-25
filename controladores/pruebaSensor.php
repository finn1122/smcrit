<?php

require_once '../config/conexion.php';
$array = array();
switch ($_GET['q']) {
    case 1:
        $result = $conection->query("SELECT M.fl_monitoreo, M.no_valor, T.nb_sensor FROM r_monitoreo M INNER JOIN c_t_sensor T ON M.fl_t_sensor = T.fl_t_sensor ORDER BY fl_monitoreo DESC LIMIT 1");
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $array[] = $row;
        }

        echo json_encode($array);

        break;
        
    default :
        
        $result = $conection->query("SELECT M.fl_monitoreo, M.no_valor, T.nb_sensor FROM r_monitoreo M INNER JOIN c_t_sensor T ON M.fl_t_sensor = T.fl_t_sensor ORDER BY fl_monitoreo DESC LIMIT 5");
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $array[] = $row;
        }

        echo json_encode($array);
}





//echo json_encode($result->fetch_assoc());