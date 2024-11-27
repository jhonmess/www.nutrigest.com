<?php

include ('../../config.php');

$nombres = $_POST['nombres'];
$email = $_POST['email'];
$password_user = $_POST['password_user'];
$password_repeat = $_POST['password_repeat'];
$id_usuario = $_POST['id_usuario'];


    $sentencia = $pdo->prepare("DELETE FROM `usuarios` WHERE id_usuario=:id_usuario");
    $sentencia->bindParam('id_usuario', $id_usuario);
    $sentencia->execute();

    session_start();
    $_SESSION['mensaje']="Se elimino al usuario correctamnete";
    $_SESSION['icono']="success";
    header('Location: '.$URL.'/usuarios/');


