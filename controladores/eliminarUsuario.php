<?php

require_once "../config/conexion.php";

session_start();

    if (!$_SESSION['active']){
        
        header('location: ../index.php');
    }else{
    
    $fl_usuario = $_GET['fl_usuario'];
    $query = mysqli_query($conection, "DELETE FROM c_usuario WHERE fl_usuario = '$fl_usuario'");
    mysqli_close($conection);
    //echo $fl_usuario;
    header('location: ../view/usuarios.php');
    
    }
    
?>