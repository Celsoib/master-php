<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario php y html</title>
</head>
<body>
  <h1>Formulario</h1>
  <form action="" method="POST" enctype="multipart/form-data">
    <p>
      <label for="nombre">Nombre:</label>
      <input type="text" name="nombre" autofocus disabled placeholder="nombre">
    </p>
    <p>
      <label for="apellido">Apellido:</label>
      <input type="text" name="apellido" maxlength="5" minlength="3" pattern="[A-Z ]+" required value="mete tu apellllido">
    </p>
    <p>
      <label for="boton">Botón:</label>
      <input type="button" name="boton" value="cliclame">
    </p>
    <p>
      <label for="sexo">Sexo:</label>
      Hombre<input type="checkbox" name="sexo" value="hombre">
      Mujer<input type="checkbox" name="sexo" value="mujer" checked>
    </p>
    <p>
      <label for="color">Color:</label>
      <input type="color" name="color" value="">
    </p>
    <p>
      <label for="date">Fecha:</label>
      <input type="date" name="date" value="">
    </p>
    <p>
      <label for="correo">Correo:</label>
      <input type="email" name="correo" value="">
    </p>
    <p>
      <label for="archivo">Archivo:</label>
      <input type="file" name="archivo" multiple value="">
    </p>
    <p>
      <label for="numero">Numero:</label>
      <input type="number" name="numero" value="">
    </p>
    <p>
      <label for="password">Contraseña:</label>
      <input type="password" name="password" value="">
    </p>
    <p>
      <label for="continente">Continente:</label>
      América<input type="radio" name="continente" value="América">
      Europa<input type="radio" name="continente" value="Europa">
      Asia<input type="radio" name="continente" value="Asia">
    </p>
    <p>
      <label for="web">Página web</label>
      <input type="url" name="web" value="">
    </p>
    <textarea name="" id="" cols="30" rows="10"></textarea><br>
    Peliculas
    <select name="peliculas" id="">
      <option value="Spiderman">Spiderman</option>
      <option value="Superman">Superman</option>
      <option value="Batman">Batman</option>
    </select><br>
    <input type="submit"><br>
  </form>
</body>
</html>