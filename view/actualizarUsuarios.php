    <?php
session_start();
require_once '../config/conexion.php';

if (isset($_GET['fl_usuario'])) {
    $sql = "SELECT A.fl_area, U.fl_usuario, U.nb_usuario, U.nb_contrasenia, U.nb_apaterno, U.nb_amaterno, U.nb_puesto, A.nb_area, U.fe_creacion, U.fe_ultimod, U.fg_activo, U.nb_login, R.nb_rol, R.fl_rol, U.ds_usuario FROM c_usuario U INNER JOIN c_area A ON U.fl_area = A.fl_area INNER JOIN c_rol R ON U.fl_rol = R.fl_rol WHERE fl_usuario = ?";
    if ($stmt = $conection->prepare($sql)) {
        $stmt->bind_param("i", $_GET["fl_usuario"]);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows == 1) {
                $row = $result->fetch_array(MYSQLI_ASSOC);

                $fl_usuario = $row["fl_usuario"];
                $nb_usuario = $row["nb_usuario"];
                $nb_apaterno = $row["nb_apaterno"];
                $nb_amaterno = $row['nb_amaterno'];
                $nb_puesto = $row['nb_puesto'];
                $nb_login = $row['nb_login'];
                $fl_area = $row['fl_area'];
                $fl_rol = $row['fl_rol'];
                $fg_activo = $row['fg_activo'];
                $ds_usuario = $row['ds_usuario'];
                $nb_contrasenia = $row['nb_contrasenia'];
                //$fe_creacion = $row['fe_creacion'];
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
                <h5 class="card-header alert-info">Actualizando : <?php echo $nb_usuario . ' ' . $nb_apaterno . ' ' . $nb_amaterno ?> </h5>
                <div class="card-body">
                    <form method="POST" action="../controladores/actualizarUsuario.php">
                        <input type="hidden" name="fl_usuario" />
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="hidden" name="fl_usuario" value="<?php echo $fl_usuario; ?>">

                                <label for="text">Nombre</label>
                                <input type="text" class="form-control" name="nb_usuario" required placeholder="Nombre(s)" value="<?php echo $nb_usuario; ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="text" >Apellido paterno</label>
                                <input type="text" class="form-control" name="nb_apaterno" required placeholder="Apellido paterno" value="<?php echo $nb_apaterno; ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="text">Apellido materno</label>
                                <input type="text" class="form-control" name="nb_amaterno" placeholder="Apellido materno" value="<?php echo $nb_amaterno; ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="text" >Puesto</label>
                                <input type="text" class="form-control" name="nb_puesto" required placeholder="Puesto" value="<?php echo $nb_puesto; ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="text">Mail</label>
                                <input type="email" class="form-control" name="nb_login" required placeholder="Correo electronico" value="<?php echo $nb_login; ?>">
                            </div>
                        </div>                         
                        <div class="form-row">

                            <div class="form-group col-md-5">
                                <label for="text">Area</label>

                                <select name="fl_area" class="form-control">
                                    <option value="0" >Seleccione</option>
                                    <?php
                                    $query = mysqli_query($conection, "SELECT fl_area, nb_area FROM c_area WHERE 1");
                                    foreach ($query as $k) {
                                        ?>
                                        <option value="<?php echo $k['fl_area'] ?> "  <?php echo $k['fl_area'] == $fl_area ? 'selected' : '' ?>>   <?php echo $k['nb_area'] ?></option>
                                        <?php
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="text">Rol</label>
                                <select name="fl_rol" class="form-control">
                                    <option value="0">Seleccione:</option>
                                    <?php
                                    $query = mysqli_query($conection, "SELECT fl_rol, nb_rol FROM c_rol WHERE 1");
                                    foreach ($query as $k) {
                                        ?>
                                        <option value="<?php echo $k['fl_rol'] ?> "  <?php echo $k['fl_rol'] == $fl_rol ? 'selected' : '' ?>>   <?php echo $k['nb_rol'] ?></option>
                                        <?php
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="text">Bandera</label>
                                <select name="fg_activo" required class="form-control">
                                    <option value="">Seleccione:</option>
                                    <?php if ($fg_activo == 1) { ?>
                                        <option value="fg_activo" <?php echo $fg_activo == 1 ? 'selected' : '' ?>>Activar</option>
                                        <option value="0">Desactivar</option>
                                    <?php } ?>
                                    <?php if ($fg_activo == 0) { ?>
                                        <option value="fg_activo" <?php echo $fg_activo == 0 ? 'selected' : '' ?>>Desactivar</option>
                                        <option value="1">Activar</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="text">Contraseña</label>
                                <input type="text" class="form-control" name="nb_contrasenia" required placeholder="Contraseña" value="<?php echo $nb_contrasenia; ?>">
                            
                            </div>
                        <div class="form-group col-md-6">
                            <label for="text">Descripción de usuario</label>
                            <textarea class="form-control" name="ds_usuario" id="exampleFormControlTextarea1" rows="1"><?php echo $ds_usuario; ?></textarea>
                        </div>
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
