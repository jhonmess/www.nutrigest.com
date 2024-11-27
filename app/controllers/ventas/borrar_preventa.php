<?php

include ('../../config.php');

$id_preventa = $_POST['id_preventa'];


$sentencia = $pdo->prepare("DELETE FROM preventa WHERE id_preventa=:id_preventa");

$sentencia->bindParam('id_preventa',$id_preventa);

if($sentencia->execute()){
    ?>
    <script>
        location.href = "<?php echo $URL;?>/ventas/create.php";
    </script>
    <?php
}else{
    ?>
    <script>
        location.href = "<?php echo $URL;?>/ventas/create.php";
    </script>
    <?php
}


