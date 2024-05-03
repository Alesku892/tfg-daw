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

if ($_SESSION["perfil"] != 1 && $_SESSION["perfil"] != 2) {

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

    if ($perfil_login == 1 || $perfil_login == 2) {
        $sesion = "<a class='nav-link' style='color: yellow' href=V_menu.php>$usuario_login</a>";
    }
} else {
    $sesion = "<a class='nav-link' href='V_login.php' style='text-decoration: none;'>Login</a>";
}

?>

<script>
    function radiocon(radioId) {
        const radios = document.getElementsByName('contrato');
        radios.forEach(radio => {
            if (radio.id !== radioId) {
                radio.checked = false;
            }
        });
    };

    function radiomod(radioId) {
        const radios = document.getElementsByName('modalidad');
        radios.forEach(radio => {
            if (radio.id !== radioId) {
                radio.checked = false;
            }
        });
    };
    document.addEventListener("DOMContentLoaded", (event) => {

        const presencial = document.getElementById('presencial');

        presencial.addEventListener('click', (event) => {

            if (document.getElementById('comprobacion')) {
                const comprobacion = document.getElementById('comprobacion').getAttribute('data-comp');
                if (comprobacion === "0") {
                    document.getElementById('remoto').checked = true;
                    alert('No hay ningún puesto de trabajo libre, el trabajador debe utilizar la modalidad remota.')
                }
            } else {
                const mostrar = document.querySelectorAll('.ptlibres');

                mostrar.forEach((element) => {
                    element.style.visibility = 'visible';
                });
            }
        });
    });
</script>

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

    <div>
        <div class="container">
            <div>
                <br>
                <h4>Solicitud de alta:</h4>
                <div class="alta">
                    <form method="post" action="../Controlador/C_alta_submit.php">
                    <!-- <form method="post" action="asd.php"> -->
                        <span>Indique la forma de contratación:</span><br><br>
                        <input type="radio" name="contrato" value="trabajador" id="trabajador" onclick="radiocon('trabajador')" /><span> Trabajador</span><br>
                        <input type="radio" name="contrato" value="becario" id="becario" onclick="radiocon('becario')" /><span> Becario</span><br><br>
                        <span>Indique la modalidad del usuario:</span><br><br>
                        <input type="radio" name="modalidad" value="presencial" id="presencial" onclick="radiomod('presencial')" /><span> Presencial</span><br>
                        <input type="radio" name="modalidad" value="remoto" id="remoto" onclick="radiomod('remoto')" /><span> Remoto</span><br><br>
                        <span>Datos requeridos:</span><br><br>
                        <div class="alta">
                            <div class="alta1">
                                <span>DNI: </span><br>
                                <span>Nombre: </span><br>
                                <span>Primer apellido: </span><br>
                                <span>Segundo apellido: &nbsp;</span><br>
                                <span>Teléfono: </span><br>

                            </div>
                            <div class="alta2">
                                <input type="text" name="dni" /><br>
                                <input type="text" name="nombre" /><br>
                                <input type="text" name="ap1" /><br>
                                <input type="text" name="ap2" /><br>
                                <input type="text" name="telefono" /><br>
                            </div>
                        </div><br>
                        <?php
                        if ($_SESSION['perfil'] == 1) {

                            require_once "../Controlador/C_alta.php";

                            echo "<span>Indique al departamento al que pertenecerá el usuario: <br><br>";
                            echo "<select name='departamento'>";
                            echo "<option value='' disabled selected></option>";
                            foreach ($departamento as $dep) {
                                echo "<option value=" . $dep['CodDep'] . ">" . $dep['departamento'] . "</option>";
                            }
                            echo "</select><br>";
                        } else {
                            echo "<input type='text' style='visibility: hidden;' name='departamento' value='".$_SESSION['departamento']."'/>";
                        }
                        ?><br><br>
                        <div class="ptlibres">
                            <?php

                            require_once "../Controlador/C_alta.php";

                            $comprobacion = 0;

                            if (count($ptlibres) > 0) {
                                $comprobacion = 1;
                                echo "<span>Seleccione un puesto libre para el usuario: <br><br>";
                                echo "<select name='ptlibre'>";
                                echo "<option value='' disabled selected></option>";
                                foreach ($ptlibres as $ptlibre) {
                                    echo "<option value=" . $ptlibre['CodPT'] . ">" . $ptlibre['CodPT'] . "</option>";
                                }
                                echo "</select><br>";
                            } else {
                                echo $comprobacion;
                                echo "<span style='visibility: hidden;' id='comprobacion' data-comp='" . $comprobacion . "'></span>";
                            }
                            ?><br><br>
                        </div>
                        <input type="submit" value="Enviar" />
                    </form>

                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>