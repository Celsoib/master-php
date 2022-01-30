<?php require_once 'includes/cabecera.php';?>
    <!-- Barra lateral  -->
<?php require_once 'includes/lateral.php';?>

    <!-- Caja principal  -->
    <div id="principal">
      <h1>Últimas entradas</h1>

      <?php
        $entradas = conseguirUltimasEntradas($conexion);
        if(!empty($entradas)):
          // por cada fila que recorra que me cree una variable 'entrada' con un array asociativo
          while($entrada = mysqli_fetch_assoc($entradas)):
      ?>
            <article class="entrada">
              <a href="">
                <h2><?=$entrada['titulo']?></h2>
                <span class="fecha"><?=$entrada['categoria'].' | '.$entrada['fecha']?></span>
                <p>
                  <?=substr($entrada['descripcion'],0,160)."..."?>
                </p>
              </a>
            </article>
      <?php
          endwhile;
        endif;
      ?>

      <div id="ver-todas">
        <a href="">Ver todas las entradas</a>
      </div>
    </div> <!-- fin principal -->



  <!-- Pie de página  -->
  <?php require_once "includes/pie.php";?>

</body>
</html>
