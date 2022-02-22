<!-- ESTE VA A SER UN CONTROLADOR FRONTAL, SE VA A ENCARGAR DE RECO🇩🇪 PARÁMETROS
POR LA URL Y VER A QUÉ CONTROLADOR PERTENECE, CARGAR ESE ARCHIVO, CARGAR ESE
OBJETO Y LUEGO LLAMAR AL MÉTODO CORRESPONDIENTE QUE NOS TIENE QUE LLEGAR POR LA
URL -->

<?php
  // CARGAMOS EL autoload PARA TENER ACCESO A TODOS LOS OBJETOS, A TODAS LAS CLASES
  require_once "autoload.php";
  require_once "views/layout/header.php";
  require_once "views/layout/sidebar.php";

  // LO QUE ESTAMOS HACIENDO AQUÍ EN EL INDEX SE CONOCE COMO CONTROLADOR FRONTAL,
  // ES DECIR, QUE SE ENCARGAN DE CARGAR UN FICHERO, UNA ACCIÓN U OTRA FUNCIÓN QUE ME
  // LLEGA POR LA URL.
  // CONTROLADOR FRONTAL, ES EL ÚNICO FICHERO QUE SE ENCARGA DE CARGARLO ABSOLUTAMENTE TODO

  // COMPRUEBO SI ME LLEGA EL CONTROLADOR POR LA URL
  if (isset($_GET['controller'])) {
    // EN EL CASO DE QUE LLEGUE LA URL ME GENERA ESTA VARIABLE
    $nombre_controlador = $_GET['controller'].'Controller';
  } else {
    // EN EL CASO DE QUE NO LLEGUE LA URL ME CORTA LA EJECUCIÓN
    echo 'La página que buscas no existe';
    exit(); //PARA QUE LO DE ABAJO NO ME EJECUTE MÁS
  }

  // COMPRUEBO SI EXISTE EL CONTROLADOR
  if(class_exists($nombre_controlador)){
    // SI EXISTE ESA CLASE ENTONCES CREO EL OBJETO
    $controlador = new $nombre_controlador();

    // LUEGO COMPRUEBO SI ME LLEGA LA ACCIÓN Y SI EL MÉTODO EXISTE DENTRO DEL
    // CONTROLADOR
    if (isset($_GET['action']) && method_exists($controlador,$_GET['action'])) {
      // SI ES ASÍ LLAMA E INVOCA A ESE MÉTODO
      $action = $_GET['action'];
      $controlador->$action();
    } else {
      // EN EL CASO DE QUE NO QUE DIGA QUE LA PÁGINA NO EXISTE
      echo "La página que buscas no existe 1";
    }
  // SI NO SE CUMPLE LA PRIMERA CONDICIÓN QUE NOS DIGA TAMBIÉN QUE LA PÁGINA NO EXISTE
  } else {
    echo "La página que buscas no existe 2";
  }

require_once "views/layout/footer.php";

?>