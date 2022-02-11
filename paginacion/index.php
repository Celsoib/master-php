<?php

// PARA TENER DISPONIBLE LAS LIBRERÍAS
require_once '../vendor/autoload.php';

// CONEXIÓN BD
$conexion = new mysqli("localhost","root","","notas_master");
$conexion->query("SET NAMES 'utf8'");

// CONSULTA PARA CONTAR ELEMENTOS TOTALES
// ESTO ES IMPORTANTE PORQUE PARA HACER LA OPERACIÓN INTERNA DE CUANTAS PÁGINAS VA A HABER

$consulta = $conexion->query("SELECT * FROM notas");
$numero_elementos = $consulta->num_rows;

// ES LO MISMO QUE LO DE ARRIBA SOLO QUE DE OTRA FORMA E INCLUSO MÁS ÓPTIMO QUE HACER UN mysqli EN
// num_rows

// $consulta = $conexion->query("SELECT COUNT(id) as total FROM notas");
// $numero_elementos = $consulta->fetch_object()->total;

$numero_elementos_pagina = 2;

// HACER PAGINACION
$pagination = new Zebra_Pagination();

// NUMERO TOTAL ELEMENTOS A PAGINAR
$pagination->records($numero_elementos);

// NUMERO DE ELEMENTOS POR PÁGINA
$pagination->records_per_page($numero_elementos_pagina);

// ESTO LO QUE HACE ES CONSEGUIR LA PÁGINA DE LA URL, SI NO EXISTE ESE PARÁMETRO LO DEFINE CON UN 1
$page = $pagination->get_page(); //PARA SACAR LA PÁGINA ACTUAL


$empieza_aqui = (($page - 1)*$numero_elementos_pagina);

$sql = "SELECT * FROM notas LIMIT $empieza_aqui, $numero_elementos_pagina";

$notas = $conexion->query($sql);

//                                   $page = 1       (((1-1)*2), 2) SERÍA (0,2) MUESTRA 2 ELEMENTOS A PARTIR DEL 0
//                                   $page = 2       (((2-1)*2), 2) SERÍA (2,4) MUESTRA 2 ELEMENTOS A PARTIR DEL 2

// CARGO EL CSS PARA QUE ME PINTE LOS NÚMEROS DE LA PAGINACIÓN
echo '<link rel="stylesheet" href="../vendor/stefangabos/zebra_pagination/public/css/zebra_pagination.css" type="text/css">';

// RECORRO LOS ELEMENTOS PARA MOSTRARLO
while($nota = $notas->fetch_object()){
  echo "<h1>{$nota->titulo}</h1>";
  echo "<h3>{$nota->descripcion}</h3><hr>";
}

// PARA SACAR LOS LINKS DE LAS PÁGINAS, RENDERIZO LA PAGINACIÓN
$pagination->render();







?>