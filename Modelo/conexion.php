<?php

class Conexion
{

    private $conexion;

    public function __construct()
    {
        $this->conexion = new mysqli('localhost', 'root', '', 'bbdd');
    }

    public function getDireccion()
    {

        $query = $this->conexion->query('SELECT departamento.descripcion as "dep", CONCAT(usuario.Nombre," ",usuario.Ap1," ",COALESCE(usuario.Ap2," ")) as "nombre" FROM usuario INNER JOIN departamento ON departamento.CodDep=usuario.CodDep INNER JOIN perfil ON perfil.CodPer=usuario.CodPer WHERE Departamento.CodDep = 6 AND activo = 1');

        $dire = [];

        $i = 0;

        while ($fila = $query->fetch_assoc()) {
            $dire[$i] = $fila;
            $i++;
        }

        return $dire;
    }

    public function getResponsable()
    {

        $query = $this->conexion->query('SELECT departamento.descripcion as "dep", perfil.descripcion as "per", CONCAT(usuario.Nombre," ",usuario.Ap1," ",COALESCE(usuario.Ap2," ")) as "nombre" FROM usuario INNER JOIN departamento ON departamento.CodDep=usuario.CodDep INNER JOIN perfil ON perfil.CodPer=usuario.CodPer WHERE usuario.CodDep = 1 AND activo = 1 UNION SELECT departamento.descripcion as "dep", perfil.descripcion as "per", CONCAT(usuario.Nombre," ",usuario.Ap1," ",COALESCE(usuario.Ap2," ")) as "nombre" FROM usuario INNER JOIN departamento ON departamento.CodDep=usuario.CodDep INNER JOIN perfil ON perfil.CodPer=usuario.CodPer WHERE Perfil.CodPer = 2 AND activo = 1 ');

        $res = [];

        $i = 0;

        while ($fila = $query->fetch_assoc()) {
            $res[$i] = $fila;
            $i++;
        }

        return $res;
    }

    public function getUsuAdmin()
    {

        $query = $this->conexion->query('SELECT CONCAT(usuario.Nombre," ",usuario.Ap1," ",COALESCE(usuario.Ap2," ")) as "nombre", CodUsu, correo FROM usuario INNER JOIN departamento ON departamento.CodDep=usuario.CodDep WHERE Departamento.CodDep = 2 AND Usuario.CodPer = 3 AND activo = 1 AND contrato = "T"');

        $usuAd = [];

        $i = 0;

        while ($fila = $query->fetch_assoc()) {
            $usuAd[$i] = $fila;
            $i++;
        }

        return $usuAd;
    }

    public function getUsuDemandas()
    {

        $query = $this->conexion->query('SELECT CONCAT(usuario.Nombre," ",usuario.Ap1," ",COALESCE(usuario.Ap2," ")) as "nombre", CodUsu, correo FROM usuario INNER JOIN departamento ON departamento.CodDep=usuario.CodDep WHERE Departamento.CodDep = 3 AND Usuario.CodPer = 3 AND activo = 1 AND contrato = "T"');

        $usuDe = [];

        $i = 0;

        while ($fila = $query->fetch_assoc()) {
            $usuDe[$i] = $fila;
            $i++;
        }

        return $usuDe;
    }

    public function getUsuEscritos()
    {

        $query = $this->conexion->query('SELECT CONCAT(usuario.Nombre," ",usuario.Ap1," ",COALESCE(usuario.Ap2," ")) as "nombre", CodUsu, correo FROM usuario INNER JOIN departamento ON departamento.CodDep=usuario.CodDep WHERE Departamento.CodDep = 4 AND Usuario.CodPer = 3 AND activo = 1 AND contrato = "T"');

        $usuEs = [];

        $i = 0;

        while ($fila = $query->fetch_assoc()) {
            $usuEs[$i] = $fila;
            $i++;
        }

        return $usuEs;
    }

    public function getUsuNotis()
    {

        $query = $this->conexion->query('SELECT CONCAT(usuario.Nombre," ",usuario.Ap1," ",COALESCE(usuario.Ap2," ")) as "nombre", CodUsu, correo FROM usuario INNER JOIN departamento ON departamento.CodDep=usuario.CodDep WHERE Departamento.CodDep = 5 AND Usuario.CodPer = 3 AND activo = 1 AND contrato = "T"');

        $usuNo = [];

        $i = 0;

        while ($fila = $query->fetch_assoc()) {
            $usuNo[$i] = $fila;
            $i++;
        }

        return $usuNo;
    }

    public function getUsuAll()
    {

        $query = $this->conexion->query('SELECT CONCAT(usuario.Nombre," ",usuario.Ap1," ",COALESCE(usuario.Ap2," ")) as "nombre", CodUsu, correo, codper, coddep as "departamento" FROM usuario WHERE Usuario.CodPer IN (2,3) AND activo = 1 AND usuario.CodUsu != 19');

        $usuAll = [];

        $i = 0;

        while ($fila = $query->fetch_assoc()) {
            $usuAll[$i] = $fila;
            $i++;
        }

        return $usuAll;
    }

