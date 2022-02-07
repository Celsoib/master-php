<?php

  class Persona {
    private $nombre;
    private $edad;
    private $ciudad;

    public function __construct($nombre,$edad,$ciudad){
      $this->nombre = $nombre;
      $this->edad = $edad;
      $this->ciudad = $ciudad;
    }

    public function __call($name,$arguments){
      $prefix_metodo = substr($name,0,3);
      if($prefix_metodo == 'get'){
        $nombre_metodo = substr(strtolower($name),3);

        if (!isset($this->$nombre_metodo)) {
          return "El método no existe";
        }

        return $this->$nombre_metodo;// $this->nombre
      } else {
        return "El método no existe";
      }
    }
  }

  $persona = new Persona("Paco",12,"Concep");
  echo $persona->getNombre();
  echo $persona->getEdad();
  echo $persona->getCiudad();
  echo $persona->getHola();

?>