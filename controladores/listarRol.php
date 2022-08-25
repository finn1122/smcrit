<?php


session_start();

function listarRol(){
    
    require_once "../config/conexion.php";
    $query = mysqli_query($conection, "SELECT fl_rol, nb_rol FROM c_rol");
    mysqli_close($conection);
    
    return $query;
}
        
if(!$_SESSION['active']){
    header('location: ../index.php');
}
?>