    public function getUsuPT()
    {

        $query = $this->conexion->query('SELECT * FROM v_inventario');

        $usuNo = [];

        $i = 0;

        while ($fila = $query->fetch_assoc()) {
            $usuNo[$i] = $fila;
            $i++;
        }

        return $usuNo;
    }

    public function getDepPT()
    {

        $query = $this->conexion->query('SELECT CONCAT(usuario.Nombre," ",usuario.Ap1," ",COALESCE(usuario.Ap2," ")) as "Nombre",departamento.Descripcion as "departamento", puestotrabajo.CodPT as "PT",departamento.CodDep as "CodDep" FROM usuario INNER JOIN departamento ON usuario.CodDep=departamento.CodDep INNER JOIN puestotrabajo ON usuario.CodUsu = puestotrabajo.CodUsu WHERE activo = 1 ORDER BY CodPT ASC');

        $depPT = [];

        $i = 0;

        while ($fila = $query->fetch_assoc()) {
            $depPT[$i] = $fila;
            $i++;
        }

        return $depPT;
    }

    public function getPTnum()
    {

        $query = $this->conexion->query('SELECT * FROM v_inventario');

        $usuNo = [];

        $i = 0;

        while ($fila = $query->fetch_assoc()) {
            $usuNo[$i] = $fila;
            $i++;
        }

        return $usuNo;
    }

    public function getPTinfo()
    {

        $pt = $_COOKIE['pt'];

        $query = $this->conexion->query("SELECT nombre, departamento, correo, extension, equipo, monitor FROM v_inventario WHERE pt = '$pt' AND activo = 1");

        $i = 0;

        while ($fila = $query->fetch_assoc()) {
            $PTinfo[$i] = $fila;
            $i++;
        }

        return $PTinfo;
    }
    public function getCDenuncia($mensaje)
    {
        require '../PHPMailer/src/Exception.php';
        require '../PHPMailer/src/PHPMailer.php';
        require '../PHPMailer/src/SMTP.php';

        $mensaje = $_POST['mensaje'];

        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->IsHTML(true);
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'procuradoresmaraver@gmail.com';
        $mail->Password = 'vtnh amxe qwgy stcn';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('procuradoresmaraver@gmail.com', 'Procuradores Maraver');
        $mail->addAddress('procuradoresmaraver@gmail.com', 'Procuradores Maraver');
        $mail->Subject = 'Denuncia';
        $mail->Body = '<html>
                        <body>
                            <p>Se ha recibido una denuncia anónima con el siguiente mensaje: </p><br>
                            <blockquote><em>' . $mensaje . '</em></blockquote>
                            <br><br>
                            <em style="font-size:1.5em">Tu aliado legal, servicio sin par.</em><br><br>
                            <img style="width:400px; height:100px" src="https://circumnavigable-ref.000webhostapp.com/logo.png"/>
                        </body>
                      </html>';

        if (!$mail->send()) {
            echo 'El mensaje no se ha podido enviar.';
            echo 'Error de PHPMailer: ' . $mail->ErrorInfo;
        } else {
            echo '<script>
                alert("Su mensaje ha sido enviado con éxito.");
                window.location = "../Vistas/V_denuncias.php";
            </script>';
        }
    }

    public function login()
    {

        session_start();

        $login = $_POST['login'];
        $password = $_POST['password'];

        $query = $this->conexion->query("SELECT * FROM usuario WHERE upper(correo) = upper('$login') AND Password = '$password'");

        if (mysqli_num_rows($query) > 0) {

            $consulta = $this->conexion->query("SELECT CodUsu, Nombre, CodPer, CodDep FROM usuario WHERE upper(correo) = upper('$login') AND activo = 1");

            while ($row = $consulta->fetch_array()) {   //$_SESSION['usuario'] siempre será el nombre de usuario
                $_SESSION['usuario'] = $row[0];
                $_SESSION['perfil'] = $row[2];
                $_SESSION['departamento'] = $row[3];
                setcookie("nombre", $row[1], time() + 3600, "/");
            }

            echo '
            <script>
                alert("Sesion iniciada con éxito.");
                window.location = "../Vistas/V_index.php";
            </script>
            ';
        } else {
            echo '
                <script>
                    alert("El correo o usuario no coinciden con la contraseña.");
                    window.location = "../Vistas/V_login.php";
                </script>
                ';
        }
    }

    public function cerrarSesion()
    {
        session_start();
        session_destroy();
        unset($_SESSION['codper']);
        setcookie("nombre", "", time() - 1, "/");
        echo '
        <script>
            alert("Sesión cerrada con éxito.");
            window.location = "../Vistas/V_index.php";
        </script>
        ';
    }

