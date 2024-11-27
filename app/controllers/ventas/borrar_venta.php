<?php

include ('../../config.php');

$id_venta =$_GET['id_venta'];

$pdo->beginTransaction();

$sentencia = $pdo->prepare("DELETE FROM ventas WHERE id_venta=:id_venta");

$sentencia->bindParam('id_venta',$id_venta);

if($sentencia->execute()){
    $pdo->commit();
    ?>
    <script>
        location.href = "<?php echo $URL;?>/ventas";
    </script>
    <?php
}else{
   echo"Error al intentar borrar la venta";
   $pdo->rollBack();
}


