<?php

  require_once '../vendor/autoload.php';

  $frutas = array("manzanas","naranjas","sandias");

  \FB::log($frutas);

  $nombres = array("ejecutivo" => "Antonio","empleado" => "juan");

  \FB::log($nombres);

  echo "HOla mundo ".$nombres['ejecutivo'];

  \FB::log("Mustrme en consola");

?>