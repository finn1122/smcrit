<?php
if (!$_SESSION['active']) {
    header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>SMCRIT</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="../assets/css/bootstrap.css" rel="stylesheet" />
        
    </head>
    <body>
        <header>
            <nav class="navbar navbar-dark bg-light">
                <a>Bienvenido: <?php if(($_SESSION['fl_rol']) == 1){echo 'Administrador';}if(($_SESSION['fl_rol']) == 2){echo 'Usuario';}?></a>
                <a>SMCRIT</a>
            </nav>
        </header>
               
    </body>
    
        
    
</html>	