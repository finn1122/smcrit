<?php
session_start();
require_once '../config/conexion.php';

if (isset($_GET['fl_dispositivo'])) {
    $sql = "SELECT D.fl_dispositivo, D.fl_ubicacion, D.nb_dispositivo, D.nb_modelo, D.fe_creacion, D.fe_ultimod, D.fg_activo, D.ds_dispositivo, U.nb_ubicacion from c_dispositivo D INNER JOIN c_ubicacion U on D.fl_ubicacion = U.fl_ubicacion WHERE D.fl_dispositivo = ? ";
    if ($stmt = $conection->prepare($sql)) {
        $stmt->bind_param("i", $_GET["fl_dispositivo"]);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows == 1) {
                $row = $result->fetch_array(MYSQLI_ASSOC);

                $fl_dispositivo = $row["fl_dispositivo"];
                $nb_dispositivo = $row["nb_dispositivo"];
                $nb_modelo = $row["nb_modelo"];
                //$fe_creacion =$row['fe_creacion'];
                //$fe_ultimod = $row['fe_ultimod'];
                $fg_activo = $row['fg_activo'];
                $ds_dispositivo = $row['ds_dispositivo'];
                $nb_ubicacion = $row['nb_ubicacion'];
                $fl_ubicacion = $row['fl_ubicacion'];
                
            } else {
                echo "Error! Data Not Found";
                exit();
            }
        } else {
            echo "Error! Please try again later.";
            exit();
        }
        $stmt->close();
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link href="../assets/css/bootstrap.css" rel="stylesheet" />

    </head>
    <body>
        <?php require_once '../partials/header.php'; ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <?php
            if ($_SESSION['fl_rol'] == 1) {
            ?>
            <a class="navbar-brand" href="dashboard.php">DASHBOARD</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto nav-tabs ">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Administrador
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="usuarios.php">Usuarios</a>
                            <a class="dropdown-item" href="dispositivos.php">Dispositivos</a>
                            <a class="dropdown-item" href="ubicacion.php">Ubicación</a>
                        </div>
                    </li>
                    <li class="nav-item">
                            <a class="nav-link" href="historialNotificacion.php">Historial de notificaciones</a>
                        </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../controladores/salir.php">Cerrar sesión</a>
                    </li>
                </ul>
            </div>
                <?php } ?>
            <?php
            if ($_SESSION['fl_rol'] == 2) {
            ?>
            <a class="navbar-brand" href="#">DASHBOARD</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto nav-tabs ">
                    <li class="nav-item">
                            <a class="nav-link" href="historialNotificacion.php">Historial de notificaciones</a>
                        </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../controladores/salir.php">Cerrar sesión</a>
                    </li>
                </ul>
            </div>
                <?php } ?>
        </nav>
        <br>
        <div class="container">
            <div class="card">
                <div class="card-header bg-light">
                        <div class="d-flex flex-row bd-highlight">
                            <div class="mr-auto p-2 bd-highlight" style="font-family: monospace; color: #000; font-size: large">Actualizar dispositivo: 
                                <a style="font-family: monospace; color: #007bff; font-size: large"><?php echo $nb_dispositivo; ?></a></div>
                            <div class="ml-auto p-2 bd-highlight" style="font-family: monospace; color: #000; font-size: large">Ubicación: 
                                <a style="font-family: monospace; color: #007bff; font-size: large"><?php echo $nb_ubicacion; ?></a></div>
                        </div>
                    </div>
                <div class="card-body">
                    <form method="POST" action="../controladores/actualizarDispositivo.php">
                    <input type="hidden" name="fl_usuario" />
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="hidden" name="fl_dispositivo" value="<?php echo $fl_dispositivo; ?>">

                                <label for="text">Nombre</label>
                                <input type="text" class="form-control" name="nb_dispositivo" required placeholder="Dispositivo" value="<?php echo $nb_dispositivo; ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="text" >Modelo</label>
                                <input type="text" class="form-control" name="nb_modelo" required placeholder="Modelo" value="<?php echo $nb_modelo; ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="text">Ubicación</label>
                                <select name="fl_rol" class="form-control">
                                    <option value="0">Seleccione:</option>
                                    <?php
                                    $query = mysqli_query($conection, "SELECT fl_ubicacion, nb_ubicacion FROM c_ubicacion WHERE 1");
                                    foreach ($query as $k){?>
                                    <option value="<?php echo $k['fl_ubicacion'] ?> "  <?php echo $k['fl_ubicacion']    == $fl_ubicacion ? 'selected' : ''  ?>>   <?php echo $k['nb_ubicacion'] ?></option>
                                    <?php    
                                    }
                                    ?>
                                    
                                </select>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="text">Bandera</label>
                                <select name="fg_activo" required class="form-control">
                                    <option value="">Seleccione:</option>
                                    <?php if ($fg_activo == 1){?>
                                        <option value="fg_activo" <?php echo $fg_activo == 1 ? 'selected' : ''  ?>>Activar</option>
                                        <option value="0">Desactivar</option>
                                    <?php } ?>
                                    <?php if ($fg_activo == 0){?>
                                        <option value="fg_activo" <?php echo $fg_activo == 0 ? 'selected' : ''  ?>>Desactivar</option>
                                        <option value="1">Activar</option>
                                    <?php } ?>
                                </select>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label for="text">Descripción de usuario</label>
                            <textarea class="form-control" name="ds_dispositivo" id="exampleFormControlTextarea1" rows="1"><?php echo $ds_dispositivo; ?></textarea>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    









    <script src="../assets/js/jquery.min.js" ></script>
    <script src="../assets/js/bootstrap.min.js"></script>

</body>
</html>
