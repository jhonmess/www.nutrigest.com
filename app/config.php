<?php


 define('SERVIDOR','localhost');
 define('USUARIO','root');
 define('PASSWORD','');
 define('BD','nutrigest');

 $servidor = "mysql:dbname=".BD.";host=".SERVIDOR;
try{
    $pdo = new PDO($servidor,USUARIO,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    //echo "la conexion a la base de datos fue realizada con exito";
} catch (PDOException $e) {
    print_r($e);
    echo"Error al conectar a la base de datos";
}

$URL = "http://localhost/www.nutrigest.com/";


date_default_timezone_set("America/Caracas");
$fechaHora =date('Y-m-d H:i:s');