    public function getBajaBBDD($codusu)
    {
        $fbaja = date('Y-m-d');

        $this->conexion->query("UPDATE usuario SET fbaja = '" . $fbaja . "' WHERE CodUsu = '". $codusu ."'");

        $this->conexion->query('UPDATE usuario SET activo = 0 WHERE usuario.codusu = ' . $codusu . '');

        $consulta = $this->conexion->query('SELECT CodPT FROM puestotrabajo WHERE puestotrabajo.CodUsu = ' . $codusu . '');

        while ($row = $consulta->fetch_array()) {
            $codpt = $row[0];
        }

        $this->conexion->query('UPDATE puestotrabajo SET CodUsu = 19 WHERE puestotrabajo.CodPt = ' . $codpt . '');

        if (isset($_POST['reemplazo'])) {
            $reemplazo = $_POST['reemplazo'];
            $this->conexion->query('UPDATE usuario SET usuario.CodPer = 2 WHERE usuario.CodUsu = ' . $reemplazo . '');
        }
    }

    //CORREO BAJA SIN CUENTA CORREO DESTINO INFORMÁTICA
    public function getCBajaInformatica($codusu)
    {
        require '../PHPMailer/src/Exception.php';
        require '../PHPMailer/src/PHPMailer.php';
        require '../PHPMailer/src/SMTP.php';

        $consulta = $this->conexion->query('SELECT CodUsu, CONCAT(usuario.Nombre," ",usuario.Ap1," ",COALESCE(usuario.Ap2," ")) as "Nombre", usuario.correo, departamento.descripcion FROM usuario INNER JOIN departamento ON usuario.coddep = departamento.coddep WHERE usuario.codusu = ' . $codusu . '');

        while ($row = $consulta->fetch_array()) {
            $nombre = $row[1];
            $departamento = $row[3];
        }

        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->IsHTML(true);
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'procuradoresmaraver@gmail.com';
        $mail->Password = 'vtnh amxe qwgy stcn';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('procuradoresmaraver@gmail.com', 'Procuradores Maraver');
        $mail->addAddress('procuradoresmaraver@gmail.com', 'Procuradores Maraver');
        $mail->Subject = 'Baja - Informatica';
        $mail->Body = '<html>
                        <body>
                        <span>Estimado compañero,</span><br>
                        <span>Se ha dado de baja al usuario ' . $nombre . ' del departamento ' . $departamento . '.<br><br>
                        <span>Se han de realizar las siguientes acciones:<br><br>
                        <span>- Dar de baja del sistema de control horario<br>
                        <span>- Quitar los permisos a su ficha del programa de procuradores<br><br>
                        <span>Gracias, un saludo.<br><br>
                        <em style="font-size:1.5em">Tu aliado legal, servicio sin par.</em><br><br>
                        <img style="width:400px; height:100px" src="https://circumnavigable-ref.000webhostapp.com/logo.png"/>
                        </body>
                      </html>';

        $mail->Send();
    }
    //CORREO BAJA SIN CUENTA CORREO DESTINO SERVICIO EXTERIOR
    public function getCBajaExt($codusu, $destino, $carpeta)
    {
        $consulta = $this->conexion->query('SELECT CodUsu, CONCAT(usuario.Nombre," ",usuario.Ap1," ",COALESCE(usuario.Ap2," ")) as "Nombre", usuario.correo, departamento.descripcion FROM usuario INNER JOIN departamento ON usuario.coddep = departamento.coddep WHERE usuario.codusu = ' . $codusu . '');

        while ($row = $consulta->fetch_array()) {
            $nombre = $row[1];
            $correo = $row[2];
        }

        if ($_POST['correo'] == 'eliminar') {
        }

        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->IsHTML(true);
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'procuradoresmaraver@gmail.com';
        $mail->Password = 'vtnh amxe qwgy stcn';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('procuradoresmaraver@gmail.com', 'Procuradores Maraver');
        $mail->addAddress('procuradoresmaraver@gmail.com', 'Procuradores Maraver');
        $mail->Subject = 'Baja - Servicio externo';


        $mail->Body = '<html>
                        <body>
                        <span>Estimado compañero,</span><br>
                        <span>Se ha dado de baja al usuario ' . $nombre . ' cuya cuenta de correo asociada es ' . $correo . '.<br><br>
                        <span>Se han de realizar las siguientes acciones:<br><br>
                        ' . $destino . '
                        <span>- Se ha de liberar la licencia Office asociada a su cuenta</span><br>
                        <span>- Se ha de ' . $carpeta . ' su carpeta de usuario</span><br><br>
                        <span>Gracias, un saludo.<br><br>
                        <em style="font-size:1.5em">Tu aliado legal, servicio sin par.</em><br><br>
                        <img style="width:400px; height:100px" src="https://circumnavigable-ref.000webhostapp.com/logo.png"/>
                        </body>
                    </html>';

        if (!$mail->send()) {
            echo 'El mensaje no se ha podido enviar.';
            echo 'Error de PHPMailer: ' . $mail->ErrorInfo;
        } else {
            echo '<script>
                alert("Su mensaje ha sido enviado con éxito.");
                window.location = "../Vistas/V_baja.php";
            </script>';
        }
    }

    public function getInventario()
    {
        $query = $this->conexion->query('SELECT tipo.descripcion as "tipo", marca.descripcion as "marca", modelo.descripcion as "modelo", inventario.numeroserie, inventario.falta, inventario.fbaja, inventario.activo, inventario.codinv FROM tipo INNER JOIN inventario ON tipo.codtip = inventario.codtip INNER JOIN modelo ON inventario.codmod = modelo.codmod INNER JOIN marca ON modelo.codmar = marca.codmar');

        $inventario = [];

        $i = 0;

        while ($fila = $query->fetch_assoc()) {
            $inventario[$i] = $fila;
            $i++;
        }

        return $inventario;
    }

