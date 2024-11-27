<?php

include ('../../config.php');

$rol = $_POST['rol'];

       $sentencia = $pdo->prepare("INSERT INTO roles 
           ( rol, created_at) 
       VALUES (:rol,:created_at);");

       $sentencia->bindParam('rol', $rol);
       $sentencia->bindParam('created_at', $fechaHora);
       if($sentencia->execute()) {
        session_start();
        $_SESSION['mensaje']="Se registro el rol correctamnete";
        $_SESSION['icono']="success";
        header('Location: '.$URL.'/roles/');
       } else {
       session_start();
       $_SESSION['mensaje']="error no se pudo registrar en la base de datos";
       $_SESSION['icono']="error";
       header('Location: '.$URL.'/roles/create.php');
       }
       

    



