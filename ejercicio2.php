<?php

/*
Ejercicio2
1. Una función
2. Validar un email con filter_var
3. Recoger una variable por get y validarla
4. Mostrar los resultados
*/

function validarEmail($email){
  $status = "No válido";
  if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
    # code...
    $status = "Válido";
  }
  return $status;
}

if (isset($_GET["email"])) {
  # code...
  echo validarEmail($_GET["email"]);
} else {
  echo "Pasa por get un email";
}