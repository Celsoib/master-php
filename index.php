<?php

require_once 'autoload.php';

/*
$usuario = new Usuario();

echo $usuario->nombre;
echo "<br>";
echo $usuario->email;

$categoria = new Categoria();
echo "<br>".$categoria->nombre;
*/

// ESPACIOS DE NOMBRES Y PAQUETES

  // CON PHP7 SE PUEDE HACER ESTO:
  // use MisClases\Entrada, MisClases\Categoria, MisClases\Usuario;

  use MisClases\Entrada;
  use MisClases\Categoria;
  use MisClases\Usuario;
  use PanelAdministrador\Usuario as UsuarioAdmin; // COMO NO PUEDO TENER DOS ARCHIVOS CON EL MISMO
                                  // NOMBRE LO RENOMBRAMOS

  class Principal {
    public $usuario;
    public $categoria;
    public $entrada;

    public function __construct(){
      $this->usuario = new Usuario();
      $this->categoria = new Categoria();
      $this->entrada = new Entrada();
    }

    public function getUsuario() {
      return $this->usuario;
    }

    public function getCategoria(){
      return $this->categoria;
    }

    public function getEntrada(){
      return $this->entrada;
    }

    public function setUsuario($usuario){
      $this->usuario = $usuario;
    }

    public function setCategoria($categoria){
      $this->categoria = $categoria;
    }

    public function setEntrada($entrada){
      $this->entrada = $entrada;
    }

  }
  // OBJETO PRINCIPAL
  $principal = new Principal();
  // var_dump($principal->usuario);
  $metodos = get_class_methods($principal);

  $busqueda = array_search('setEntrada',$metodos);
  var_dump($busqueda); //EN PANTALLA IMPRIME EL ÍNDICE 6, SI EL MÉTODO NO EXISTE, DA false

  // OBJETO OTRO PAQUETE
  $usuario = new UsuarioAdmin();
  var_dump($usuario);

  // COMPRUEBA SI EXISTE UNA CLASE TANTO EN EL FICHERO ACTUAL COMO DE MANERA GLOBAL EN EL PROYECTO
  $clase = @class_exists('PanelAdministrador\Usuario2');//EL @ ESCONDE LOS WARNINGS(ERRORES) PQ SI HAY UN FALLO DE QUE NO PUEDE ABRIR UN ARCHIVO INEVITABLEMENTE ME VA A DEVOLVER UN ERROR
  if($clase){
    echo "<h1>La clase SÍ existe</h1>";
  } else {
    // PARA QUE FUNCIONE EL else TENEMOS QUE USAR include EN EL autoload.php
    echo "<h1>La clase NO existe</h1>";
  }

?>