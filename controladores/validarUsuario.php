<?php 

session_start();
require_once "../config/conexion.php";

			$user = mysqli_real_escape_string($conection,$_POST['usuario']);
			$pass = mysqli_real_escape_string($conection,$_POST['clave']);

			$query = mysqli_query($conection,"SELECT fl_usuario, nb_usuario, nb_apaterno, nb_amaterno, nb_puesto, fg_activo, nb_login, fl_rol  FROM c_usuario WHERE nb_login= '$user' AND nb_contrasenia = '$pass'");
			
			$result = mysqli_num_rows($query);

			if($result > 0)
			{
				$data = mysqli_fetch_array($query);
                                $activo= $data['fg_activo'];
                                if($activo == 1){
                                    
                                    $_SESSION['active'] = true;
                                    $usuario = $data['fl_usuario'];
                                    $_SESSION['fl_usuario'] = $data['fl_usuario'];
                                    $_SESSION['nb_usuario'] = $data['nb_usuario'];
                                    $_SESSION['nb_login']  = $data['nb_login'];
                                    $_SESSION['fl_rol']    = $data['fl_rol'];
                                    $guardarLogin = mysqli_query($conection, "INSERT INTO r_login (fl_login, fe_login, fl_usuario) VALUES (NULL, current_timestamp(),'".$usuario."');");
                                    mysqli_close($conection);
                                    header('location: ../view/dashboard.php');
                                    
                                } elseif($activo == 0){
                                    $validar = 'true';
                                    header("location: ../index.php?inactivo=$validar");
                                }
                                
			}else{
				header("location: ../index.php?fallo=true");
				session_destroy();
			}


?>