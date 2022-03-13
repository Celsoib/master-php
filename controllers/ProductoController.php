<?php

require_once "models/producto.php";

class productoController {
  public function index() {
    // RENDERIZAR VISTA
    require_once 'views/producto/destacado.php';
  }

  public function gestion(){
    Utils::isAdmin();

    $producto = new Producto();
    $productos = $producto->getAll();


    require_once "views/producto/gestion.php";
  }

  public function crear(){
    Utils::isAdmin();

    require_once "views/producto/crear.php";
  }

  public function save(){
    Utils::isAdmin();

    if(isset($_POST)){
      $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
      $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
      $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
      $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
      $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
      // $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;

      if($nombre && $descripcion && $precio && $stock && $categoria){
        $producto = new Producto();
        $producto->setNombre($nombre);
        $producto->setDescripcion($descripcion);
        $producto->setPrecio($precio);
        $producto->setStock($stock);
        $producto->setCategoria_id($categoria);

        // GUARDAR LA IMAGEN
        // $_FILES[] ES UNA VARIABLE SUPERGLOBAL DONDE SE GUARDAN LOS ARCHIVOS, EL ÍNDICE
        //DE LA VARIABLE SE DEBE LLAMAR imagen PQ ESE NOMBRE PUSIMOS EN NUESTRO FORMULARIO
        $file = $_FILES['imagen'];

        // RECOGER EL nombre DEL file PARA GUARDARLO EN LA BD
        $filename = $file['name'];

        // RECOGER EL TIPO DE FORMATO DE ARCHIVO (jpg, pdf, png, etc)
        // CADA EXTENSIÓN DE ARCHIVO TIENE UN mimetype DIFERENTE
        $mimetype = $file['type'];

        // var_dump($file);
        // die();

        if($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/git"){

          if(!is_dir('uploads/images')){
            mkdir('uploads/images',0777,true);
          }

          $producto->setImagen($filename);
          move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);
        }

        $save = $producto->save();
        if($save){
          $_SESSION['producto'] = "complete";
        } else {
          $_SESSION['producto'] = "failed";
        }
      }else {
        $_SESSION['producto'] = "failed";
      }
    }else {
      $_SESSION['producto'] = "failed";
    }
    header("Location:".base_url."producto/gestion");
  }


} //FIN CLASE


?>