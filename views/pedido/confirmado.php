<?php if(isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete'): ?>
  <h1>Tu pedido se ha confirmado</h1>

  <p>
    Tu pedido ha sido guardodo con éxito, una vez que realices la transferencia
    bancaria a la cuenta 321321 con el coste del pedido, será procesado y enviado.
  </p>

  <?php if(isset($pedido)): ?>
    <br>
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


<?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete'): ?>
  <h1>Tu pedido NO se ha podido procesar</h1>
<?php endif; ?>