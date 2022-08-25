<?php

    $nb_ubicacion = $_POST['nb_ubicacion'];
    $no_oficina = $_POST['no_oficina'];
    $fl_crit = $_POST['fl_crit'];
    $ds_ubicacion = $_POST['ds_ubicacion'];
    $fg_activo = 1;
    
    
    
    
    require_once "../config/conexion.php";
    $query = mysqli_query($conection, "INSERT INTO c_ubicacion (fl_ubicacion, nb_ubicacion, no_oficina, fe_creacion, fe_ultimod, fg_activo, fl_crit, ds_ubicacion)  VALUES (NULL, '".$nb_ubicacion."', '".$no_oficina."',  current_timestamp(), current_timestamp(), '".$fg_activo."', '".$fl_crit."', '".$ds_ubicacion."');");
    mysqli_close($conection);
    
    header('location: ../view/ubicacion.php');
    
?>

