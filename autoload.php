<?php

  // BUSCA TODAS LAS CLASES QUE TENGA DENTRO DEL DIRECTORIO clases
  // SIMPLEMENTE VA CAMBIANDO LE NOMBRE DE LA CLASE Y VA HACIENDO EL include

  function autocargar_clases($class){ //class = ES LA CLASE QUE QUIERO CARGAR
    //  CARGAR TODOS LOS ARCHIVOS DE LAS CLASES QUE TENGA

    require_once 'clases/' . $class . '.php';
  }

  // ESTA FUNCIÓN LO QUE HACE ES UTILIZAR LA FUNCIÓN autocargar_clases PARA BUSCAR
  // TODAS LAS CLASES DEL DIRECTORIO QUE YO LE INDIQUE
  spl_autoload_register('autocargar_clases');

?>