    public function getInstalacion($anydesk, $pass)
    {
        require '../PHPMailer/src/Exception.php';
        require '../PHPMailer/src/PHPMailer.php';
        require '../PHPMailer/src/SMTP.php';

        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->IsHTML(true);
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'procuradoresmaraver@gmail.com';
        $mail->Password = 'vtnh amxe qwgy stcn';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('procuradoresmaraver@gmail.com', 'Procuradores Maraver');
        $mail->addAddress('procuradoresmaraver@gmail.com', 'Procuradores Maraver');
        $mail->addAttachment('../doc/informatica/Manual de instalaciones.docx');
        $mail->Subject = 'Instalacion - Servicio externo';


        $mail->Body = '<html>
                        <body>
                        <span>Estimado compañero,</span><br>
                        <span>Se ha dado de configurar un nuevo equipo. Rogamos sigan las instrucciones descritas en el manual adjunto.</span><br><br>
                        <span>Se ha configurado el acceso remoto de Anydesk con los siguientes datos: <br><br> 
                        <span>- Dirección Anydesk: ' . $anydesk . '</span><br>
                        <span>- Password: ' . $pass . ' <br><br>
                        <span>Gracias, un saludo.<br><br>
                        <em style="font-size:1.5em">Tu aliado legal, servicio sin par.</em><br><br>
                        <img style="width:400px; height:100px" src="https://circumnavigable-ref.000webhostapp.com/logo.png"/>
                        </body>
                    </html>';

        if (!$mail->send()) {
            echo 'El mensaje no se ha podido enviar.';
            echo 'Error de PHPMailer: ' . $mail->ErrorInfo;
        } else {
            echo '<script>
                alert("Su mensaje ha sido enviado con éxito.");
                window.location = "../Vistas/V_instalacion.php";
            </script>';
        }
    }

    public function getDepartamento()
    {

        $query = $this->conexion->query('SELECT departamento.CodDep, departamento.Descripcion as "departamento" FROM departamento WHERE coddep IN (2,3,4,5)');

        $departamento = [];

        $i = 0;

        while ($fila = $query->fetch_assoc()) {
            $departamento[$i] = $fila;
            $i++;
        }

        return $departamento;
    }

    public function getPTlibres()
    {

        $query = $this->conexion->query('SELECT puestotrabajo.CodPT FROM puestotrabajo WHERE puestotrabajo.CodUsu = 19');

        $ptlibres = [];

        $i = 0;

        while ($fila = $query->fetch_assoc()) {
            $ptlibres[$i] = $fila;
            $i++;
        }

        return $ptlibres;
    }

    function quitar_acentos($string)
    {
        $string = str_replace(
            array('Á', 'É', 'Í', 'Ó', 'Ú', 'á', 'é', 'í', 'ó', 'ú'),
            array('A', 'E', 'I', 'O', 'U', 'a', 'e', 'i', 'o', 'u'),
            $string
        );
        return $string;
    }

    public function getEmailLibre($nombre, $ap1)
    {
        $query = $this->conexion->query('SELECT usuario.correo FROM usuario');
        $emails = [];
        while ($fila = $query->fetch_assoc()) {
            $emails[] = $fila['correo'];
        }
        $nombre = strtolower($nombre);
        $ap1 = strtolower($ap1);
        $emailGenerado = $this->quitar_acentos($nombre[0]) . $this->quitar_acentos($ap1) . "@gmail.com";
        if (in_array($emailGenerado, $emails)) {
            $emailGenerado = $this->quitar_acentos($nombre[0] . $nombre[1]) . $this->quitar_acentos($ap1) . "@gmail.com";
        }
        return $emailGenerado;
    }

