<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Subir archivos php</title>
</head>
<body>
  <h1>Subir imagenes con php</h1>
  <form action="upload.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="archivo">
    <input type="submit">
  </form>

</body>
</html>