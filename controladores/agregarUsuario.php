<?php

    require_once "../config/conexion.php";


    $nb_usuario = $_POST['nb_usuario'];
    $nb_apaterno = $_POST['nb_apaterno'];
    $nb_amaterno = $_POST['nb_amaterno'];
    $nb_puesto = $_POST['nb_puesto'];
    $fl_area = $_POST['fl_area'];
    $fg_activo = 1;
    $nb_login = $_POST['nb_login'];
    $nb_contrasenia = $_POST['nb_contrasenia'];
    $fl_rol = $_POST['fl_rol'];
    $ds_usuario = $_POST['ds_usuario'];
    $ds_correo = 'default';
    
    
    
    $query = mysqli_query($conection, "INSERT INTO c_usuario (fl_usuario, nb_usuario, nb_apaterno, nb_amaterno, nb_puesto, fl_area, fe_creacion, fe_ultimod, fg_activo, nb_login, nb_contrasenia, fl_rol, ds_usuario)  VALUES (NULL, '$nb_usuario', '$nb_apaterno', '$nb_amaterno', '$nb_puesto', '$fl_area',  current_timestamp(), current_timestamp(), '$fg_activo', '$nb_login', '$nb_contrasenia', '$fl_rol', '$ds_usuario');");
    
    $consultarFolio = mysqli_query($conection, "SELECT fl_usuario FROM c_usuario WHERE nb_login = '$nb_login' AND nb_usuario = '$nb_usuario' AND nb_apaterno = '$nb_apaterno' AND nb_amaterno = '$nb_amaterno'");
    
    foreach ($consultarFolio as $row){
        $fl_usuario = $row['fl_usuario'];
    }
    
    $insertar = mysqli_query($conection, "INSERT INTO c_correo (fl_correo, nb_correo, fl_usuario, fe_creacion, fe_ultimod, fg_activo, ds_correo) VALUES (NULL, '$nb_login', '$fl_usuario', current_timestamp(), current_timestamp(), '$fg_activo', '$ds_correo')");
    
    mysqli_close($conection);
    
    header('location: ../view/usuarios.php');
    
?>

