<?php

    require('../Modelo/conexion.php');

    $mensaje = $_POST['mensaje'];

    $conexion = new Conexion();

    $denuncias = $conexion->getCDenuncia($mensaje);

?>