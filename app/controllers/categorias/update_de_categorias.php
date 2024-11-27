<?php

include('../../config.php');

$nombre_categoria = $_GET['nombre_categoria'];
$id_categoria = $_GET['id_categoria'];


$sentencia = $pdo->prepare("UPDATE `categorias` 
        SET `nombre_categoria`=:nombre_categoria,
        `updated_at`=:updated_at 
        WHERE id_categoria =:id_categoria");

$sentencia->bindParam('nombre_categoria', $nombre_categoria);
$sentencia->bindParam('updated_at', $fechaHora);
$sentencia->bindParam('id_categoria', $id_categoria);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Se actualizo la categoria correctamnete";
    $_SESSION['icono'] = "success";
    //header('Location: '.$URL.'/roles/');
    ?>
    <script>
        location.href = "<?php echo $URL; ?>categorias";
    </script>
    <?php
} else {
    session_start();
    $_SESSION['mensaje'] = "error no se pudo actualizar";
    $_SESSION['icono'] = "error";
    //header('Location: '.$URL.'/roles/update.php?id='.$id_rol);
    ?>
    <script>
        location.href = "<?php echo $URL; ?>categorias";
    </script>
    <?php
}