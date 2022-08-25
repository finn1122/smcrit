<?php
require_once '../config/conexion.php';


$fl_usuario= $_POST['fl_usuario'];


	
	$query = mysqli_query($conection, "SELECT U.fl_usuario, U.nb_usuario, U.nb_apaterno, U.nb_amaterno, U.nb_puesto, A.nb_area, U.fe_creacion, U.fe_ultimod, U.fg_activo, U.nb_login, R.nb_rol, U.ds_usuario FROM c_usuario U INNER JOIN c_area A ON U.fl_area = A.fl_area INNER JOIN c_rol R ON U.fl_rol = R.fl_rol WHERE U.fl_usuario = '$fl_usuario'");

	foreach ($query as $row) {
        if($row['fg_activo']==1){
            $bandera = 'activo';
        } elseif ($row['fg_activo']==0) {
            $bandera = 'inactivo';
        }
        
        
        $html="<table class='table'>";
        $html.="<tr><th scope='row'>Usuario</th><td>";
        $html.=$row['nb_usuario'].' '.$row['nb_apaterno'].' '.$row['nb_amaterno']; "</td>";
        $html.="</tr><tr><th scope='row'>Puesto</th><td>";
        $html.=$row['nb_puesto']."</td></tr><tr><th scope='row'>Mail</th><td>".$row['nb_login']."</td></tr><tr><th scope='row'>Area</th><td>";
        $html.=$row['nb_area']."</td></tr><tr><th scope='row'>Rol</th><td>".$row['nb_rol']."</td></tr>";
        $html.="<tr><th scope='row'>Bandera</th><td>".$bandera."</td><tr><th scope='row'>Descripción</th><td>";
        $html.=$row['ds_usuario']."</td></tr><tr><th scope='row'>Creación</th><td>".$row['fe_creacion']."</td></tr>";
        $html.="<tr><th colspan='2' >Acción</th></tr><tr><th>";
        $html.="<a href='actualizarUsuarios.php";
        $html.="?fl_usuario=";
        $html.=$row['fl_usuario']."'";
        $html.=">Editar</a></th> ";
        $html.="<th><a href='../controladores/eliminarUsuario.php";
        $html.="?fl_usuario=";
        $html.=$row['fl_usuario']."'";
        $html.=">Eliminar</a></th></tr>";
        
       }
       echo $html.="</table>";
	
	

mysqli_close($conection);

	//return $query;

?>