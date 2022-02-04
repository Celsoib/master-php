<?php
  if (!isset($_POST['busqueda'])) {
    header("Location: index.php");
  }
?>

<?php require_once 'includes/cabecera.php';?>
    <!-- Barra lateral  -->
<?php require_once 'includes/lateral.php';?>

    <!-- Caja principal  -->
    <div id="principal">
      <h1>Búsqueda: <?=$_POST['busqueda']?></h1>

      <?php
        $entradas  = conseguirEntradas($conexion, null, null, $_POST['busqueda']);

        if(!empty($entradas) && mysqli_num_rows($entradas) >= 1):
          // por cada fila que recorra que me cree una variable 'entrada' con un array asociativo
          while($entrada = mysqli_fetch_assoc($entradas)):
      ?>
            <article class="entrada">
              <a href="entrada.php?id=<?=$entrada['id']?>">
                <h2><?=$entrada['titulo']?></h2>
                <span class="fecha"><?=$entrada['categoria'].' | '.$entrada['fecha']?></span>
                <p>
                  <?=substr($entrada['descripcion'],0,160)."..."?>
                </p>
              </a>
            </article>
      <?php
          endwhile;
        else:
      ?>
          <div class="alerta">
            No hay entradas en esta categoría
          </div>
      <?php
        endif;
      ?>
    </div> <!-- fin principal -->
  <!-- Pie de página  -->
  <?php require_once "includes/pie.php";?>

