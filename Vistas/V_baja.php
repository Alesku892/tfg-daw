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
    function radio(radioId) {
        const radios = document.getElementsByName('ccorreo');
        radios.forEach(radio => {
            if (radio.id !== radioId) {
                radio.checked = false;
            }
        });

        if (document.getElementById('eliminar').checked) {

            const redirElements = document.querySelectorAll('.redir');
            const aliElements = document.querySelectorAll('.ali');

            redirElements.forEach((element) => {
                element.style.visibility = 'hidden';
            });
            aliElements.forEach((element) => {
                element.style.visibility = 'hidden';
            });
        }

        if (document.getElementById('redirigir').checked) {

            const redirElements = document.querySelectorAll('.redir');
            const aliElements = document.querySelectorAll('.ali');

            redirElements.forEach((element) => {
                element.style.visibility = 'visible';
            });

            aliElements.forEach((element) => {
                element.style.visibility = 'hidden';
            });
        }

        if (document.getElementById('calias').checked) {

            const redirElements = document.querySelectorAll('.redir');
            const aliElements = document.querySelectorAll('.ali');

            aliElements.forEach((element) => {
                element.style.visibility = 'visible';
            });

            redirElements.forEach((element) => {
                element.style.visibility = 'hidden';
            });
        }
    }

    function radiod(radioId) {
        const radios = document.getElementsByName('carpeta');
        radios.forEach(radio => {
            if (radio.id !== radioId) {
                radio.checked = false;
            }
        });
    }

    document.addEventListener("DOMContentLoaded", (event) => {

        const array = document.querySelectorAll('.user');

        array.forEach((element) => {
            element.addEventListener('click', (event) => {

                // FUNCIÓN COOKIES
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
                // CREO LAS COOKIES
                $departamento = element.getAttribute("data-departamento");
                $perf = element.getAttribute("data-perfil");

                document.cookie = "departamento=" + $departamento + ";SameSite=None;Secure";
                document.cookie = "perfil=" + $perf + ";SameSite=None;Secure";

                // EXTRAIGO EL VALOR DEL PERFIL Y SI ES 2 MUESTRO EL CONTENIDO DEL SPAN
                var perf = getCookieValue("perfil");

                if (perf == '2') {
                    const mostrar = document.querySelectorAll('.hiddenresp');

                    mostrar.forEach((element) => {
                        element.style.visibility = 'visible';
                    });
                    
                } else {
                    const ocultar = document.querySelectorAll('.hiddenresp');

                    ocultar.forEach((element) => {
                        element.style.visibility = 'hidden';
                    });

                    document.querySelector(".depmostrar").innerHTML = `<span class="hiddenresp"></span>`;
                }

                var depmostrar = getCookieValue("departamento");

                if (depmostrar == '2') {
                    depmostrar = 'Administración';
                }
                if (depmostrar == '3') {
                    depmostrar = 'Presentación de demandas';
                }
                if (depmostrar == '4') {
                    depmostrar = 'Control de escritos';
                }
                if (depmostrar == '5') {
                    depmostrar = 'Notificaciones';
                }

                document.querySelector(".depmostrar").innerHTML = `<span class="depmostrar">El usuario que ha elegido es el responsable del departamento de Presentación de demandas.</span><br>
                <span>Debe elegir un nuevo responable para el departamento:</span><br><br>`;

            });
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
                <h4>Solicitud de baja:</h4>
                <form method="post" action="../Controlador/C_baja.php">
                    <span>Indique el usuario</span><br>
                    <select name="codusu">
                        <option value="" disabled selected></option>
                        <?php
                        require('../Controlador/C_getOrganigrama.php');

                        if ($_SESSION["perfil"] == 1) {
                            foreach ($usuAll as $usu) {
                                echo "<option class='user' value=" . $usu['CodUsu'] . " data-perfil=" . $usu['codper'] . " data-departamento=" . $usu['departamento'] . ">" . $usu['nombre'] . "</option>";
                            }
                        }
                        if ($_SESSION["departamento"] == 2) {
                            foreach ($usuAd as $usu) {
                                echo "<option value=" . $usu['CodUsu'] . ">" . $usu['nombre'] . "</option>";
                            }
                        }
                        if ($_SESSION["departamento"] == 3) {
                            foreach ($usuDe as $usu) {
                                echo "<option value=" . $usu['correo'] . ">" . $usu['nombre'] . "</option>";
                            }
                        }

                        if ($_SESSION["departamento"] == 4) {
                            foreach ($usuEs as $usu) {
                                echo "<option value=" . $usu['correo'] . ">" . $usu['nombre'] . "</option>";
                            }
                        }

                        if ($_SESSION["departamento"] == 5) {
                            foreach ($usuNo as $usu) {
                                echo "<option value=" . $usu['correo'] . ">" . $usu['nombre'] . "</option>";
                            }
                        }
                        ?>
                    </select><br><br>
                    <span class="hiddenresp depmostrar"></span>
                    <select class="hiddenresp" name="reemplazo">
                        <option value="" disabled selected></option>
                        <?php
                        if ($_COOKIE["departamento"] == 2) {
                            foreach ($usuAd as $usu) {
                                echo "<option value=" . $usu['CodUsu'] . ">" . $usu['nombre'] . "</option>";
                            }
                        }
                        if ($_COOKIE["departamento"] == 3) {
                            foreach ($usuDe as $usu) {
                                echo "<option value=" . $usu['CodUsu'] . ">" . $usu['nombre'] . "</option>";
                            }
                        }

                        if ($_COOKIE["departamento"] == 4) {
                            foreach ($usuEs as $usu) {
                                echo "<option value=" . $usu['CodUsu'] . ">" . $usu['nombre'] . "</option>";
                            }
                        }

                        if ($_COOKIE["departamento"] == 5) {
                            foreach ($usuNo as $usu) {
                                echo "<option value=" . $usu['CodUsu'] . ">" . $usu['nombre'] . "</option>";
                            }
                        }
                        ?>
                    </select><br><br>
                    <span>¿Qué hay que hacer con la cuenta de correo del usuario?</span><br><br>
                    <input type="radio" name="ccorreo" value="eliminar" id="eliminar" onclick="radio('eliminar')" checked /><span> Eliminar cuenta</span><br>
                    <input type="radio" name="ccorreo" value="redirigir" id="redirigir" onclick="radio('redirigir')" /><span> Redirigir cuenta</span><span class="hidden redir"> hacia la cuenta de correo de </span><select name="redir" class="hidden redir">
                        <option value="" disabled selected></option>
                        <?php
                        if ($_SESSION["perfil"] == 1) {
                            foreach ($usuAll as $usu) {
                                echo "<option value=" . $usu['correo'] . ">" . $usu['nombre'] . "</option>";
                            }
                        }
                        if ($_SESSION["departamento"] == 2) {
                            foreach ($usuAd as $usu) {
                                echo "<option value=" . $usu['correo'] . ">" . $usu['nombre'] . "</option>";
                            }
                        }
                        if ($_SESSION["departamento"] == 3) {
                            foreach ($usuDe as $usu) {
                                echo "<option value=" . $usu['correo'] . ">" . $usu['nombre'] . "</option>";
                            }
                        }

                        if ($_SESSION["departamento"] == 4) {
                            foreach ($usuEs as $usu) {
                                echo "<option value=" . $usu['correo'] . ">" . $usu['nombre'] . "</option>";
                            }
                        }

                        if ($_SESSION["departamento"] == 5) {
                            foreach ($usuNo as $usu) {
                                echo "<option value=" . $usu['correo'] . ">" . $usu['nombre'] . "</option>";
                            }
                        }
                        ?>
                    </select><br>
                    <input type="radio" name="ccorreo" value="alias" id="calias" onclick="radio('calias')" /><span> Crear alias</span><span class="hidden ali"> de este correo en la cuenta de correo de </span><select name="ali" class="hidden ali">
                        <option value="" disabled selected></option>
                        <?php
                        if ($_SESSION["perfil"] == 1) {
                            foreach ($usuAll as $usu) {
                                echo "<option value=" . $usu['correo'] . ">" . $usu['nombre'] . "</option>";
                            }
                        }
                        if ($_SESSION["departamento"] == 2) {
                            foreach ($usuAd as $usu) {
                                echo "<option value=" . $usu['correo'] . ">" . $usu['nombre'] . "</option>";
                            }
                        }
                        ?>
                    </select><br><br>
                    <span>¿Qué desea hacer con la carpeta de ficheros del usuario?</span><br><br>
                    <input type="radio" name="carpeta" value="eliminar" id="eliminar" onclick="radiod('eliminar')" checked /><span> Eliminar carpeta del usuario</span><br>
                    <input type="radio" name="carpeta" value="mantener" id="mantener" onclick="radiod('mantener')" /><span> Mantener carpeta del usuario</span><br><br>
                    <input type="submit" value="Enviar" />
                </form>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>