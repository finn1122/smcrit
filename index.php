<?php
session_start();

if (!empty($_SESSION['active'])) {
    header('location: view/dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Login | SMCRIT</title>
        <!-- CSS Files -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="assets/css/signin.css" rel="stylesheet"/>
        
    </head>
    <body>
       
        <form class="form-signin" method="post" action="controladores/validarUsuario.php">
            <img class="mb-4" src="https://www.onlinevolunteering.org/sites/default/files/organization/logo_teleton.jpg" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Iniciar Sesión</h1>
            <label for="inputEmail" class="sr-only"></label>
            <input type="email" name="usuario"  class="form-control" required placeholder="Usuario..." required autofocus>
            <label for="inputPassword" class="sr-only"></label>
            <input type="password" name="clave" class="form-control" required placeholder="Contraseña..." required>
            <?php
                if (isset($_GET["fallo"]) && $_GET["fallo"] == 'true') {
                    echo "<div style='color:red'>Usuario o contraseña invalido </div>";
                }elseif (isset ($_GET["inactivo"]) && $_GET["inactivo"]== 'true') {
                    echo "<label style='color:red'>Usuario inactivo, contacta al administrador</label>";
                    
                }
                ?>
            
            <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
        </form>
        
        
    </body>
</html>