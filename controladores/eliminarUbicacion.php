<?php

require_once "../config/conexion.php";

session_start();

    if (!$_SESSION['active']){
        
        header('location: ../index.php');
    }else{
    
    $fl_ubicacion = $_GET['fl_ubicacion'];
    $query = mysqli_query($conection, "DELETE FROM c_ubicacion WHERE fl_ubicacion = '$fl_ubicacion'");
    mysqli_close($conection);
    //echo $fl_usuario;
    header('location: ../view/ubicacion.php');
    
    }
    
?>