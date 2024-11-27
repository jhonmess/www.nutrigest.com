<?php

include ('../../config.php');


$nombre_cliente = $_POST['nombre_cliente'];
$nit_ci_cliente = $_POST['nit_ci_cliente'];
$celular = $_POST['celular'];
$email_cliente = $_POST['email_cliente'];


$sentencia = $pdo->prepare("INSERT INTO clientes
       ( nombre_cliente, nit_ci_cliente, celular, email_cliente, created_at) 
VALUES (:nombre_cliente,:nit_ci_cliente,:celular,:email_cliente,:created_at)");

$sentencia->bindParam('nombre_cliente',$nombre_cliente);
$sentencia->bindParam('nit_ci_cliente',$nit_ci_cliente);
$sentencia->bindParam('celular',$celular);
$sentencia->bindParam('email_cliente',$email_cliente);
$sentencia->bindParam('created_at',$fechaHora);

if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Se registro correctamente";
    $_SESSION['icono'] = "success";
    ?>
    <script>
        location.href = "<?php echo $URL;?>/ventas/create.php";
    </script>
    <?php
}else{
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar";
    $_SESSION['icono'] = "error";

    ?>
    <script>
        location.href = "<?php echo $URL;?>/ventas/create.php";
    </script>
    <?php
}






