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

        $query = $this->conexion->query('SELECT departamento.descripcion as "dep", CONCAT(usuario.Nombre," ",usuario.Ap1," ",COALESCE(usuario.Ap2," ")) as "nombre" FROM usuario INNER JOIN departamento ON departamento.CodDep=usuario.CodDep INNER JOIN perfil ON perfil.CodPer=usuario.CodPer WHERE Departamento.CodDep = 6');

        $dire = [];

        $i = 0;

        while ($fila = $query->fetch_assoc()) {
            $dire[$i] = $fila;
            $i++;
        }

        return $dire;
    }

    public function getInformatica()
    {

        $query = $this->conexion->query('SELECT departamento.descripcion as "dep", CONCAT(usuario.Nombre," ",usuario.Ap1," ",COALESCE(usuario.Ap2," ")) as "nombre" FROM usuario INNER JOIN departamento ON departamento.CodDep=usuario.CodDep INNER JOIN perfil ON perfil.CodPer=usuario.CodPer WHERE Departamento.CodDep = 1');

        $inf = [];

        $i = 0;

        while ($fila = $query->fetch_assoc()) {
            $inf[$i] = $fila;
            $i++;
        }

        return $inf;
    }

    public function getResponsable()
    {

        $query = $this->conexion->query('SELECT departamento.descripcion as "dep", perfil.descripcion as "per", CONCAT(usuario.Nombre," ",usuario.Ap1," ",COALESCE(usuario.Ap2," ")) as "nombre" FROM usuario INNER JOIN departamento ON departamento.CodDep=usuario.CodDep INNER JOIN perfil ON perfil.CodPer=usuario.CodPer WHERE Perfil.CodPer = 2');

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

        $query = $this->conexion->query('SELECT CONCAT(usuario.Nombre," ",usuario.Ap1," ",COALESCE(usuario.Ap2," ")) as "nombre" FROM usuario INNER JOIN departamento ON departamento.CodDep=usuario.CodDep WHERE Departamento.CodDep = 2 AND Usuario.CodPer = 3');

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

        $query = $this->conexion->query('SELECT CONCAT(usuario.Nombre," ",usuario.Ap1," ",COALESCE(usuario.Ap2," ")) as "nombre" FROM usuario INNER JOIN departamento ON departamento.CodDep=usuario.CodDep WHERE Departamento.CodDep = 3 AND Usuario.CodPer = 3');

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

        $query = $this->conexion->query('SELECT CONCAT(usuario.Nombre," ",usuario.Ap1," ",COALESCE(usuario.Ap2," ")) as "nombre" FROM usuario INNER JOIN departamento ON departamento.CodDep=usuario.CodDep WHERE Departamento.CodDep = 4 AND Usuario.CodPer = 3');

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

        $query = $this->conexion->query('SELECT CONCAT(usuario.Nombre," ",usuario.Ap1," ",COALESCE(usuario.Ap2," ")) as "nombre" FROM usuario INNER JOIN departamento ON departamento.CodDep=usuario.CodDep WHERE Departamento.CodDep = 5 AND Usuario.CodPer = 3');

        $usuNo = [];

        $i = 0;

        while ($fila = $query->fetch_assoc()) {
            $usuNo[$i] = $fila;
            $i++;
        }

        return $usuNo;
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

        $query = $this->conexion->query('SELECT CONCAT(usuario.Nombre," ",usuario.Ap1," ",COALESCE(usuario.Ap2," ")) as "Nombre",departamento.Descripcion as "departamento", puestotrabajo.CodPT as "PT",departamento.CodDep as "CodDep" FROM usuario INNER JOIN departamento ON usuario.CodDep=departamento.CodDep INNER JOIN puestotrabajo ON usuario.CodUsu = puestotrabajo.CodUsu ORDER BY CodPT ASC');

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

        $query = $this->conexion->query("SELECT nombre, departamento, correo, extension, equipo, monitor FROM v_inventario WHERE pt = '$pt'");

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
                            <blockquote><em>'.$mensaje.'</em></blockquote>
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

    public function login() {

        session_start();

        $login = $_POST['login'];
        $password = $_POST['password'];

        $query = $this->conexion->query("SELECT * FROM usuario WHERE upper(correo) = upper('$login') AND Password = '$password'");

        if(mysqli_num_rows($query) > 0) {
    
            $consulta = $this->conexion->query("SELECT CodUsu, Nombre, CodPer FROM usuario WHERE upper(correo) = upper('$login')");

            while($row = $consulta->fetch_array() ) {   //$_SESSION['usuario'] siempre será el nombre de usuario
                $_SESSION['usuario'] = $row[0]; 
                $_SESSION['perfil'] = $row[2]; 
                setcookie("nombre",$row[1], time()+3600,"/");
            }

            echo '
            <script>
                alert("Sesion iniciada con éxito con perfil.");
                window.location = "../Vistas/V_index.php";
            </script>
            ';
        } 

        else {
            echo '
                <script>
                    alert("El correo o usuario no coinciden con la contraseña.");
                    window.location = "../Vistas/V_login.php";
                </script>
                ';
        }
    }

    public function cerrarSesion() {
        session_start();
        session_destroy();
        unset($_SESSION['codper']);
        setcookie("nombre","", time()-1,"/");  
        echo '
        <script>
            alert("Sesión cerrada con éxito.");
            window.location = "../Vistas/V_index.php";
        </script>
        ';

    }
}
