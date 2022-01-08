<?php

//crear directorio o carpeta
if(!is_dir("mi_carpeta")){
  mkdir("mi_carpeta", 0777) or die("No se puede crear la carpeta");
}else {
  echo "Ya existe la carpeta";
}

//borrar directorio
// rmdir("mi_carpeta");

//recorrer el contenido del directorio
echo "<hr> <h1>Contenido carpeta</h1>";
if($gestor = opendir('./mi_carpeta')){
  while(false !== ($archivo = readdir($gestor))){ //mientras que haya archivos dentro de el directorio que voy a leer
    if($archivo != '.' && $archivo != '..'){
      echo $archivo."<br>";
    }
  }
}