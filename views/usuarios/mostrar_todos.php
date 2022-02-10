
<h1>Listado de Usuarios</h1>
<!--AHORA VAMOS A HACER QUE NOS SAQUE UN array DE objetos CON EL fetch_object-->
<?php while($usuario = $todos_los_usuarios->fetch_object()): ?>
  <?=$usuario->email?> - <?=$usuario->fecha?> <br>
<?php endwhile; ?>