    public function getAltaBBDD()
    {
        $nombre = $_POST['nombre'];
        $dni = $_POST['dni'];
        $ap1 = $_POST['ap1'];
        $ap2 = $_POST['ap2'];
        $telefono = $_POST['telefono'];
        $contrato = $_POST['contrato'];
        $modalidad = $_POST['modalidad'];
        $departamento = $_POST['departamento'];

        if ($modalidad == 'presencial') {
            $modalidad = 'P';
        } else {
            $modalidad = 'R';
        }

        if ($contrato == 'becario') {
            $contrato = 'B';
        } else {
            $contrato = 'T';
        }

        $falta = date('Y-m-d');

        $email = $this->getEmailLibre($nombre, $ap1);

        $resultado = $this->conexion->query('SELECT MAX(codusu) AS maximo FROM usuario');
        $fila = $resultado->fetch_assoc();
        $codusu = $fila['maximo'] + 1;

        if (isset($_POST['ptlibre'])) {
            $ptlibre = $_POST['ptlibre'];
            $this->conexion->query('UPDATE puestotrabajo SET codusu = ' . $codusu . ' WHERE codpt = ' . $ptlibre . '');
        }

        $this->conexion->query("INSERT INTO usuario (CodUsu, DNI, Nombre, Ap1, Ap2, Correo, Password, Extension, CodPer, CodDep, activo, modalidad, contrato, falta, fbaja) VALUES ('" . $codusu . "', '" . $dni . "', '" . $nombre . "', '" . $ap1 . "', '" . $ap2 . "', '" . $email . "', NULL, NULL, 3, '" . $departamento . "', 1, '" . $modalidad . "','" . $contrato . "','" . $falta . "',NULL)");

        if ($contrato == 'B' && $modalidad == 'P') {
            $this->getCAltaBPInformatica($nombre, $ap1, $ap2, $departamento);
            $this->getCAltaBPSext($nombre, $ap1, $ap2);
        }

        if ($contrato == 'B' && $modalidad == 'R') {
            $this->getCAltaBRInformatica($nombre, $ap1, $ap2, $departamento);
            $this->getCAltaBRSext($nombre, $ap1, $ap2, $telefono);
        }

        if ($contrato == 'T' && $modalidad == 'P') {
            $this->getCAltaTPAdministracion($nombre, $ap1, $ap2, $departamento);
            $this->getCAltaTPInformatica($nombre, $ap1, $ap2, $departamento);
            $this->getCAltaTPSext($nombre, $ap1, $ap2, $email);
        }

        if ($contrato == 'T' && $modalidad == 'R') {
            $this->getCAltaTRAdministracion($nombre, $ap1, $ap2, $departamento);
            $this->getCAltaTRInformatica($nombre, $ap1, $ap2, $departamento);
            $this->getCAltaTRSext($nombre, $ap1, $ap2, $email, $telefono);
        }
    }

    public function getDepartamentoCod($departamentocod)
    {
        $query = $this->conexion->query('SELECT departamento.Descripcion as "departamento" FROM departamento WHERE coddep = ' . $departamentocod . '');

        $departamento = $query->fetch_assoc();
        return $departamento['departamento'];
    }

    //CORREO ALTA BECARIO PRESENCIAL DESTINO INFORMÁTICA
    public function getCAltaBPInformatica($nombre, $ap1, $ap2, $departamentocod)
    {
        $departamento = $this->getDepartamentoCod($departamentocod);

        require '../PHPMailer/src/Exception.php';
        require '../PHPMailer/src/PHPMailer.php';
        require '../PHPMailer/src/SMTP.php';

        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->IsHTML(true);
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'procuradoresmaraver@gmail.com';
        $mail->Password = 'vtnh amxe qwgy stcn';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('procuradoresmaraver@gmail.com', 'Procuradores Maraver');
        $mail->addAddress('procuradoresmaraver@gmail.com', 'Procuradores Maraver');
        $mail->Subject = 'Alta becario presencial - Informatica';
        $mail->Body = '<html>
                        <body>
                        <span>Estimado compañero,</span><br>
                        <span>Se ha dado de alta al becario ' . $nombre . ' ' . $ap1 . ' ' . $ap2 . ' en el departamento de ' . $departamento . '.<br><br>
                        <span>Se han de realizar las siguientes acciones:<br><br>
                        <span>- Dar de alta en el programa de procuradores asignandole los permisos correspondientes<br><br>
                        <span>Gracias, un saludo.<br><br>
                        <em style="font-size:1.5em">Tu aliado legal, servicio sin par.</em><br><br>
                        <img style="width:400px; height:100px" src="https://circumnavigable-ref.000webhostapp.com/logo.png"/>
                        </body>
                      </html>';

        $mail->Send();
    }

    //CORREO ALTA BECARIO PRESENCIAL DESTINO SERVICIO EXTERIOR
    public function getCAltaBPSext($nombre, $ap1, $ap2)
    {
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->IsHTML(true);
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'procuradoresmaraver@gmail.com';
        $mail->Password = 'vtnh amxe qwgy stcn';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('procuradoresmaraver@gmail.com', 'Procuradores Maraver');
        $mail->addAddress('procuradoresmaraver@gmail.com', 'Procuradores Maraver');
        $mail->Subject = 'Alta becario presencial - Servicio externo';


        $mail->Body = '<html>
                        <body>
                        <span>Estimado compañero,</span><br>
                        <span>Se ha dado de alta al becario ' . $nombre . ' ' . $ap1 . ' ' . $ap2 . '.<br><br>
                        <span>Se han de realizar las siguientes acciones:<br><br>
                        <span>- Dar de alta el usuario en el sistema</span><br>
                        <span>- Se ha de crear una carpeta de usuario en el servidor</span><br><br>
                        <span>Gracias, un saludo.<br><br>
                        <em style="font-size:1.5em">Tu aliado legal, servicio sin par.</em><br><br>
                        <img style="width:400px; height:100px" src="https://circumnavigable-ref.000webhostapp.com/logo.png"/>
                        </body>
                    </html>';

        if (!$mail->send()) {
            echo 'El mensaje no se ha podido enviar.';
            echo 'Error de PHPMailer: ' . $mail->ErrorInfo;
        } else {
            echo '<script>
                alert("Su mensaje ha sido enviado con éxito.");
                window.location = "../Vistas/V_alta.php";
            </script>';
        }
    }

