<?php

include('../../config.php');

$nombre_categoria = $_GET['nombre_categoria'];

$sentencia = $pdo->prepare("INSERT INTO categorias 
        ( nombre_categoria, created_at) 
VALUES (:nombre_categoria,:created_at);");

$sentencia->bindParam('nombre_categoria', $nombre_categoria);
$sentencia->bindParam('created_at', $fechaHora);
if ($sentencia->execute()) {
    session_start();
    //echo "Se registro correctamente";
    $_SESSION['mensaje'] = "Se registro la categoria correctamnete";
    $_SESSION['icono'] = "success";
    //header('Location: '.$URL.'/categorias/');
    ?>
    <script>
        location.href = "<?php echo $URL; ?>categorias";
    </script>
    <?php
} else {
    session_start();
    $_SESSION['mensaje'] = "error no se pudo registrar en la base de datos";
    $_SESSION['icono'] = "error";
    header('Location: ' . $URL . '/categorias');
    ?>
    <script>
        location.href = "<?php echo $URL; ?>categorias";
    </script>
    <?php
}


