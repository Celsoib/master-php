<?php

require_once "configuracion.php";

Configuracion::setColor("blue");
Configuracion::setNewsletter(1);
Configuracion::setEntorno("localhost");

echo Configuracion::$color . "<br>";
echo Configuracion::$newsletter . "<br>";
echo Configuracion::$entorno . "<br>";

$configuracion = new Configuracion();
$configuracion::$color = "rojo";
echo $configuracion::$color;
var_dump($configuracion);
?>