<h1>Crear nuevos productos</h1>

<div class="form_container">

  <form action="<?=base_url?>producto/save" method="POST" enctype="multipart/form-data">
    <!-- enctype="multipart/form-data" PERMITE ENVIAR FICHERO DENTRO DEL FORMULARIO-->
    <p>
      <label for="nombre">Nombre</label>
      <input type="text" name="nombre">
    </p>
    <p>
      <label for="descripcion">Descripción</label>
      <textarea name="descripcion"></textarea>
    </p>
    <p>
      <label for="precio">Precio</label>
      <input type="text" name="precio">
    </p>
    <p>
      <label for="stock">Stock</label>
      <input type="number" name="stock">
    </p>
    <p>
      <label for="categoria">Categoria</label>
      <?php $categorias = Utils::showCategorias(); ?>
      <select name="categoria">
        <?php while($cat = $categorias->fetch_object()): ?>
          <option value="<?=$cat->id?>">
            <?=$cat->nombre?>
          </option>
        <?php endwhile; ?>
      </select>
    </p>
    <p>
      <label for="imagen">Imagen</label>
      <input type="file" name="imagen">
    </p>

    <input type="submit" value="Guardar">

  </form>
</div>