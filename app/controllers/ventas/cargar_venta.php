<?php

$sql_ventas = "SELECT *, cli.nombre_cliente AS nombre_cliente 
                FROM ventas AS ve INNER JOIN clientes AS cli ON cli.id_clientes = ve.id_clientes 
                WHERE ve.id_venta='$id_venta_get'";

$query_ventas = $pdo->prepare($sql_ventas);
$query_ventas->execute();
$ventas_datos = $query_ventas->fetchAll(PDO::FETCH_ASSOC);

foreach($ventas_datos as $ventas_dato){
    $nro_venta=$ventas_dato['nro_venta'];
    $id_clientes=$ventas_dato['id_clientes'];
    
}