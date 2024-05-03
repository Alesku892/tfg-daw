<?php

require('../Modelo/conexion.php');

$conexion = new Conexion();

if(isset($_POST['departamento'])) {
    $departamento = $_POST['departamento'];
} else {
    $departamento = $_SESSION['departamento'];
}

$conexion->getAltaBBDD();
?>