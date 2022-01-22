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
        <li>
          <a href="index.php">Categoría 1</a>
        </li>
        <li>
          <a href="index.php">Categoría 2</a>
        </li>
        <li>
          <a href="index.php">Categoría 3</a>
        </li>
        <li>
          <a href="index.php">Categoría 4</a>
        </li>
        <li>
          <a href="index.php">Sobre mí</a>
        </li>
        <li>
          <a href="index.php">Contacto</a>
        </li>
      </ul>
    </nav>

    <!-- para que se limpie lo flotado y lo de abajo no se monte con lo de arriba   -->
    <div class="clearfix"></div>

  </header>

  <div id = "contenedor">
    <!-- Barra lateral  -->
    <aside id = "sidebar">
      <div id = "login" class = "bloque">
        <h3>Identifícate</h3>
        <form action="login.php" method="POST">
          <p>
            <label for="email">Email</label>
            <input type="email" name="email">
          </p>
          <p>
            <label for="password">Contraseña</label>
            <input type="password" name="password">
          </p>
          <input type="submit" value="Entrar">
        </form>
      </div>
      <div id = "register" class = "bloque">
        <h3>Regístrate</h3>
        <form action="registro.php" method="POST">
          <p>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre">
          </p>
          <p>
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos">
          </p>
          <p>
            <label for="email">Email</label>
            <input type="email" name="email">
          </p>
          <p>
            <label for="password">Contraseña</label>
            <input type="password" name="password">
          </p>
          <input type="submit" value="Registrar">
        </form>
      </div>
    </aside>

    <!-- Caja principal  -->
    <div id="principal">
      <h1>Últimas entradas</h1>
      <article class="entrada">
        <a href="">
          <h2>Título de mi entrada</h2>
          <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fuga recusandae, incidunt tempora omnis culpa qui dignissimos ducimus numquam minima, enim beatae. Ipsa, distinctio modi sequi magnam eaque amet ad repudiandae.
          </p>
        </a>
      </article>
      <article class="entrada">
        <a href="">
          <h2>Título de mi entrada</h2>
          <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fuga recusandae, incidunt tempora omnis culpa qui dignissimos ducimus numquam minima, enim beatae. Ipsa, distinctio modi sequi magnam eaque amet ad repudiandae.
          </p>
        </a>
      </article>
      <article class="entrada">
        <a href="">
          <h2>Título de mi entrada</h2>
          <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fuga recusandae, incidunt tempora omnis culpa qui dignissimos ducimus numquam minima, enim beatae. Ipsa, distinctio modi sequi magnam eaque amet ad repudiandae.
          </p>
        </a>
      </article>
      <article class="entrada">
        <a href="">
          <h2>Título de mi entrada</h2>
          <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fuga recusandae, incidunt tempora omnis culpa qui dignissimos ducimus numquam minima, enim beatae. Ipsa, distinctio modi sequi magnam eaque amet ad repudiandae.
          </p>
        </a>
      </article>
      <div id="ver-todas">
        <a href="">Ver todas las entradas</a>
      </div>
    </div> <!-- fin principal -->

    <!-- para que el pie de página no suba y se mantega todo el modelo de caja  -->
    <div class="clearfix"></div>
  </div>
  <!-- Pie de página  -->
  <footer id="pie">
    <p>Desarrollado por Celso Ibáñez &copy; 2022</p>
  </footer>

</body>
</html>
