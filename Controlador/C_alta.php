<?php

require('../Modelo/conexion.php');

$conexion = new Conexion();

$departamento = $conexion->getDepartamento();

$ptlibres = $conexion->getPTlibres();

?>