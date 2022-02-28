<h1>Registrarse</h1>

<?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
  <!-- SI EXISTE session Y SI LA session ES IGUAL A complete MOSTRAMOS ESTO: -->
  <strong class="alert_green">Registro completado correctamente</strong>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'):?>
  <!-- EN CASO CONTRARIO MOSTRAMOS ESTO: -->
  <strong class="alert_red">Registro fallido, introduce bien los datos</strong>
<?php endif;?>
<?php Utils::deleteSession('register');?>

<!-- FORMULARIO DE REGISTRO  -->
<form action="<?=base_url?>usuario/save" method="POST">
  <p>
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre"  autofocus patern="[a-zA-Z]+" required>
  </p>
  <p>
    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos" patern="[a-zA-Z]+" require>
  </p>
  <p>
    <label for="email">Email</label>
    <input type="email" name="email" patern="[a-zA-Z]+" require>
  </p>
  <p>
    <label for="password">Contraseña</label>
    <input type="password" name="password" minlength="5" require>
  </p>
  <input type="submit" value="Registrarse">
</form>