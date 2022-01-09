<?php

/*
Ejercicio 1: Crear una sesión que aumente su valor en 1 o disminuya
en 1 en función de si el parámetro get counter está a 1 o a 0
*/

session_start();

if (!isset($_SESSION["numero"])) {
  $_SESSION["numero"] = 0;
}

if (isset($_GET["counter"]) && $_GET["counter"] == 1) {
  # code...
  $_SESSION["numero"]++;
}

if (isset($_GET["counter"]) && $_GET["counter"] == 0) {
  # code...
  $_SESSION["numero"]--;
}

?>

<h1>El valor de la sesión es: <?= $_SESSION["numero"]?></h1>
<a href="ejercicio1.php?counter=1">Aumentar valor</a>
<a href="ejercicio1.php?counter=0">Disminuir valor</a>