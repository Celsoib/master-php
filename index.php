<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Validación de formularios PHP</title>
</head>
<body>
  <h1>Validar formularios en PHP</h1>

  <?php
    if(isset($_GET['error'])){
      $error = $_GET['error'];

      if($error == 'faltan_valores'){
        echo '<strong style="color:red">Introduce todos los valores en todos los campos</strong>';
      }
      if($error == 'nombre'){
        echo '<strong style="color:red">Introduce bien el nombre</strong>';
      }
      if($error == 'apellidos'){
        echo '<strong style="color:red">Los apellidos no son correctos</strong>';
      }
      if($error == 'edad'){
        echo '<strong style="color:red">Introduce una edad correcta</strong>';
      }
      if($error == 'email'){
        echo '<strong style="color:red">El correo es erróneo</strong>';
      }
      if($error == 'password'){
        echo '<strong style="color:red">Introduce una contraseña de más de 5 caracteres</strong>';
      }
    }
  ?>

  <form action="procesar_formulario.php" method="POST">
    <label for="nombre">Nombre:</label><br>
    <input type="text" name="nombre" required patern="[a-zA-Z]+"><br>

    <label for="apellidos">apellidos:</label><br>
    <input type="text" name="apellidos" required patern="[a-zA-Z]+"><br>

    <label for="edad">edad:</label><br>
    <input type="number" name="edad" required patern="[0-9]+"><br>

    <label for="email">email:</label><br>
    <input type="text" name="email" required><br>

    <label for="pass">Contraseña:</label><br>
    <input type="password" name="pass" required minlength="5"><br>

    <input type="submit"><br>
  </form>
</body>
</html>