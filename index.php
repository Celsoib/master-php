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
    <input type="submit">
  </form>
</body>
</html>