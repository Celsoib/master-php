<h1>Registrarse</h1>

<?php if(isset($_SESSION['register']) && $_SESSION['register']): ?>
  <!-- SI EXISTE session Y SI LA session ES IGUAL A complete MOSTRAMOS ESTO: -->
  <strong>Registro completado correctamente</strong>
<?php else:?>
  <!-- EN CASO CONTRARIO MOSTRAMOS ESTO: -->
  <strong>Registro fallido</strong>
<?php endif;?>

<form action="<?=base_url?>usuario/save" method="POST">
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