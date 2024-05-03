<?php

session_start();

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

<!DOCTYPE html>
<html lang="es">

<script>
    function radio(radioId) {
        const radios = document.getElementsByName('directorio');
        radios.forEach(radio => {
            if (radio.id !== radioId) {
                radio.checked = false;
            }
        });

        //POR PERSONA
        if (document.getElementById('porPersonaid').checked) {

            <?php
            require('../Controlador/C_getUsuPT.php');

            $cont = 1;

            if (isset($_SESSION["perfil"]) && $_SESSION["perfil"] == 1) {
                foreach ($usuPT as $usud) {
                    $contenido[] = "<div class='dirpp div" . $cont . "' data-pt='<span>Nombre: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . $usud['nombre'] . "</span><br><span>Departamento: &nbsp" . $usud['departamento'] . "</span><br><span>Correo: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . $usud['correo'] . "</span><br><span>Extensión: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . $usud['extension'] . "</span><br><span>Equipo: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . $usud['equipo'] . "</span><br><span>Monitor: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . $usud['monitor'] . "</span>'><a href='#'>" . $usud['nombre'] . "</a></div>";
                    $cont++;
                }
            } else {
                foreach ($usuPT as $usud) {
                    $contenido[] = "<div class='dirpp div" . $cont . "' data-pt='<span>Nombre: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . $usud['nombre'] . "</span><br><span>Departamento: &nbsp" . $usud['departamento'] . "</span><br><span>Correo: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . $usud['correo'] . "</span><br><span>Extensión: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . $usud['extension'] . "</span><a href='#'>" . $usud['nombre'] . "</a></div>";
                    $cont++;
                }
            }

            ?>

            const dirppElements = document.querySelectorAll('.dirpp');
            const dirpdElements = document.querySelectorAll('.dirpd');
            const dirptElements = document.querySelectorAll('.dirpt');

            dirppElements.forEach((element) => {
                element.style.visibility = 'visible';
            });

            dirpdElements.forEach((element) => {
                element.style.visibility = 'hidden';
            });
            dirptElements.forEach((element) => {
                element.style.visibility = 'hidden';
            });
        }

        //POR DEPARTAMENTO
        if (document.getElementById('porDepid').checked) {

            <?php
            require('../Controlador/C_getDepPT.php');

            $cont = 1;

            foreach ($depPT as $pt) {
                $contenido[] = "<div class='dirpd div" . $cont . "'><a>" . $pt['departamento'] . "</a></div>";
                $cont++;
            }

            ?>

            const dirppElements = document.querySelectorAll('.dirpp');
            const dirpdElements = document.querySelectorAll('.dirpd');
            const dirptElements = document.querySelectorAll('.dirpt');

            document.querySelector('.dirinfo').style.visibility = 'hidden';

            dirpdElements.forEach((element) => {
                element.style.visibility = 'visible';
            });

            dirppElements.forEach((element) => {
                element.style.visibility = 'hidden';
            });

            dirptElements.forEach((element) => {
                element.style.visibility = 'hidden';
            });
        }

        //POR PT
        if (document.getElementById('porPTid').checked) {

            <?php
            require('../Controlador/C_getPT.php');

            $cont = 1;

            foreach ($ptnum as $ptn) {
                $contenido[] = "<div class='dirpt div" . $cont . "' <a>" . $ptn['PT'] . "</a></div>";
                $cont++;
            }

            ?>

            const dirppElements = document.querySelectorAll('.dirpp');
            const dirpdElements = document.querySelectorAll('.dirpd');
            const dirptElements = document.querySelectorAll('.dirpt');

            document.querySelector('.dirinfo').style.visibility = 'hidden';

            dirptElements.forEach((element) => {
                element.style.visibility = 'visible';
            });

            dirppElements.forEach((element) => {
                element.style.visibility = 'hidden';
            });
            dirpdElements.forEach((element) => {
                element.style.visibility = 'hidden';
            });
        }
    }

    document.addEventListener("DOMContentLoaded", (event) => {

        const arrayinfo = document.querySelectorAll('.dirpp');

        arrayinfo.forEach((element) => {
            element.addEventListener('click', (event) => {
                document.querySelector('.dirinfo').style.visibility = 'visible';

                $pt = element.getAttribute("data-pt");

                document.cookie = "pt=" + $pt + ";SameSite=None;Secure";

                //ALMACENO VALOR COOKIE EN VARIABLE
                function getCookieValue(cookieName) {
                    var cookies = document.cookie.split("; ");
                    for (var i = 0; i < cookies.length; i++) {
                        var cookie = cookies[i].split("=");
                        if (cookie[0] === cookieName) {
                            return decodeURIComponent(cookie[1]);
                        }
                    }
                    return null;
                }

                var ptmostrar = getCookieValue("pt");

                //MUESTRO EL CONTENIDO EN EL DIV
                document.querySelector(".ptcontenido").innerHTML = ptmostrar;

            });
        });
    });
</script>

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


    <div class="directorio container">
        <br><br>

        <div class="dir dir1 parent">

            <?php

            $array = implode("", $contenido);
            echo $array;
            ?>

            <div class="div19">ARMARIOS</div>
            <div class="div20">
                <p>&nbsp;ARMARIOS</p>
            </div>

        </div>

        <div class="dir dir2">
            <form>
                <input type="radio" name="directorio" id="porPersonaid" onclick="radio('porPersonaid')" checked /><span> Directorio por persona</span><br>
                <input type="radio" name="directorio" id="porDepid" onclick="radio('porDepid')" /><span> Directorio por departamento</span><br>
                <input type="radio" name="directorio" id="porPTid" onclick="radio('porPTid')" /><span> Directorio por puesto de trabajo</span>
            </form>
            <br><br>
            <div class="dirinfo">
                <div class="ptcontenido">

                </div>
            </div>
        </div>

    </div>
</body>