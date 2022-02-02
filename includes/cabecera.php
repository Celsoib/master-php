<?php require_once 'conexion.php';?>
<?php require_once "includes/helpers.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="./assets/css/estilo.css">
</head>
<body>
  <!-- Cabecera  -->
  <header id="cabecera">
    <!-- logo  -->
    <div id="logo">
      <a href="index.php">
        Blog de videojuegos
      </a>
    </div>
    <!-- Menu  -->
    <nav id="menu">
      <ul>
        <li>
          <a href="index.php">Inicio</a>
        </li>
        <?php
          $categorias = conseguirCategorias($conexion);
          if(!empty($categorias)):
            while ($categoria =  mysqli_fetch_assoc($categorias)):
        ?>
              <li>
                <a href="categoria.php?id=<?=$categoria['id']?>"><?=$categoria['nombre']?></a>
              </li>
        <?php
            endwhile;
          endif;
        ?>
        <li>
          <a href="index.php">Contacto</a>
        </li>
      </ul>
    </nav>

    <!-- para que se limpie lo flotado y lo de abajo no se monte con lo de arriba   -->
    <div class="clearfix"></div>

  </header>
  <div id = "contenedor">
