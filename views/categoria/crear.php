<h1>Crear una categoría</h1>

<form action="<?=base_url?>categoria/save" method="POST">
  <p>
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required>
  </p>
  <input type="submit" value="Guardar">
</form>