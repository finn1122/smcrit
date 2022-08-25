
    <?php 
    require_once '../config/conexion.php';
    $fl_dispositivo= $_POST['fl_dispositivo'];


    
    $query = mysqli_query($conection, "SELECT fl_dispositivo, nb_dispositivo, nb_modelo, fe_creacion, fe_ultimod, fg_activo, ds_dispositivo FROM c_dispositivo WHERE fl_dispositivo = '$fl_dispositivo'");

    foreach ($query as $row) {
        if($row['fg_activo']==1){
            $bandera = 'activo';
        } elseif ($row['fg_activo']==0) {
            $bandera = 'inactivo';
        }


        $html="<table class='table table-sm'>";
        $html.="<thead><tr><th>Dispositivo</th><td>";
        $html.=$row['nb_dispositivo']; "</td>";
        $html.="</tr></thead><tbody><tr><th scope='row'>Modelo</th><td>";
        $html.=$row['nb_modelo']."</td></tr><tr><th scope='row'>Creación</th><td>".$row['fe_creacion']."</td></tr><tr><th scope='row'>Ultima modificación</th><td>";
        $html.=$row['fe_ultimod']."</td></tr><tr><th scope='row'>Descripción</th><td>".$row['ds_dispositivo']."</td></tr>";
        $html.="<tr><th scope='row'>Bandera</th><td>".$bandera."</td>";
        $html.="<tr><th colspan='2' >Acción</th></tr><tr><th>";
        $html.="<a href='actualizarDispositivo.php";
        $html.="?fl_dispositivo=";
        $html.=$row['fl_dispositivo']."'";
        $html.=">Editar</a></th> ";
        $html.="<th><a href='../controladores/eliminarDispositivo.php";
        $html.="?fl_dispositivo=";
        $html.=$row['fl_dispositivo']."'";
        $html.=">Eliminar</a></th></tr></tbody> ";
        
       }
       echo $html.="</table>";

mysqli_close($conection);

	//return $query;

?>