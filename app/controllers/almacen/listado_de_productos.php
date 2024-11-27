<?php



$sql_productos = "SELECT *, cat.nombre_categoria AS categoria, u.email AS email
FROM almacen AS a 
INNER JOIN categorias AS cat ON a.id_categoria = cat.id_categoria
INNER JOIN usuarios AS u ON u.id_usuario=a.id_usuario";

$query_productos = $pdo->prepare($sql_productos);
$query_productos->execute();
$productos_datos = $query_productos->fetchAll(PDO::FETCH_ASSOC);