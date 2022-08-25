<?php

require_once '../config/conexion.php';


    $fl_usuario = $_POST['fl_usuario'];
    $nb_usuario = $_POST['nb_usuario'];
    $nb_apaterno = $_POST['nb_apaterno'];
    $nb_amaterno = $_POST['nb_amaterno'];
    $nb_puesto = $_POST['nb_puesto'];
    $fl_area = $_POST['fl_area'];
    $fg_activo = $_POST['fg_activo'];
    $nb_login = $_POST['nb_login'];
    $nb_contrasenia = $_POST['nb_contrasenia'];
    $fl_rol = $_POST['fl_rol'];
    $ds_usuario = $_POST['ds_usuario'];



    $query = mysqli_query($conection, "UPDATE c_usuario SET nb_usuario = '$nb_usuario', nb_apaterno = '$nb_apaterno', nb_amaterno = '$nb_amaterno', nb_puesto = '$nb_puesto', fe_ultimod = current_timestamp(),fl_area = '$fl_area', fg_activo = '$fg_activo', nb_login = '$nb_login', fl_rol = '$fl_rol' , ds_usuario = '$ds_usuario' WHERE fl_usuario = '$fl_usuario'");
    mysqli_close($conection);

    header('location: ../view/usuarios.php');
    
    //echo $fl_usuario, $nb_apaterno, $nb_amaterno,$nb_puesto, $fl_area, $fg_activo, $nb_login, $nb_contrasenia, $fl_rol, $ds_usuario; 
?>