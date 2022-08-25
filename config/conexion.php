<?php 
/*
if(!$_SESSION['active'])*/
	
	$host = 'localhost';
	$user = 'root';
	$password = '';
	$db = 'smcrit';

	$conection = @mysqli_connect($host,$user,$password,$db);

	if(!$conection){
		echo "Error en la conexión";
	}
        //establecemos los caracteres utf8 para no tener problemas con los acentos, ñ, etc.
        if (!$conection->set_charset("utf8")) {//asignamos la codificación comprobando que no falle
        die("Error cargando el conjunto de caracteres utf8");
        }
        /*
}*/



?>