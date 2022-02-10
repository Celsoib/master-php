<h1>Listado de notas</h1>
<!--AHORA VAMOS A HACER QUE NOS SAQUE UN array DE objetos CON EL fetch_object-->
<?php while($nota = $notas->fetch_object()): ?>
  <?=$nota->titulo?> - <?=$nota->fecha?> <br>
<?php endwhile; ?>