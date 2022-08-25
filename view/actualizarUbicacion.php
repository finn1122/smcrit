<?php
session_start();
require_once '../config/conexion.php';

if (isset($_GET['fl_ubicacion'])) {
    $sql = "SELECT U.fl_ubicacion, U.nb_ubicacion, U.no_oficina, U.fg_activo, U.ds_ubicacion, C.fl_crit, C.nb_crit FROM c_ubicacion U INNER JOIN c_crit C ON U.fl_crit = C.fl_crit WHERE fl_ubicacion = ?";
    if ($stmt = $conection->prepare($sql)) {
        $stmt->bind_param("i", $_GET["fl_ubicacion"]);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows == 1) {
                $row = $result->fetch_array(MYSQLI_ASSOC);

                $fl_ubicacion = $row["fl_ubicacion"];
                $nb_ubicacion = $row["nb_ubicacion"];
                $no_oficina = $row["no_oficina"];
                $nb_crit = $row['nb_crit'];
                $fg_activo = $row['fg_activo'];
                $ds_ubicacion = $row['ds_ubicacion'];
                $fl_crit = $row['fl_crit'];
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
                <h5 class="card-header alert-info">Actualizando: <?php echo $nb_ubicacion . ' del ' . $nb_crit ?> </h5>
                <div class="card-body">
                    <form method="POST" action="../controladores/actualizarUbicacion.php">
                        <input type="hidden" name="fl_ubicacion" />
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="hidden" name="fl_ubicacion" value="<?php echo $fl_ubicacion; ?>">

                                <label for="text">Ubicación</label>
                                <input type="text" class="form-control" name="nb_ubicacion" required placeholder="Ubicación" value="<?php echo $nb_ubicacion; ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="text" >No. Oficina</label>
                                <input type="text" class="form-control" name="no_oficina" required placeholder="Número de oficina" value="<?php echo $no_oficina; ?>">
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="text">CRIT</label>
                                <select name="fl_crit" class="form-control">
                                    <option value="0">Seleccione:</option>
                                    <?php
                                    $query = mysqli_query($conection, "SELECT fl_crit, nb_crit FROM c_crit WHERE 1");
                                    foreach ($query as $k) {
                                        ?>
                                        <option value="<?php echo $k['fl_crit'] ?> "  <?php echo $k['fl_crit'] == $fl_crit ? 'selected' : '' ?>>   <?php echo $k['nb_crit'] ?></option>
                                        <?php
                                    }
                                    ?>

                                </select>
                            </div>


                            <div class="form-group col-md-6">
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
                        <div class="form-group">
                            <label for="text">Descripción de usuario</label>
                            <textarea class="form-control" name="ds_ubicacion" id="exampleFormControlTextarea1" rows="1"><?php echo $ds_ubicacion; ?></textarea>
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
