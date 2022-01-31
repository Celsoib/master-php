<?php

  if (isset($_POST)) {
    // conexion a la bd
    require_once "includes/conexion.php";

    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conexion,$_POST['nombre']) : false;

    // array errores
    $errores = array();

    // validar los datos antes de guardarlo en la bd
    // validar campo nombre
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
      $nombre_validado = true;
    } else {
      $nombre_validado = false;
      $errores["nombre"] = "El nombre no es válido";
    }

    if (count($errores) == 0) {
      $sql = "INSERT INTO categorias VALUES(null, '$nombre');";
      $guardar = mysqli_query($conexion,$sql);
      var_dump($guardar);
      die();
    }

  }

  header("Location: index.php");


?>