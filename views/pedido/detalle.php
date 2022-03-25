<h1>Detalle del pedido</h1>

<?php if(isset($pedido)): ?>
  <br>
  <h3>Datos de envío:</h3>
  Provincia: <?=$pedido->provincia?> <br>
  Ciudad: <?=$pedido->localidad?> <br>
  Dirección: <?=$pedido->direccion?> <br><br>              

  <h3>Datos del pedido:</h3>
  Número de pedido: <?=$pedido->id?> <br>
  Total a pagar: <?=$pedido->coste?> Gs <br>
  Productos:

    <table>
      <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>
      </tr>
      <?php while($producto = $productos->fetch_object()): ?>
        <tr>
          <td>
            <?php if($producto->imagen != null): ?>
              <img src="<?=base_url?>uploads/images/<?=$producto->imagen?>" alt="Foto camiseta" class="img_carrito">
            <?php else: ?>
              <img src="<?=base_url?>assets/img/camiseta.png" alt="Foto camiseta" class="img_carrito">
            <?php endif; ?>
          </td>
          <td>
              <a href="<?=base_url?>producto/ver&id=<?=$producto->id?>"><?=$producto->nombre?></a>
          </td>
          <td>
              <?=$producto->precio?>
          </td>
          <td> <!-- EL ELEMENTO NO ES UN OBJETO ES UN ARRAY, ASÍ QUE unidades ES UN ÍNDICE DE ESE ARRAY -->
              <?=$producto->unidades?>
          </td>
        </tr>
      <?php endwhile; ?>
    </table>
<?php endif; ?>

<!-- EVIDENTEMENTE ESTO LO PODRÍAMOS MEJORAR CREANDO UN HELPER QUE CARGARA UNA VISTA CONCRETA PARA
LUEGO REUTILIZARLA, PERO COMO NO VAMOS A COPIAR MÁS ESTE CÓDIGO, YA NO VAMOS A UTILIZALA
MÁS EN OTRA COSA NO VAMOS A DARLE TANTA VUELTA -->