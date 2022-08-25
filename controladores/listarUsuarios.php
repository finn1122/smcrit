<?php


session_start();

function listarUsuarios(){
    
    require_once "../config/conexion.php";
    $query = mysqli_query($conection, "SELECT U.fl_usuario, U.nb_usuario, U.nb_apaterno, U.nb_amaterno, U.nb_puesto, A.nb_area, U.fe_creacion, U.fe_ultimod, U.fg_activo, U.nb_login, R.nb_rol, U.ds_usuario FROM c_usuario U INNER JOIN c_area A ON U.fl_area = A.fl_area INNER JOIN c_rol R ON U.fl_rol = R.fl_rol");
    mysqli_close($conection);
    
    return $query;
}
        
if(!$_SESSION['active']){
    header('location: ../index.php');
}
?>


