<?php

include ('../../config.php');

$id_rol = $_POST['id_rol'];
$rol = $_POST['rol'];


        $sentencia = $pdo->prepare("UPDATE `roles` 
        SET `rol`=:rol,
        `updated_at`=:updated_at 
        WHERE id_rol =:id_rol");
    
        $sentencia->bindParam('rol', $rol);
        $sentencia->bindParam('updated_at', $fechaHora);
        $sentencia->bindParam('id_rol', $id_rol);

        if($sentencia->execute()){
            session_start();
            $_SESSION['mensaje']="Se actualizo el rol correctamnete";
            $_SESSION['icono']="success";
            header('Location: '.$URL.'/roles/');
        } else{
            session_start();
            $_SESSION['mensaje']="error no se pudo actualizar";
            $_SESSION['icono']="error";
            header('Location: '.$URL.'/roles/update.php?id='.$id_rol);
        }