    //CORREO ALTA BECARIO REMOTO DESTINO INFORMÁTICA
    public function getCAltaBRInformatica($nombre, $ap1, $ap2, $departamentocod)
    {
        $departamento = $this->getDepartamentoCod($departamentocod);

        require '../PHPMailer/src/Exception.php';
        require '../PHPMailer/src/PHPMailer.php';
        require '../PHPMailer/src/SMTP.php';

        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->IsHTML(true);
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'procuradoresmaraver@gmail.com';
        $mail->Password = 'vtnh amxe qwgy stcn';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('procuradoresmaraver@gmail.com', 'Procuradores Maraver');
        $mail->addAddress('procuradoresmaraver@gmail.com', 'Procuradores Maraver');
        $mail->Subject = 'Alta becario remoto - Informatica';
        $mail->Body = '<html>
                            <body>
                            <span>Estimado compañero,</span><br>
                            <span>Se ha dado de alta al becario ' . $nombre . ' ' . $ap1 . ' ' . $ap2 . ' en el departamento de ' . $departamento . '.<br><br>
                            <span>Se han de realizar las siguientes acciones:<br><br>
                            <span>- Dar de alta en el programa de procuradores asignandole los permisos correspondientes<br><br>
                            <span>Gracias, un saludo.<br><br>
                            <em style="font-size:1.5em">Tu aliado legal, servicio sin par.</em><br><br>
                            <img style="width:400px; height:100px" src="https://circumnavigable-ref.000webhostapp.com/logo.png"/>
                            </body>
                          </html>';

        $mail->Send();
    }

    //CORREO ALTA BECARIO REMOTO DESTINO SERVICIO EXTERIOR
    public function getCAltaBRSext($nombre, $ap1, $ap2, $telefono)
    {
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->IsHTML(true);
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'procuradoresmaraver@gmail.com';
        $mail->Password = 'vtnh amxe qwgy stcn';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('procuradoresmaraver@gmail.com', 'Procuradores Maraver');
        $mail->addAddress('procuradoresmaraver@gmail.com', 'Procuradores Maraver');
        $mail->Subject = 'Alta becario remoto - Servicio externo';


        $mail->Body = '<html>
                            <body>
                            <span>Estimado compañero,</span><br>
                            <span>Se ha dado de alta al becario ' . $nombre . ' ' . $ap1 . ' ' . $ap2 . '.<br><br>
                            <span>Se han de realizar las siguientes acciones:<br><br>
                            <span>- Dar de alta el usuario en el sistema</span><br>
                            <span>- Configurar la conexión remota en su equipo. Su teléfono es ' . $telefono . '</span><br>
                            <span>- Se ha de crear una carpeta de usuario en el servidor</span><br><br>
                            <span>Gracias, un saludo.<br><br>
                            <em style="font-size:1.5em">Tu aliado legal, servicio sin par.</em><br><br>
                            <img style="width:400px; height:100px" src="https://circumnavigable-ref.000webhostapp.com/logo.png"/>
                            </body>
                        </html>';

        if (!$mail->send()) {
            echo 'El mensaje no se ha podido enviar.';
            echo 'Error de PHPMailer: ' . $mail->ErrorInfo;
        } else {
            echo '<script>
                    alert("Su mensaje ha sido enviado con éxito.");
                    window.location = "../Vistas/V_alta.php";
                </script>';
        }
    }

    //CORREO ALTA TRABAJADOR PRESENCIAL DESTINO ADMINISTRACIÓN
    public function getCAltaTPAdministracion($nombre, $ap1, $ap2, $departamentocod)
    {
        $departamento = $this->getDepartamentoCod($departamentocod);

        require '../PHPMailer/src/Exception.php';
        require '../PHPMailer/src/PHPMailer.php';
        require '../PHPMailer/src/SMTP.php';

        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->IsHTML(true);
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'procuradoresmaraver@gmail.com';
        $mail->Password = 'vtnh amxe qwgy stcn';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('procuradoresmaraver@gmail.com', 'Procuradores Maraver');
        $mail->addAddress('procuradoresmaraver@gmail.com', 'Procuradores Maraver');
        $mail->Subject = 'Alta trabajador presencial - Administracion';
        $mail->Body = '<html>
                            <body>
                            <span>Estimado compañero,</span><br>
                            <span>Se ha dado de alta al trabajador ' . $nombre . ' ' . $ap1 . ' ' . $ap2 . ' en el departamento de ' . $departamento . '.<br><br>
                            <span>Se han de realizar las siguientes acciones:<br><br>
                            <span>- Dar de alta en el programa de procuradores con los respectivos datos bancarios<br><br>
                            <span>Rogamos contacte con informática tras realizar el alta para continuar con el proceso.<br><br>
                            <span>Gracias, un saludo.<br><br>
                            <em style="font-size:1.5em">Tu aliado legal, servicio sin par.</em><br><br>
                            <img style="width:400px; height:100px" src="https://circumnavigable-ref.000webhostapp.com/logo.png"/>
                            </body>
                          </html>';

        $mail->Send();
    }

