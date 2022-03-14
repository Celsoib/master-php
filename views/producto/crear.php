<?php if(isset($edit) && isset($pro) && is_object($pro)): ?>
  <h1>Editar producto <?=$pro->nombre?></h1>
  <?php $url_action = base_url."producto/save&id=".$pro->id;?>
<?php else: ?>
  <h1>Crear nuevos productos</h1>
  <?php $url_action = base_url."producto/save"?>
<?php endif; ?>

  <div class="form_container">

  <form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
    <!-- enctype="multipart/form-data" PERMITE ENVIAR FICHERO DENTRO DEL FORMULARIO-->
    <p>
      <label for="nombre">Nombre</label>
      <input type="text" name="nombre" value="<?=isset($pro) && is_object($pro) ? $pro->nombre : ''; ?>">
    </p>
    <p>
      <label for="descripcion">Descripción</label>
      <textarea name="descripcion"><?=isset($pro) && is_object($pro) ? $pro->descripcion : ''; ?></textarea>
    </p>
    <p>
      <label for="precio">Precio</label>
      <input type="text" name="precio" value="<?=isset($pro) && is_object($pro) ? $pro->precio : ''; ?>">
    </p>
    <p>
      <label for="stock">Stock</label>
      <input type="number" name="stock" value="<?=isset($pro) && is_object($pro) ? $pro->stock : ''; ?>">
    </p>
    <p>
      <label for="categoria">Categoria</label>
      <?php $categorias = Utils::showCategorias(); ?>
      <select name="categoria">
        <?php while($cat = $categorias->fetch_object()): ?>
          <option value="<?=$cat->id?>" <?=isset($pro) && is_object($pro) && $cat->id == $pro->categoria_id ? 'selected' : ''; ?>>
            <!-- $cat->id == $pro->categoria_id
            ACÁ DECIMOS: SI LA CATEGORÍA QUE ESTOY RECORRIENDO EN ESTE MOMENTO ACTUAL ($cat->id) ES LA MISMA QUE TIENE EL OBJETO DEL
            PRODUCTO ($pro->categoria_id) DE LA BD GUARDAD DENTRO DE SU COLUMNA categoria_id O DE SU CAMPO categoria_id, SI ES ASÍ
            MARCAMEL COMO SELECCIONADO ('selected') PQ ESA ES LA CATEGORÍA QUE TIENE ESE PRODUCTO, SINO NO ME MUESTRE NADA-->
            <?=$cat->nombre?>
          </option>
        <?php endwhile; ?>
      </select>
    </p>
    <p>
      <label for="imagen">Imagen</label>
      <?php if(isset($pro) && is_object($pro) && !empty($pro->imagen)): ?>
        <img src="<?=base_url?>uploads/images/<?=$pro->imagen?>" class="thumb">
      <?php endif; ?>
      <input type="file" name="imagen">
    </p>

    <input type="submit" value="Guardar">

  </form>
</div>