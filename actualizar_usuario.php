<?php

  if (isset($_POST)) {
    // conexion a la bd
    require_once "includes/conexion.php";

    // recoger los valores del formulario del actualización
    // operador condicional
    if (isset($_POST["nombre"])) {
      $nombre = mysqli_real_escape_string($conexion,$_POST["nombre"]);
    } else $nombre = false;
    // operador tenario, más optimizado
    $apellidos = isset($_POST["apellidos"]) ? mysqli_real_escape_string($conexion,$_POST["apellidos"]) : false;
    $email = isset($_POST["email"]) ? mysqli_real_escape_string($conexion, trim($_POST["email"])) : false; //trim() para que se guarde sin espacios

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

    $guardar_usuario = false;

    if (count($errores) == 0) {
      $guardar_usuario = true;
      $usuario = $_SESSION['usuario'];

      // COMPROBAR SI EL email YA EXISTE
      $sql = "SELECT id,email FROM usuarios WHERE email = '$email'";
      $isset_email = mysqli_query($conexion,$sql);
      $isset_user = mysqli_fetch_assoc($isset_email);
      // $idusuario = $_SESSION['usuario']['id']; esto se puede usar en vez del $usuario['id'] sin la necesidad de concatenar

      if ($isset_user['id'] == $usuario['id'] || empty($isset_user)) {
        // actualizar usuario en la tabla de usuarios de la bd
        $sql = "UPDATE usuarios
                SET nombre = '$nombre', apellidos = '$apellidos', email = '$email'
                WHERE id = ".$usuario['id'];;
        $guardar = mysqli_query($conexion, $sql);
        // var_dump($sql);
        // die();

        if ($guardar) {
          $_SESSION['usuario']['nombre'] = $nombre;
          $_SESSION['usuario']['apellidos'] = $apellidos;
          $_SESSION['usuario']['email'] = $email;


          $_SESSION['completado'] = "Tus datos se han actualizado con éxito";
        } else {
          $_SESSION['errores']['general'] = "¡Fallo al actualizar tus datos!";
        }
      }else {
        $_SESSION['errores']['general'] = "El usuario ya existe";
      }


    }else {
      $_SESSION["errores"] = $errores;
    }
  }
  header("Location: mis_datos.php");
?>