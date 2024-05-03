<?php
require('../Controlador/C_inventario.php');

// Genera el nombre del archivo con la fecha actual
$fecha = date('Y-m-d');
$nombreArchivo = "inventario_" . $fecha . ".csv";

// Configura los encabezados para la descarga
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="' . $nombreArchivo . '"');

// Abre el flujo de salida de PHP para escribir el CSV
$output = fopen('php://output', 'w');

// Añade las cabeceras al CSV
fputcsv($output, array('Tipo', 'Marca', 'Modelo', 'Numero_de_serie', 'Fecha_alta', 'Fecha_baja', 'Activo'));

// Añade los elementos al CSV
foreach ($inventario as $item) {
    fputcsv($output, array($item['tipo'], $item['marca'], $item['modelo'], $item['numeroserie'], $item['falta'], $item['fbaja'], $item['activo']));
}

// Cierra el flujo de salida
fclose($output);
?>



