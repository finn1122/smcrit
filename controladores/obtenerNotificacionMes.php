<?php



require_once "../config/conexion.php";

$mes = $_POST['mes'];
$anio = $_POST['anio'];
$dato = '';

$query = mysqli_query($conection, "SELECT CU.nb_ubicacion , CD.nb_dispositivo , CTS.nb_sensor , RA.no_valor , RA.fe_registro , MONTH(fe_registro) MES , YEAR(fe_registro) ANIO FROM r_alerta RA INNER JOIN c_dispositivo CD ON RA.fl_dispositivo = CD.fl_dispositivo INNER JOIN c_ubicacion CU ON CD.fl_ubicacion = CU.fl_ubicacion INNER JOIN c_t_sensor CTS ON RA.fl_t_sensor = CTS.fl_t_sensor WHERE MONTH(fe_registro) = '$mes' AND YEAR(fe_registro) = '$anio'");
mysqli_close($conection);

foreach ($query as $row1){
    $dato = $row1['no_valor'];   
}


if ($dato == 0){
        echo "<div class='alert alert-primary alert-dismissible fade show' role='alert'>"
    . "<strong>Puedes estar tranquilo!</strong> "
                . "No existen notificaciones este mes."
                . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                . "<span aria-hidden='true'>&times;</span>"
                . "</button>"
                . "</div>";
    }else{
        $html = "<table class='table' table-sm>
    
    <tr class='table-success'>
      <th scope='col'>Ubicación</th>
      <th scope='col'>Dispositivo</th>
      <th scope='col'>Sensor</th>
      <th scope='col'>Valor</th>
      <th scope='col'>Fecha</th>
    </tr>";

foreach ($query as $row) {
    
    $html.= "<tr>"
            . "<td scope='row'>";
    $html.=$row['nb_ubicacion']."</td>";
    $html.="<td scope='row'>";
    $html.=$row['nb_dispositivo']."</td>";
    $html.="<td scope='row'>";
    $html.=$row['nb_sensor']."</td>";
    $html.="<td scope='row'>";
    $html.=$row['no_valor']."</td>";
    $html.="<td scope='row'>";
    $html.=$row['fe_registro']."</td>";
    
    
    
}

echo $html.="</table>";
    }


?>

