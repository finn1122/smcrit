<?php


session_start();

function listarUbicacion(){
    
    require_once "../config/conexion.php";
    $query = mysqli_query($conection, "SELECT fl_ubicacion, nb_ubicacion FROM c_ubicacion");
    mysqli_close($conection);
    
    return $query;
}
        
if(!$_SESSION['active']){
    header('location: ../index.php');
}
?>


