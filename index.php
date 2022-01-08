<?php

// //abrir archivo
// $archivo = fopen("fichero_texto.txt","a+");

// //leer contenido
// while(!feof($archivo)){
//   $contenido = fgets($archivo);
//   echo $contenido."<br>";
// }

// //escribir
// fwrite($archivo, "soy un texto metido desde php***");

// //cerrar archivo
// fclose($archivo);


//copiar
// copy('fichero_texto.txt', 'fichero_copiado.txt') or die("Error al copiar");

//renombrar
// rename('fichero_copiado.txt', 'archivito_recopiadito.txt');

//eliminar
// unlink('archivito_recopiadito.txt') or die("Error al borrar");

if(file_exists("ficheros_texto.txt")){
  echo "El archivo existe";
} else{
  echo "No existe";
}