    //CORREO ALTA TRABAJADOR PRESENCIAL DESTINO INFORMÁTICA
    public function getCAltaTPInformatica($nombre, $ap1, $ap2, $departamentocod)
    {
        $departamento = $this->getDepartamentoCod($departamentocod);

        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->IsHTML(true);
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'procuradoresmaraver@gmail.com';
        $mail->Password = 'vtnh amxe qwgy stcn';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('procuradoresmaraver@gmail.com', 'Procuradores Maraver');
        $mail->addAddress('procuradoresmaraver@gmail.com', 'Procuradores Maraver');
        $mail->Subject = 'Alta trabajador presencial - Informatica';
        $mail->Body = '<html>
                                <body>
                                <span>Estimado compañero,</span><br>
                                <span>Se ha dado de alta al trabajador ' . $nombre . ' ' . $ap1 . ' ' . $ap2 . ' en el departamento de ' . $departamento . '.<br><br>
                                <span>Se han de realizar las siguientes acciones:<br><br>
                                <span>- Dar de alta en el sistema de control horario<br>
                                <span>- Asignar permisos a la ficha en el programa de procuradores, previa alta por departamento de Administración<br><br>
                                <span>Gracias, un saludo.<br><br>
                                <em style="font-size:1.5em">Tu aliado legal, servicio sin par.</em><br><br>
                                <img style="width:400px; height:100px" src="https://circumnavigable-ref.000webhostapp.com/logo.png"/>
                                </body>
                              </html>';

        $mail->Send();
    }

    //CORREO ALTA TRABAJADOR PRESENCIAL DESTINO SERVICIO EXTERIOR
    public function getCAltaTPSext($nombre, $ap1, $ap2, $email)
    {
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->IsHTML(true);
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'procuradoresmaraver@gmail.com';
        $mail->Password = 'vtnh amxe qwgy stcn';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('procuradoresmaraver@gmail.com', 'Procuradores Maraver');
        $mail->addAddress('procuradoresmaraver@gmail.com', 'Procuradores Maraver');
        $mail->Subject = 'Alta trabajador presencial - Servicio externo';


        $mail->Body = '<html>
                            <body>
                            <span>Estimado compañero,</span><br>
                            <span>Se ha dado de alta al trabajador ' . $nombre . ' ' . $ap1 . ' ' . $ap2 . '.<br><br>
                            <span>Se han de realizar las siguientes acciones:<br><br>
                            <span>- Dar de alta el usuario en el sistema</span><br>
                            <span>- Creación de cuenta de correo ' . $email . ' y asignación de licencia Office</span><br>
                            <span>- Se ha de crear una carpeta de usuario en el servidor</span><br><br>
                            <span>Rogamos una vez creada la cuenta de correo envíe la contraseña al departamento de informática.</span><br><br>
                            <span>Gracias, un saludo.<br><br>
                            <em style="font-size:1.5em">Tu aliado legal, servicio sin par.</em><br><br>
                            <img style="width:400px; height:100px" src="https://circumnavigable-ref.000webhostapp.com/logo.png"/>
                            </body>
                        </html>';

        if (!$mail->send()) {
            echo 'El mensaje no se ha podido enviar.';
            echo 'Error de PHPMailer: ' . $mail->ErrorInfo;
        } else {
            echo '<script>
                    alert("Su mensaje ha sido enviado con éxito.");
                    window.location = "../Vistas/V_alta.php";
                </script>';
        }
    }

    //CORREO ALTA TRABAJADOR REMOTO DESTINO ADMINISTRACIÓN
    public function getCAltaTRAdministracion($nombre, $ap1, $ap2, $departamentocod)
    {
        $departamento = $this->getDepartamentoCod($departamentocod);

        require '../PHPMailer/src/Exception.php';
        require '../PHPMailer/src/PHPMailer.php';
        require '../PHPMailer/src/SMTP.php';

        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->IsHTML(true);
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'procuradoresmaraver@gmail.com';
        $mail->Password = 'vtnh amxe qwgy stcn';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('procuradoresmaraver@gmail.com', 'Procuradores Maraver');
        $mail->addAddress('procuradoresmaraver@gmail.com', 'Procuradores Maraver');
        $mail->Subject = 'Alta trabajador remoto - Administracion';
        $mail->Body = '<html>
                                <body>
                                <span>Estimado compañero,</span><br>
                                <span>Se ha dado de alta al trabajador ' . $nombre . ' ' . $ap1 . ' ' . $ap2 . ' en el departamento de ' . $departamento . '.<br><br>
                                <span>Se han de realizar las siguientes acciones:<br><br>
                                <span>- Dar de alta en el programa de procuradores con los respectivos datos bancarios<br><br>
                                <span>Rogamos contacte con informática tras realizar el alta para continuar con el proceso.<br><br>
                                <span>Gracias, un saludo.<br><br>
                                <em style="font-size:1.5em">Tu aliado legal, servicio sin par.</em><br><br>
                                <img style="width:400px; height:100px" src="https://circumnavigable-ref.000webhostapp.com/logo.png"/>
                                </body>
                              </html>';

        $mail->Send();
    }

