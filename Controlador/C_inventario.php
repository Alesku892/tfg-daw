<?php

    require('../Modelo/conexion.php');

    $conexion = new Conexion();

    $inventario = $conexion->getInventario();

?>