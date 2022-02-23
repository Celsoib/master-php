<h1>Registrarse</h1>

<form action="index.php?controller=usuario&action=save" method="POST">
  <p>
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" required>
  </p>
  <p>
    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos" required>
  </p>
  <p>
    <label for="email">Email</label>
    <input type="email" name="email" required>
  </p>
  <p>
    <label for="password">Contraseña</label>
    <input type="password" name="password" required>
  </p>
  <input type="submit" value="Registrarse">
</form>