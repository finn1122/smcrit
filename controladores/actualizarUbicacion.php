<?php

require_once '../config/conexion.php';


    $fl_ubicacion = $_POST['fl_ubicacion'];
    $nb_ubicacion = $_POST['nb_ubicacion'];
    $no_oficina = $_POST['no_oficina'];
    $fl_crit = $_POST['fl_crit'];
    $fg_activo = $_POST['fg_activo'];
    $ds_ubicacion = $_POST['ds_ubicacion'];



    $query = mysqli_query($conection, "UPDATE c_ubicacion SET nb_ubicacion = '$nb_ubicacion', no_oficina = '$no_oficina', fl_crit = '$fl_crit',fe_ultimod = current_timestamp(), ds_ubicacion = '$ds_ubicacion', fg_activo = '$fg_activo' WHERE fl_ubicacion = '$fl_ubicacion'");
    mysqli_close($conection);

    header('location: ../view/ubicacion.php');
    
    //echo $fl_usuario, $nb_apaterno, $nb_amaterno,$nb_puesto, $fl_area, $fg_activo, $nb_login, $nb_contrasenia, $fl_rol, $ds_usuario; 
?>