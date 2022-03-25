<h1>Mis pedidos</h1>
<table>
  <tr>
    <th>N° Pedido</th>
    <th>Coste</th>
    <th>Fecha</th>
  </tr>

  <?php
    while($ped = $pedidos->fetch_object()):
  ?>
    <tr>
      <td>
        <a href="<?=base_url?>pedido/detalle&id=<?=$ped->id?>"><?=$ped->id?></a>
      </td>
      <td>
          <?=$ped->coste?> Gs
      </td>
      <td> <!-- EL ELEMENTO NO ES UN OBJETO ES UN ARRAY, ASÍ QUE unidades ES UN ÍNDICE DE ESE ARRAY -->
          <?=$ped->fecha?>
      </td>
    </tr>

  <?php endwhile; ?>
</table>