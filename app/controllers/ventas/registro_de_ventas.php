<?php

include('../../config.php');


$nro_venta = $_GET['nro_venta'];
$id_clientes = $_GET['id_clientes'];
$total_a_cancelar = $_GET['total_a_cancelar'];


$pdo->beginTransaction();

$sentencia = $pdo->prepare("INSERT INTO ventas
       ( nro_venta, id_clientes, total_pagado, created_at) 
VALUES (:nro_venta,:id_clientes,:total_pagado,:created_at)");

$sentencia->bindParam('nro_venta', $nro_venta);
$sentencia->bindParam('id_clientes', $id_clientes);
$sentencia->bindParam('total_pagado', $total_a_cancelar);
$sentencia->bindParam('created_at', $fechaHora);

if ($sentencia->execute()) {

    $pdo->commit();

    session_start();
    $_SESSION['mensaje'] = "Se registro la venta correctamente";
    $_SESSION['icono'] = "success";
    // header('Location: '.$URL.'/categorias/');
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/ventas";
    </script>
    <?php
} else {
    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar";
    $_SESSION['icono'] = "error";
    //  header('Location: '.$URL.'/categorias');
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/ventas/create.php";
    </script>
    <?php
}






