<?php

require('../Modelo/conexion.php');

$anydesk = $_POST['anydesk'];
$pass = $_POST['pass'];

$conexion = new Conexion();

$conexion->getInstalacion($anydesk, $pass);

?>

