<?php

//para mostrar el valor de las cookies tengo que usar $_COOKIE,
//una variable superglobal, es un array asociativo

if(isset($_COOKIE['micookie'])){
  echo "<h1>".$_COOKIE['micookie']."</h1>";
} else {
  echo "No existe la cookie";
}

echo "<br>";

if(isset($_COOKIE['unyear1'])){
  echo "<h1>".$_COOKIE['unyear']."</h1>";
} else {
  echo "No existe la cookie";
}


/*
YA SABEMOS COMO CREAR LAS COOKIES Y COMO GUARDARLAS, ESTAMOS VIENDO
COMO SE ALMACENAN EN EL NAVEGADOR COMO UN FICHERO Y ESTE FICHERO SE
LE ENVÍA AL SERVIDOR CADA VEZ QUE CARGAMOS LA WEB Y UNA VEZ QUE LE
LLEGAN AL SERVIDOR YA HACEMOS UNA FUNCIONALIDAD U OTRA.
*/

?>
<br>
<a href="crear_cookies.php">Crear mis galletas</a>
<br>
<a href="borrar_cookies.php">Borrar mis galletas</a>