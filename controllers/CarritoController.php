<?php

require_once "models/producto.php";

class carritoController {
  public function index() { //LISTAR CARRITO, MOSTRAR LOS DATOS

    var_dump($_SESSION['carrito']);

    echo "Controlador Carrito, Acción index";
  }

  public function add() {
    if(isset($_GET['id'])) {
      $producto_id = $_GET['id'];
    }else {
      header("Location:".base_url);
    }

    if(isset($_SESSION['carrito'])){

    } else {
      // CONSEGUIR PRODUCTO
      $producto = new Producto();
      $producto->setId($producto_id);
      $producto = $producto->getOne();

      //AHORA LO QUE VAMOS A HACER ES OBTENER LOS DATOS DE ESE OBJETO Y PASARSELO AL CARRITO

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

  public function remove() {

  }

  public function delete_all() { //PARA ELIMINAR TODO LO QUE HAY EN EL CARRITO
    unset($_SESSION['carrito']);
    header("Location:".base_url."carrito/index");

  }
}


?>