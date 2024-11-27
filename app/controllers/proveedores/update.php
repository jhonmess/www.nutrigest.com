<?php

include ('../../config.php');

$id_proveedor = $_GET['id_proveedor'];
$nombre_proveedor = $_GET['nombre_proveedor'];
$celular = $_GET['celular'];
$telefono = $_GET['telefono'];
$empresa = $_GET['empresa'];
$email = $_GET['email'];
$direccion = $_GET['direccion'];

$sentencia = $pdo->prepare("UPDATE proveedores
    SET nombre_proveedor=:nombre_proveedor,
        celular=:celular,
        telefono=:telefono,
        empresa=:empresa,
        email=:email,
        direccion=:direccion,
        updated_at=:updated_at
    WHERE id_proveedor = :id_proveedor ");

$sentencia->bindParam('nombre_proveedor',$nombre_proveedor);
$sentencia->bindParam('celular',$celular);
$sentencia->bindParam('telefono',$telefono);
$sentencia->bindParam('empresa',$empresa);
$sentencia->bindParam('email',$email);
$sentencia->bindParam('direccion',$direccion);
$sentencia->bindParam('updated_at',$fechaHora);
$sentencia->bindParam('id_proveedor',$id_proveedor);


if($sentencia->execute()){
    session_start();
    // echo "se registro correctamente";
    $_SESSION['mensaje'] = "Se alctualizo al proveedor de la manera correcta";
    $_SESSION['icono'] = "success";
    // header('Location: '.$URL.'/categorias/');
    ?>
    <script>
        location.href = "<?php echo $URL;?>/proveedores";
    </script>
    <?php
}else{
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar en la base de datos";
    $_SESSION['icono'] = "error";
    //  header('Location: '.$URL.'/categorias');
    ?>
    <script>
        location.href = "<?php echo $URL;?>/proveedores";
    </script>
    <?php
}
