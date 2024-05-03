<?php

    require('../Modelo/conexion.php');

    $conexion = new Conexion();

    $dire = $conexion->getDireccion();
    $res = $conexion->getResponsable();
    $usuAd = $conexion->getUsuAdmin();
    $usuDe = $conexion->getUsuDemandas();
    $usuEs = $conexion->getUsuEscritos();
    $usuNo = $conexion->getUsuNotis();
    $usuAll = $conexion->getUsuAll();

?>