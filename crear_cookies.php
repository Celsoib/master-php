<?php

/*
Cookie: es un fichero que se almacena en el ordenador del usuario que visita
la web con el fin de recordar datos o rastrear el comportamiento del mismo
en la web.

En el servidor se guarda una referencia pero casi toda la información se guarda
en los ficheros de las cookies del propio navegador web y eso luego se envía
al servidor.

Con las cookies vamos a poder persistir alguna información del usuario, hacer un
login y persistir los datos de cierta información que el usuario vaya haciendo
en la web
*/

//crear cookie
//setcookie("nombre", "valor que solo puede ser texto", caducidad, ruta, dominio);

//cookie básica
setcookie("micookie","valor de mi galleta");

echo "<br>";

//cookie con expiración
setcookie("unyear","valor de mi cookie de 365 días", time()+(60*60*24*365));

header('Location:ver_cookies.php');

?>
