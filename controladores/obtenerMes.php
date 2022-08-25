<?php

require_once "../config/conexion.php";

$anio = $_POST['anio'];

$query = mysqli_query($conection, "SELECT MONTH(NOW()) MES");
mysqli_close($conection);

foreach ($query as $row) {
    $mesActual = $row['MES'];
}

if ($mesActual == 1) {
    $nb_mes = 'enero';
} elseif ($mesActual == 2) {
    $nb_mes = 'febrero';
}elseif ($mesActual == 3) {
    $nb_mes = 'marzo';
}elseif ($mesActual == 4) {
    $nb_mes = 'abril';
}elseif ($mesActual == 5) {
    $nb_mes = 'mayo';
}elseif ($mesActual == 6) {
    $nb_mes = 'junio';
}elseif ($mesActual == 7) {
    $nb_mes = 'julio';
}elseif ($mesActual == 8) {
    $nb_mes = 'agosto';
}elseif ($mesActual == 9) {
    $nb_mes = 'septiembre';
}elseif ($mesActual == 10) {
    $nb_mes = 'octubre';
}elseif ($mesActual == 11) {
    $nb_mes = 'noviembre';
}elseif ($mesActual == 12) {
    $nb_mes = 'diciembre';
}


$html = "<option value='0'>MES</option>";


$html.= "<option value='1'>Enero</option>"
        . "<option value='2'>Febrero</option>"
        . "<option value='3'>Marzo</option>"
        . "<option value='4'>Abril</option>"
        . "<option value='5'>Mayo</option>"
        . "<option value='6'>Junio</option>"
        . "<option value='7'>Julio</option>"
        . "<option value='8'>Agosto</option>"
        . "<option value='9'>Septiembre</option>"
        . "<option value='10'>Octubre</option>"
        . "<option value='11'>Noviembre</option>"
        . "<option value='12'>Diciembre</option>";


echo $html;
?>
