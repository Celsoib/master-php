<h1>BIENVENIDO A MI WEB CON MVC</h1>
<?php
  require_once "autoload.php";

  // LO QUE ESTAMOS HACIENDO AQUÍ EN EL INDEX SE CONOCE COMO CONTROLADOR FRONTAL,
  // ES DECIR, QUE SE ENCARGAN DE CARGAR UN FICHERO, UNA ACCIÓN U OTRA FUNCIÓN QUE ME
  // LLEGA POR LA URL.
  // CONTROLADOR FRONTA, ES EL ÚNICO FICHERO QUE SE ENCARGA DE CARGARLO ABSOLUTAMENTE TODO

  if (isset($_GET['controller'])) {
    $nombre_controlador = $_GET['controller'].'Controller';
  } else {
    echo 'La página que buscas no existe';
    exit(); //PARA QUE LO DE ABAJO NO ME EJECUTE MÁS
  }

  if(class_exists($nombre_controlador)){

    $controlador = new $nombre_controlador();

    if (isset($_GET['action']) && method_exists($controlador,$_GET['action'])) {
      $action = $_GET['action'];
      $controlador->$action();
    } else {
      echo "La página que buscas no existe 1";
    }

  } else {
    echo "La página que buscas no existe 2";
  }


?>