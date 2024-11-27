<?php

$sql_clientes = "SELECT * FROM clientes WHERE id_clientes = :id_clientes";
$query_clientes = $pdo->prepare($sql_clientes);
$query_clientes->execute(['id_clientes' => $id_clientes]);


$clientes_datos = $query_clientes->fetchAll(PDO::FETCH_ASSOC);

$nombre_cliente = isset($clientes_datos[0]['nombre_cliente']) ? $clientes_datos[0]['nombre_cliente'] : '';
$nit_ci_cliente = isset($clientes_datos[0]['nit_ci_cliente']) ? $clientes_datos[0]['nit_ci_cliente'] : '';
$celular = isset($clientes_datos[0]['celular']) ? $clientes_datos[0]['celular'] : '';
$email_cliente = isset($clientes_datos[0]['email_cliente']) ? $clientes_datos[0]['email_cliente'] : '';
?>
