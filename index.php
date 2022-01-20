<?php
  date_default_timezone_set('America/Asuncion');
  // Conectar a la base de datos
  $conexion = mysqli_connect("localhost","root","","phpmysql");

  // Consulta para configurar la codificación de caracter
  mysqli_query($conexion, "SET NAMES 'utf8'");

  // Comprobar si la conexión es correcta
  if(mysqli_connect_errno()){
    echo "La conexión a la bd mysql ha fallado: ".mysqli_connect_error();
  } else {
    echo "Conexión realizada correctamente";
  }

  // Consulta SELECT desde PHP
  $query = mysqli_query($conexion, "SELECT * FROM notas");
  // $notas = mysqli_fetch_assoc($query);

  while ($nota = mysqli_fetch_assoc($query)) {
    echo "<h2>".$nota['titulo']."</h2>";
    echo $nota['descripcion']."<br>";
    // var_dump($nota);
  }

  // Insertar en la bd desde PHP
  $sql = "INSERT INTO notas VALUES(null,'Nota desde PHP','Esto es una nota de PHP','green')" ;
  $insert = mysqli_query($conexion, $sql);

  echo "<hr>";
  if($insert){
    echo "Datos insertados correctamente";
  } else {
    echo "Error: ".myslqi_error($conexion);
  }
?>

