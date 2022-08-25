<?php
 session_start();

function listarDispositivos(){
    
    require_once "../config/conexion.php";
    $query = mysqli_query($conection, "SELECT fl_dispositivo, nb_dispositivo FROM c_dispositivo");
    mysqli_close($conection);
    
    return $query;
}

            
if(!$_SESSION['active']){
    header('location: ../index.php');
}
?>


