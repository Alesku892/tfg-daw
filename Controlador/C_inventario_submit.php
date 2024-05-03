<?php

    require('../Modelo/conexion.php');

    $conexion = new Conexion();

    $codinv = $_GET['codinv'];

    $inventario = $conexion->getItem($codinv);
    $tipo = $conexion->getTipo();
    $marca = $conexion->getMarca();

?>