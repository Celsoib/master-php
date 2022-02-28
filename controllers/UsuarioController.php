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

      // VAMOS A COMPROBAR SI TODOS LOS CAMPOS QUE ME LLEGAN POR post EXISTEN
      // TAMBIÉN PODEMOS HACER UNA LIBRERÍA QUE NOS VALIDE LOS DATOS, PERO ESO LUEGO
      // TAREA: REALIZAR UNA VALIDACIÓN MÁS COMPLEJA Y SEGURA

      $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
      $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
      $email = isset($_POST['email']) ? $_POST['email'] : false;
      $password = isset($_POST['password']) ? $_POST['password'] : false;

      // COMPROBAMOS SI ALGUNOS DE LOS COMPOS ES false

      if($nombre && $apellidos && $email && $password) {

        // EN EL CASO DE QUE LOS DATOS ESTÉN VALIDADOS CORRECTAMENTE
        // PROCEDEMOS A ESTABLECER LOS VALORES
        $usuario = new Usuario();
        $usuario->setNombre($nombre);
        $usuario->setApellidos($apellidos);
        $usuario->setEmail($email);
        $usuario->setPassword($password);

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
          $_SESSION['register'] = "failed";
        }
      }else {
        $_SESSION['register'] = "failed";
      }

    }else {
      // SI NO E LLEGA POR POST NADA
      $_SESSION['register'] = "failed";
    }

    // REDIRIGUIR SIEMPRE, EN CUALQUIER CASO A REGISTRO
    header("Location:".base_url.'usuario/registro');

    // LUEGO EN registro.php MOSTRAMOS LA SESIÓN QUE HEMOS CREADO

  }

  public function login(){
    if(isset($_POST)){
      // IDENTIFICAR AL USUARIO

      // CONSULTA A LA BD
      $usuario = new Usuario();
      $usuario->setEmail($_POST['email']);
      $usuario->setPassword($_POST['password']);
      //ESTO HACE LA CONSULTA Y NOS DEVUELVE EL OBJETO DEL USUARIO IDENTIFICADO
      $identity = $usuario->login();

      // var_dump($identity);
      // die();

      // AHORA LQ TENEMOS QUE HACER ES UTILIZAR LAS SESIONES PARA MANTENER AL USUARIO IDENTIFICADO
      // CREAR LA SESIÓN
      if($identity && is_object($identity)){
        $_SESSION['identity'] = $identity;

        if($identity->rol == 'admin'){
          $_SESSION['admin'] = true;
        }
      }else {
        $_SESSION['error_login'] = 'Identificación fallida!!';
      }
    }
    // DE CUALQUIERA DE LAS FORMAS VAMOS A HACER UNA REDIRECCIÓN A:
    header("Location:".base_url);
  }

  public function logout(){
    if(isset($_SESSION['identity'])){
      unset($_SESSION['identity']);
    }
    if(isset($_SESSION['admin'])){
      unset($_SESSION['admin']);
    }
    header("Location:".base_url);
  }

} //FIN CLASE


?>