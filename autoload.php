<?php

  //ESTA FUNCIÓN ENTRA EN LA CARPETA DE controllers Y HACE UN INCLUDE DE
  //CADA UNO DE LOS CONTROLADORES
  function controllers_autoload($classname){
    include 'controllers/' . $classname . '.php';
  }

  spl_autoload_register('controllers_autoload');

?>