<?php
  $server = "localhost";
  $user = "root";
  $password = "";
  $bd = "blog_master";

  $conexion = mysqli_connect ($server, $user, $password, $bd);

  // mysqli_set_charset($conexion, "utf8");
  mysqli_query($conexion, "SET NAMES 'utf8'");

  date_default_timezone_set('America/Asuncion');


  if(!$conexion){
    die('Error de Conexión:' . mysqli_connect_errno());
  }

?>
