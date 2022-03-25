<?php

require_once "models/producto.php";

class carritoController {
  public function index() { //LISTAR CARRITO, MOSTRAR LOS DATOS

    // var_dump($_SESSION['carrito']);
    if(isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1){
      $carrito = $_SESSION['carrito'];
    }else {
      $carrito = array();
    }

    require_once 'views/carrito/index.php';
  }

  public function add() {
    if(isset($_GET['id'])) {
      $producto_id = $_GET['id'];
    }else {
      header("Location:".base_url);
    }

    if(isset($_SESSION['carrito'])){
      $counter = 0;
      foreach($_SESSION['carrito'] as $indice => $elemento){ //RECORREME EL CARRITO Y EN CADA ITERACIÓN SACAME EL ÍNDICE DE ESE ARRAY Y CONSIGUEME EL PRODUCTO O EL ELEMENTO
        if($elemento['id_producto'] == $producto_id) { //SI LO QUE YA TENGO EN MI CARRITO ES UN PRODUCTO QUE COINCIDE CON EL producto_id QUE ME LLEGA POR LA URL A ESTE MÉTODO, AUMENTA LAS UNIDADES
          $_SESSION['carrito'][$indice]['unidades']++;
          $counter++;
        }
      }
    }

    if(!isset($counter) || $counter == 0){
      // CONSEGUIR PRODUCTO
      $producto = new Producto();
      $producto->setId($producto_id);
      $producto = $producto->getOne();

      //AHORA LO QUE VAMOS A HACER ES OBTENER LOS DATOS DE ESE OBJETO Y PASARSELO AL CARRITO

      //AÑADIR AL CARRITO
      if(is_object($producto)){
        // EL CARRITO VA A SER UN ARRAY Y AHÍ DENTRO VOY A IR GUARDANDO COSAS
        $_SESSION['carrito'][] = array( //DE ESTA MANERA SE PUEDE AÑADIR UN ELEMENTO AL CARRITO
          "id_producto" => $producto->id, //EL id LO OBTENEMOS DEL OBJETO
          "precio" => $producto->precio,
          "unidades" => 1, //PORQUE DESDE EL BOTÓN SOLO PODEMOS AÑADIR UN PRODUCTO A LA VEZ
          "producto" => $producto //TAMBIÉN PODEMOS AÑADIR EL PRODUCTO COMPLETO PARA LUEGO NO TENER QUE HACER CONSULTAS A LA BD, DIRECTAMENTE DESDE LA SESIÓN.
          //DE ESTA MANERA AÑADIMOS COSAS AL CARRITO CUANDO EL CARRITO TODAVÍA NO EXISTE
        );
      }
    }

    header("Location:".base_url."carrito/index");

    // VAMOS A HACER UNA CONSULTA PORQUE NECESITAMOS SACAR EL PRODUCTO QUE VAMOS A AÑADIR AL
    // CARRITO, EL PRECIO QUE TIENE Y LAS UNIDADES QUE VAMOS A PEDIR, SOBRE TODO NECESITAMOS
    // SACAR EL PRECIO QUE TIENE EL PRODUCTO

  }

  public function delete() {
    if(isset($_GET['index'])){
      $index = $_GET['index'];
      unset($_SESSION['carrito'][$index]);
    }
    header("Location:".base_url."carrito/index");

  }
  public function up() {
    if(isset($_GET['index'])){
      $index = $_GET['index'];
      $_SESSION['carrito'][$index]['unidades']++;
    }
    header("Location:".base_url."carrito/index");

  }
  public function down() {
    if(isset($_GET['index'])){
      $index = $_GET['index'];
      $_SESSION['carrito'][$index]['unidades']--;
      if($_SESSION['carrito'][$index]['unidades'] == 0){
        unset($_SESSION['carrito'][$index]);

      }

    }
    header("Location:".base_url."carrito/index");

  }

  public function delete_all() { //PARA ELIMINAR TODO LO QUE HAY EN EL CARRITO
    unset($_SESSION['carrito']);
    header("Location:".base_url."carrito/index");
  }
}


?>