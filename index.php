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
  }
  // OBJETO PRINCIPAL
  $principal = new Principal();
  var_dump($principal->usuario);

  // OBJETO OTRO PAQUETE
  $usuario = new UsuarioAdmin();
  var_dump($usuario);
?>