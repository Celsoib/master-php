<?php

/*
Ejercicio 3. Hacer una interfaz de usuario (formulario) con dos inputs y
4 botones, uno para sumar, restar, dividir y multiplicar.
*/
$resultado = false;

  if (isset($_POST["n1"]) && isset($_POST["n2"])) {
    if (isset($_POST["sumar"])) {
      $resultado = "El resultado es: ".($_POST["n1"] + $_POST["n2"]);
    }
    if (isset($_POST["restar"])) {
      $resultado = "El resultado es: ".($_POST["n1"] - $_POST["n2"]);
    }
    if (isset($_POST["multiplicar"])) {
      $resultado = "El resultado es: ".($_POST["n1"] * $_POST["n2"]);
    }
    if (isset($_POST["dividir"])) {
      $resultado = "El resultado es: ".($_POST["n1"] / $_POST["n2"]);
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calculadora con PHP</title>
</head>
<body>
  <h1>Calculadora PHP</h1>
  <form action="" method="POST">
    <label for="n1">Número 1</label>
    <input type="number" name="n1">

    <label for="n2">Número 2</label>
    <input type="number" name="n2">

    <input type="submit" value="Sumar" name="sumar">
    <input type="submit" value="Restar" name="restar">
    <input type="submit" value="multiplicar" name="multiplicar">
    <input type="submit" value="dividir" name="dividir">

  </form>

  <?php
  //resultado
    if ($resultado != false) :
      echo "<h2>$resultado</h2>";
    endif;
  ?>
</body>
</html>