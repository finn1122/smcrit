
    <?php 
    require_once '../config/conexion.php';
    $fl_ubicacion= $_POST['fl_ubicacion'];


    
    $query = mysqli_query($conection, "SELECT CU.fl_ubicacion, CU.nb_ubicacion, CU.fe_creacion, CU.fe_ultimod, CU.no_oficina, CU.fg_activo, CU.ds_ubicacion, CC.nb_crit FROM c_ubicacion CU INNER JOIN c_crit CC ON CC.fl_crit = CU.fl_crit AND CU.fl_ubicacion = '$fl_ubicacion'");

    foreach ($query as $row) {
        if($row['fg_activo']==1){
            $bandera = 'activo';
        } elseif ($row['fg_activo']==0) {
            $bandera = 'inactivo';
        }


        $html="<table class='table table-sm'>";
        $html.="<thead><tr><th>Ubicacion</th><td>";
        $html.=$row['nb_ubicacion']; "</td>";
        $html.="</tr></thead><tbody><tr><th scope='row'>CRIT</th><td>";
        $html.=$row['nb_crit']; "</th>";
        $html.="</tr></thead><tbody><tr><th scope='row'>oficina</th><td>";
        $html.=$row['no_oficina']."</td></tr><tr><th scope='row'>Descripción</th><td>".$row['ds_ubicacion']."</td></tr><tr><th scope='row'>Fecha de creación</th><td>";
        $html.=$row['fe_creacion']."</td></tr><tr><th scope='row'>Ultima modificación</th><td>".$row['fe_ultimod']."</td></tr>";
        $html.="<tr><th scope='row'>Bandera</th><td>".$bandera."</td>";
        $html.="<tr><th colspan='2' >Acción</th></tr><tr><th>";
        $html.="<a href='actualizarUbicacion.php";
        $html.="?fl_ubicacion=";
        $html.=$row['fl_ubicacion']."'";
        $html.=">Editar</a></th> ";
        $html.="<th><a href='../controladores/eliminarUbicacion.php";
        $html.="?fl_ubicacion=";
        $html.=$row['fl_ubicacion']."'";
        $html.=">Eliminar</a></th></tr></tbody> ";
        
       }
       echo $html.="</table>";

mysqli_close($conection);

	//return $query;

?>