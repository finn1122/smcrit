<?php

require_once '../config/conexion.php';


    $fl_dispositivo = $_POST['fl_dispositivo'];
    $nb_dispositivo = $_POST['nb_dispositivo'];
    $nb_modelo = $_POST['nb_modelo'];
    //$fe_creacion = $_POST['fe_creacion'];
    //$fe_ultimod= $_POST['fe_ultimod'];
    $fg_activo = $_POST['fg_activo'];
    $fl_ubicacion = $_POST['fl_ubicacion'];
    $ds_dispositivo = $_POST['ds_dispositivo'];



    $query = mysqli_query($conection, "UPDATE c_dispositivo SET nb_dispositivo = '$nb_dispositivo', nb_modelo = '$nb_modelo', fg_activo = '$fg_activo', fe_ultimod = current_timestamp(),ds_dispositivo = '$ds_dispositivo' WHERE fl_dispositivo = '$fl_dispositivo';");
    mysqli_close($conection);

    header('location: ../view/dispositivos.php');
    
    //echo $fl_usuario, $nb_apaterno, $nb_amaterno,$nb_puesto, $fl_area, $fg_activo, $nb_login, $nb_contrasenia, $fl_rol, $ds_usuario; 
?>