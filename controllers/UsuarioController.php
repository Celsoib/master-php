<?php

require_once "models/usuario.php";

class usuarioController {
  public function index() {
    echo "Controlador Usuarios, Acción index";
  }
  public function registro() {
    require_once 'views/usuario/registro.php';
  }
  public function save() {
    if(isset($_POST)){
      $usuario = new Usuario();
      $usuario->setNombre($_POST['nombre']);
      $usuario->setApellidos($_POST['apellidos']);
      $usuario->setEmail($_POST['email']);
      $usuario->setPassword($_POST['password']);

      // var_dump($usuario);

      // EN EL OBJETO YA TENGO TODOS LOS DATOS DEL FORMULARIO GUARDADO, AHORA LQ TENGO QUE HACER ES
      // LLAMAR AL MÉTODO save PARA GUARDAR TODO LQ YO TENGO EN MI OBJETO GUARDADO, TODOS LOS DATOS DEL
      // FORMULARIO ME LO GUARDA EN UN REGISTRO EN LA BD

      $save = $usuario->save();

      // LO QUE HAREMOS SI EL REGISTRO HA SIDO REGISTRADO SATISFACTORIAMENTE SERÁ CREAR UNA
      // SESIÓN PARA MOSTRARLA LUEGO

      if($save){
        // SE SE GUARDÓ CORRECTAMENTE CREAMOS UNA
        // SESIÓN QUE SE LLAME register Y QUE TENGA COMO VALOR complete
        $_SESSION['register'] = "complete";
      }else {
        // SI CASO DE QUE NO failed
        $_SESSION['register'] = "failed1";
      }
    }else {
      // SI NO E LLEGA POR POST NADA
      $_SESSION['register'] = "failed2";
    }
    // REDIRIGUIR SIEMPRE, EN CUALQUIER CASO A REGISTRO
    header("Location:".base_url.'usuario/registro');

    // LUEGO EN registro.php MOSTRAMOS LA SESIÓN QUE HEMOS CREADO 

  }
}


?>