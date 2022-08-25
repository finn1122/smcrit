<?php

require_once "../config/conexion.php";

session_start();

    if (!$_SESSION['active']){
        
        header('location: ../index.php');
    }else{
    
    $fl_dispositivo = $_GET['fl_dispositivo'];
    $query = mysqli_query($conection, "DELETE FROM c_dispositivo WHERE fl_dispositivo = '$fl_dispositivo'");
    mysqli_close($conection);
    //echo $fl_usuario;
    header('location: ../view/dispositivos.php');
    
    }
    
?>