<?php
require_once '../controladores/listarRol.php';

//session_start();
if (!$_SESSION['active']) {
    header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link href="../assets/css/bootstrap.css" rel="stylesheet" />
        <script language="javascript" src="../assets/js/jquery.min.js "></script>

        <script language="javascript">
            $(document).ready(function () {

                $("#cbx_rol").change(function () {


                    $("#cbx_rol option:selected").each(function () {
                        fl_rol = $(this).val();
                        $.post("../controladores/obtenerUsuario.php", {fl_rol: fl_rol}, function (data) {
                            $("#cbx_usuario").html(data);
                        });
                    });
                })
            });

            $(document).ready(function () {
                $("#cbx_usuario").change(function () {
                    $("#cbx_usuario option:selected").each(function () {
                        fl_usuario = $(this).val();
                        $.post("../controladores/obtenerTablaUsuario.php", {fl_usuario: fl_usuario}, function (data) {
                            $("#cbx_usuario_tabla").html(data);
                        });
                    });
                })
            });
        </script>

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
                                <a class="dropdown-item active" href="usuarios.php">Usuarios</a>
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
                <a class="navbar-brand" href="dashboard.php">DASHBOARD</a>
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

        <div class="container-fluid">
            <div class="card">
                <h5 class="card-header alert-info">Administrador de usuarios</h5>
                <div class="card-body">
                    <h5 class="card-title">Listar usuarios</h5>
                    <div class="container">
                            <div class="form-row">
                            <div class="form-group col-md-5">
                                <div>Selecciona rol : <select  class="form-control" name="cbx_rol" id="cbx_rol">
                                        <option value="0">Seleccionar rol</option>
                                        <?php
                                        $query = listarRol();
                                        foreach ($query as $row) {
                                            ?>
                                            <option value="<?php echo $row['fl_rol']; ?>"><?php echo $row['nb_rol']; ?></option>
<?php } ?>
                                    </select></div>
                            </div>
                            <div class="form-group col-md-5">
                                <div>Selecciona usuario : <select  class="form-control" name="cbx_usuario" id="cbx_usuario"></select></div>
                            </div>
                            <div class="form-group col-md-2" style="align-items: flex-end">
                                <br>
                                <div class="d-flex justify-content-end">
                                    <a class="btn btn-primary" href="agregarUsuarios.php" >Agregar usuario</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <table class="table" id="cbx_usuario_tabla">

                        </table>
                    </div>
                </div>
            </div>
        </div>







        <script src="../assets/js/jquery.min.js" ></script>
        <script src="../assets/js/bootstrap.min.js"></script>

    </body>
</html>
