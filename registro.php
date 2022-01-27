<?php

  if (isset($_POST["submit"])) {
    // conexion a la bd
    require_once "includes/conexion.php";

    //si no existe $_SESSION lo creamos
    if (!isset($_SESSION)) {
      session_start();
    }

    // recoger los valores del formulario del registro

    // operador condicional
    if (isset($_POST["nombre"])) {
      $nombre = mysqli_real_escape_string($conexion,$_POST["nombre"]);
    } else {
      $nombre = false;
    }
    // operador tenario, más optimizado
    $apellidos = isset($_POST["apellidos"]) ? mysqli_real_escape_string($conexion,$_POST["apellidos"]) : false;
    $email = isset($_POST["email"]) ? mysqli_real_escape_string($conexion,$_POST["email"]) : false;
    $password = isset($_POST["password"]) ? mysqli_real_escape_string($conexion,$_POST["password"]) : false;

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

    // validar apellidos
    if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)) {
      $apellidos_validado = true;
    } else {
      $apellidos_validado = false;
      $errores["apellidos"] = "Los apellidos no es válido";
    }

    // validar el email
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_validado = true;
    } else {
      $email_validado = false;
      $errores['email'] = "El email no es válido";
    }

    // validar el contraseña
    if (!empty($password)) {
      $password_validado = true;
    } else {
      $password_validado = false;
      $errores["password"] = "El password no es válido";
    }

    $guardar_usuario = false;

    if (count($errores) == 0) {
      $guardar_usuario = true;

      // cifrar la contraseña con: password_hash
      $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);

      // var_dump($password);
      // var_dump($password_segura);
      // var_dump(password_verify($password, $password_segura));
      // die();

      // insertar usuario en la tabla de usuarios de la bd
      $sql = "INSERT INTO usuarios VALUES(null,'$nombre','$apellidos','$email','$password_segura',CURDATE());";
      $guardar = mysqli_query($conexion, $sql);

      // var_dump(mysqli_error($conexion));
      // die();

      if ($guardar) {
        $_SESSION['completado'] = "El registro se ha completado con éxito";
      } else {
        $_SESSION['errores']['general'] = "¡Fallo al guardar el usuario!";
      }

    } else {
      $_SESSION["errores"] = $errores;

    }
    // var_dump($errores);
  }

  header("Location: index.php");
?>