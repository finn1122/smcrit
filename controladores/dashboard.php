<?php



function listarUbicacion(){
    require_once '../config/conexion.php';
    $query = mysqli_query($conection, "SELECT fl_ubicacion, nb_ubicacion FROM c_ubicacion WHERE 1");
    return $query;
}
