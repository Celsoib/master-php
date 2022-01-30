<?php

  function mostrarError($errores, $campo){
    $alerta = "";
    if (isset($errores[$campo]) && !empty($campo)) {
      $alerta = "<div class='alerta alerta-error'>".$errores[$campo]."</div>";
    }

    return $alerta;
  }

  // no hace falta hacer session_star porque en el index.php ya lo hereda de la cabecera.php
  function borrarErrores(){
    $borrado = false;

    if (isset($_SESSION["errores"])) {
      $_SESSION["errores"] = null;
      $borrado = session_unset();
    }

    if (isset($_SESSION["completado"])) {
      $_SESSION["completado"] = null;
      $borrado = session_unset();
    }

    return $borrado;
  }

  function conseguirCategorias($conexion){
    $sql = "SELECT * FROM categorias ORDER BY id ASC;";
    $categorias = mysqli_query($conexion,$sql);
    $resultado = array();

    if ($categorias && mysqli_num_rows($categorias) >= 1) {
      $resultado = $categorias;
    }

    return $resultado;
  }

  function conseguirUltimasEntradas($conexion) {
    $sql = "SELECT e.*,c.nombre AS categoria FROM entradas e
            JOIN categorias c ON c.id = e.categoria_id
            ORDER BY e.id DESC LIMIT 4";
    $entradas = mysqli_query($conexion,$sql);
    $resultado = array();

    if ($entradas && mysqli_num_rows($entradas) >= 1) {
      $resultado = $entradas;
    }

    return $entradas;

  }

?>