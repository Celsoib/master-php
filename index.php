<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tienda de comisetas</title>
  <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
  <!-- INICIO CONTAINER GENERAL  -->
  <div id="container">

    <!-- CABECERA  -->
    <header id="header">
      <div id="logo">
        <img src="assets/img/camiseta.png" alt="Camiseta logo" id="logo">
        <a href="index.php">Tienda de camisetas</a>
      </div>
    </header>

    <!-- MENÚ  -->
    <nav id="menu">
      <ul>
        <li>
          <a href="#">Inicio</a>
        </li>
        <li>
          <a href="#">Categoría 1</a>
        </li>
        <li>
          <a href="#">Categoría 2</a>
        </li>
        <li>
          <a href="#">Categoría 3</a>
        </li>
        <li>
          <a href="#">Categoría 4</a>
        </li>
        <li>
          <a href="#">Categoría 5</a>
        </li>
      </ul>
    </nav>

    <div id="content">

      <!-- BARRA LATERAL  -->
      <aside id="lateral">
        <div class="block_aside" id="login">
          <h3>Entrar a la web</h3>
          <form action="#" method="POST">
            <p>
              <label for="email">Email</label>
              <input type="email" name="email">
            </p>
            <p>
              <label for="password">Contraseña</label>
              <input type="password" name="password">
            </p>
            <input type="submit" value="Enviar">
          </form>
        </div>
        <ul>
          <li><a href="#">Mis pedidos</a></li>
          <li><a href="#">Gestionar pedidos</a></li>
          <li><a href="#">Gestionar categorías</a></li>
        </ul>

      </aside>

      <!-- CONTENIDO CENTRAL  -->
      <div id="central">
        <h1>Productos destacados</h1>
        <div class="product">
          <img src="assets/img/camiseta.png" alt="Foto camiseta">
          <h2>Camiseta Azul Ancha</h2>
          <p>30.000 Gs</p>
          <a href="#" class="button">Comprar</a>
        </div>
        <div class="product">
          <img src="assets/img/camiseta.png" alt="Foto camiseta">
          <h2>Camiseta Azul Ancha</h2>
          <p>30.000 Gs</p>
          <a href="#" class="button">Comprar</a>
        </div>
        <div class="product">
          <img src="assets/img/camiseta.png" alt="Foto camiseta">
          <h2>Camiseta Azul Ancha</h2>
          <p>30.000 Gs</p>
          <a href="#" class="button">Comprar</a>
        </div>
      </div>

    </div>


    <!-- PIE DE PÁGINA  -->
    <footer id="footer">
      <p>Desarrollado por Celso Ibáñez WEB &copy; <?=date('Y')?></p>
    </footer>
  <!-- FIN CONTAINER GENERAL    -->
  </div>
</body>
</html>