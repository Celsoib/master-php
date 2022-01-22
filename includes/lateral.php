

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