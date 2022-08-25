<?php
require_once '../config/conexion.php';

$fl_dispositivo = $_GET['fl_dispositivo'];
$fl_ubicacion = $_GET['fl_ubicacion'];

//consulta para obtener el ultimo año disponible para graficar
$queryUltimoAnio = mysqli_query($conection, "SELECT anio FROM g_humedad WHERE fl_dispositivo = '$fl_dispositivo' AND fl_ubicacion = '$fl_ubicacion' ORDER BY anio DESC LIMIT 1");
foreach ($queryUltimoAnio as $rowUltimoAnio) {
    $anioUltimoTabla = $rowUltimoAnio['anio'];
}

$anioExtra = $anioUltimoTabla + 1;

$crearTablaGraficaHumedad = mysqli_query($conection, "INSERT INTO `g_humedad` (`fl_g_humedad`, `anio`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `fl_dispositivo`, `fl_ubicacion`) VALUES (NULL, '$anioExtra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$fl_dispositivo', '$fl_ubicacion');");
$crearTablaGraficaTemperatura = mysqli_query($conection, "INSERT INTO `g_temperatura` (`fl_g_temperatura`, `anio`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `fl_dispositivo`, `fl_ubicacion`) VALUES (NULL, '$anioExtra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$fl_dispositivo', '$fl_ubicacion');");

mysqli_close($conection);

header('location: ../view/dashboard.php');



