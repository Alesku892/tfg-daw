<?php

require('../Modelo/conexion.php');

$codusu = $_POST['codusu'];
$ccorreo = $_POST['ccorreo'];
$carpeta = $_POST['carpeta'];

$conexion = new Conexion();

// DESACTIVAMOS USUARIO
$conexion->getBajaBBDD($codusu);

// CORREO PARA INFORMÁTICA
$conexion->getCBajaInformatica($codusu);

// CORREO PARA SERVICIO EXTERNO
if ($_POST['ccorreo'] == 'eliminar') {
    $destino = "<span>- Se ha de eliminar su cuenta de correo</span><br>";
    $conexion->getCBajaExt($codusu, $destino, $carpeta);
} else {
    if ($_POST['ccorreo'] == 'redirigir') {
        $destino = '<span>- Se ha de redirigir su cuenta de correo hacia ' . $_POST['redir'] . '</span><br>';
        $conexion->getCBajaExt($codusu, $destino, $carpeta);
    } else {
        $destino = '<span>- Se ha de crear un alias de su cuenta de correo en ' . $_POST['ali'] . '</span><br>';
        $conexion->getCBajaExt($codusu, $destino, $carpeta);
    }
}