    //CORREO ALTA TRABAJADOR REMOTO DESTINO INFORMÁTICA
    public function getCAltaTRInformatica($nombre, $ap1, $ap2, $departamentocod)
    {
        $departamento = $this->getDepartamentoCod($departamentocod);

        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->IsHTML(true);
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'procuradoresmaraver@gmail.com';
        $mail->Password = 'vtnh amxe qwgy stcn';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('procuradoresmaraver@gmail.com', 'Procuradores Maraver');
        $mail->addAddress('procuradoresmaraver@gmail.com', 'Procuradores Maraver');
        $mail->Subject = 'Alta trabajador remoto - Informatica';
        $mail->Body = '<html>
                                    <body>
                                    <span>Estimado compañero,</span><br>
                                    <span>Se ha dado de alta al trabajador ' . $nombre . ' ' . $ap1 . ' ' . $ap2 . ' en el departamento de ' . $departamento . '.<br><br>
                                    <span>Se han de realizar las siguientes acciones:<br><br>
                                    <span>- Dar de alta en el sistema de control horario<br>
                                    <span>- Asignar permisos a la ficha en el programa de procuradores, previa alta por departamento de Administración<br><br>
                                    <span>Gracias, un saludo.<br><br>
                                    <em style="font-size:1.5em">Tu aliado legal, servicio sin par.</em><br><br>
                                    <img style="width:400px; height:100px" src="https://circumnavigable-ref.000webhostapp.com/logo.png"/>
                                    </body>
                                  </html>';

        $mail->Send();
    }

    //CORREO ALTA TRABAJADOR REMOTO DESTINO SERVICIO EXTERIOR
    public function getCAltaTRSext($nombre, $ap1, $ap2, $email, $telefono)
    {
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->IsHTML(true);
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'procuradoresmaraver@gmail.com';
        $mail->Password = 'vtnh amxe qwgy stcn';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('procuradoresmaraver@gmail.com', 'Procuradores Maraver');
        $mail->addAddress('procuradoresmaraver@gmail.com', 'Procuradores Maraver');
        $mail->Subject = 'Alta trabajador remoto- Servicio externo';


        $mail->Body = '<html>
                                <body>
                                <span>Estimado compañero,</span><br>
                                <span>Se ha dado de alta al trabajador ' . $nombre . ' ' . $ap1 . ' ' . $ap2 . '.<br><br>
                                <span>Se han de realizar las siguientes acciones:<br><br>
                                <span>- Dar de alta el usuario en el sistema</span><br>
                                <span>- Creación de cuenta de correo ' . $email . ' y asignación de licencia Office</span><br>
                                <span>- Configurar la conexión remota en su equipo. Su teléfono es ' . $telefono . '</span><br>
                                <span>- Se ha de crear una carpeta de usuario en el servidor</span><br><br>
                                <span>Rogamos una vez creada la cuenta de correo envíe la contraseña al departamento de informática.</span><br><br>
                                <span>Gracias, un saludo.<br><br>
                                <em style="font-size:1.5em">Tu aliado legal, servicio sin par.</em><br><br>
                                <img style="width:400px; height:100px" src="https://circumnavigable-ref.000webhostapp.com/logo.png"/>
                                </body>
                            </html>';

        if (!$mail->send()) {
            echo 'El mensaje no se ha podido enviar.';
            echo 'Error de PHPMailer: ' . $mail->ErrorInfo;
        } else {
            echo '<script>
                        alert("Su mensaje ha sido enviado con éxito.");
                        window.location = "../Vistas/V_alta.php";
                    </script>';
        }
    }

    public function getItem($codinv)
    {
        $query = $this->conexion->query('SELECT tipo.descripcion as "tipo", marca.descripcion as "marca", modelo.descripcion as "modelo", inventario.numeroserie, inventario.falta, inventario.fbaja, inventario.activo, inventario.codinv FROM tipo INNER JOIN inventario ON tipo.codtip = inventario.codtip INNER JOIN modelo ON inventario.codmod = modelo.codmod INNER JOIN marca ON modelo.codmar = marca.codmar WHERE codinv = '.$codinv.'');

        $item = [];

        $i = 0;

        while ($fila = $query->fetch_assoc()) {
            $item[$i] = $fila;
            $i++;
        }

        return $item;
    }

    public function getTipo()
    {
        $query = $this->conexion->query('SELECT tipo.codtip, tipo.descripcion as "tipo" FROM tipo');

        $tipo = [];

        $i = 0;

        while ($fila = $query->fetch_assoc()) {
            $tipo[$i] = $fila;
            $i++;
        }

        return $tipo;
    }

    public function getMarca()
    {
        $query = $this->conexion->query('SELECT marca.codmar, marca.descripcion as "marca" FROM marca');

        $item = [];

        $i = 0;

        while ($fila = $query->fetch_assoc()) {
            $item[$i] = $fila;
            $i++;
        }

        return $item;
    }

}
