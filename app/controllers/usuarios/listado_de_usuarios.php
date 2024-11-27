<?php



  $sql_usuarios = "SELECT us.id_usuario AS id_usuario, us.nombres AS nombres, us.email AS email, rol.rol AS rol 
                  FROM usuarios AS us INNER JOIN roles AS rol ON us.id_rol = rol.id_rol;";
  $query_usuarios = $pdo->prepare($sql_usuarios);
  $query_usuarios->execute();
  $usuarios_datos = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);