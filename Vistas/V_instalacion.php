<?php

session_start();

if (!isset($_COOKIE['nombre'])) {

    echo '
    <script>
        alert("Debe iniciar sesión para acceder al contenido.");
        window.location = "V_login.php";
    </script>
    ';
}

if ($_SESSION["perfil"] != 1) {

    echo '
    <script>
        alert("No tiene privilegios suficientes para acceder a este contenido.");
        window.location = "V_index.php";
    </script>
    ';
}

if (!isset($_COOKIE["nombre"])) {
    session_destroy();
}

if (isset($_COOKIE["nombre"])) {
    $perfil_login = $_SESSION["perfil"];
    $usuario_login = $_COOKIE["nombre"];

    if ($perfil_login == 1) {
        $sesion = "<a class='nav-link' style='color: yellow' href=V_menu.php>$usuario_login</a>";
    }
} else {
    $sesion = "<a class='nav-link' href='V_login.php' style='text-decoration: none;'>Login</a>";
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maraver Procuradores</title>
    <link rel="icon" type="image/png" href="../img/logo balanza.png">
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <div>
            <img class="col-4" src="../img/logo.png">
        </div>
        <nav class="navbar navbar-expand-lg">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav col-12">
                    <li class="nav-item col-2 active">
                        <a class="nav-link" href="V_directorio.php">Directorio</a>
                    </li>
                    <li class="nav-item dropdown col-2">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Documentación
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="V_documentacion.php?doc=administracion">Administración</a></li>
                            <li><a class="dropdown-item" href="V_documentacion.php?doc=demandas">Presentación de demandas</a></li>
                            <li><a class="dropdown-item" href="V_documentacion.php?doc=escritos">Control de escritos</a></li>
                            <li><a class="dropdown-item" href="V_documentacion.php?doc=notificaciones">Notificaciones</a></li>
                        </ul>
                    </li>
                    <li class="nav-item col-2">
                        <a class="nav-link" href="V_organigrama.php">Organigrama</a>
                    </li>
                    <li class="nav-item col-2">
                        <a class="nav-link" href="V_denuncias.php">Denuncias</a>
                    </li>
                    <li class="nav-item col-2">
                        <?php echo $sesion ?>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="container">
        <h4>Inventario:</h4>
        <form method="post" action="../Controlador/C_instalacion.php">
            <span>Dirección Anydesk: </span><input type="text" name="anydesk"/><br>
            <span>Contraseña Anydesk: </span><input type="text" name="pass"/><br><br>
            <input type="submit" value="Solicitar">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>