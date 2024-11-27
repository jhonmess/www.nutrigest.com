<?php

include ('../../config.php');

$nro_venta = $_GET['nro_venta'];
$id_producto = $_GET['id_producto'];
$cantidad = $_GET['cantidad'];


//$pdo->beginTransaction();

$sentencia = $pdo->prepare("INSERT INTO preventa
       ( nro_venta, id_producto, cantidad, created_at) 
VALUES (:nro_venta, :id_producto,:cantidad,:created_at)");

$sentencia->bindParam('nro_venta',$nro_venta);
$sentencia->bindParam('id_producto',$id_producto);
$sentencia->bindParam('cantidad',$cantidad);
$sentencia->bindParam('created_at',$fechaHora);

if($sentencia->execute()){
    ?>
    <script>
        location.href = "<?php echo $URL;?>/ventas/create.php";
    </script>
    <?php
}else{

    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar";
    $_SESSION['icono'] = "error";
    //  header('Location: '.$URL.'/categorias');
    ?>
    <script>
        location.href = "<?php echo $URL;?>/ventas/create.php";
    </script>
    <?php
}






