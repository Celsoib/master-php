<h1>Gestionar categorías</h1>

<!-- HACEMOS UN BUCLE PARA PODER MOSTRAR LAS CATEGORÍAS QUE HAY Y LQ ME HA SACADO DE LA BD-->

<!--LO QUE VOY A HACER ES ITERAR TODOS LOS OBJETOS QUE TENGO EN EL ARRAY OBJETOS
QUE ME DEVUELVE LA BD Y EN CADA ITERACIÓN ME CREA UNA VARIABLE categoria Y AHÍ
TENGO UN OBJETO CON TODOS LOS DATOS DE LA CATEGORÍA, LUEGO SIMPLEMENTE LOS IMPRIMO -->

<!-- VAMOS A HACERLO DENTRO DE UNA TABLA, Y VOY A GENERAR UNA FILA POR CADA ITERACIÓN DE BUCLE -->

<a href="<?=base_url?>categoria/crear" class="button button-small">
  Crear categoría
</a>

<table>
  <tr>
    <th>ID</th>
    <th>NOMBRE</th>
  </tr>
  <?php while($cat = $categorias->fetch_object()):?>
    <tr>
      <td><?=$cat->id;?></td>
      <td><?=$cat->nombre;?></td>
    </tr>
  <?php endwhile;?>
</table>