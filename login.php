<?php

// iniciar la sesión y la conexión a bd
require_once "includes/conexion.php";

// recoger los datos del formulario
if (isset($_POST)) {
  // borrar error antiguo
  if (isset($_SESSION['error_login'])) {
    session_unset();
  }

  // recoger datos del formulario
  $email = trim($_POST['email']);
  $password = $_POST['password'];

  // consulta para comprobar las credenciales del usuario
  $sql = "SELECT * FROM usuarios WHERE email = '$email'";
  $login = mysqli_query($conexion,$sql);

  if ($login && mysqli_num_rows($login) == 1) {
    $usuario = mysqli_fetch_assoc($login);
    // var_dump($usuario);
    // die();

    // comprobar la contraseña
    $verify = password_verify($password,$usuario['passwordd']);
    // var_dump($password);
    // var_dump($usuario['passwordd']);
    // var_dump($verify);
    // die();
    if ($verify) {
      // utilizar una sesión para guardar los datos del usuario logueado
      $_SESSION['usuario'] = $usuario;
    } else {
      // si algo falla enviar una sesión con el fallo
      $_SESSION['error_login'] = "Login incorrecto";
    }
  } else {
    // mensaje de error
    $_SESSION['error_login'] = "Login incorrecto";
  }
}
// redirigir al index.php
header("Location: index.php");

