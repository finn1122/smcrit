
<?php
	require_once "../config/conexion.php";
        
        $fl_ubicacion = $_POST['fl_ubicacion'];
	
	$queryM = "SELECT fl_dispositivo, nb_dispositivo FROM c_dispositivo WHERE fl_ubicacion = '$fl_ubicacion' ";
	$resultadoM = $conection->query($queryM);
	
	$html= "<option value='0'>Dispositivo</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['fl_dispositivo']."'>".$rowM['nb_dispositivo']."</option>";
	}
	
	echo $html;
?>