<?php

trait Utilidades {
  public function mostrarNombre(){
    echo "<h1>El nombre es ".$this->nombre."</h1>";
  }
}

class Coche {
  public $nombre;
  public $marca;

  use Utilidades;
}

class Persona {
  public $nombre;
  public $apellidos;

  use Utilidades;
}

class VideoJuego {
  public $nombre;
  public $anio;

  use Utilidades;
}

$coche = new Coche();
$coche->nombre = "Ferrari Testarosa";

$persona = new Persona();
$persona->nombre = "Celso";

$videojuego = new VideoJuego();
$videojuego->nombre = "PES 2022";

$coche->mostrarNombre();
$persona->mostrarNombre();
$videojuego->mostrarNombre();
?>