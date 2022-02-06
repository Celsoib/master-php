<?php

// HERENCIA: LA POSIBILIDAD DE COMPARTIR ATRIBUTOS Y MÉTODOS ENTRE CLASES, ES DECIR, HEREDAR

  class Persona {
    public $nombre;
    public $apellido;
    public $altura;
    public $edad;

    public function __construct(){
      $this->edad = 18;
    }

    public function getNombre(){
      return $this->nombre;
    }

    public function getApellido(){
      return $this->apellido;
    }

    public function getAltura(){
      return $this->altura;
    }

    public function getEdad(){
      return $this->edad;
    }

    public function setNombre($nombre){
      $this->nombre = $nombre;
    }

    public function setApellido($apellido){
      $this->apellido = $apellido;
    }

    public function setAltura($altura){
      $this->altura = $altura;
    }

    public function setEdad($edad){
      $this->edad = $edad;
    }

    public function hablar(){
      return "Estoy hablando";
    }

    public function caminar(){
      return "Estoy caminando";
    }
  }

  class Informatico extends Persona {
    public $lenguajes;

    public function __construct(){
      parent::__construct(); //PARA HEREDAR EL CONSTRUCTOR DEL PADRE, EN ESTE CASO LA EDAD
    }

    public function sabeLenguajes($lenguajes){
      $this->lenguajes = $lenguajes;
    }
    public function programar(){
      return "Estoy programando";
    }

    public function repararOrdenador(){
      return "Reparar ordenadores";
    }

    public function hacerOfimatica(){
      return "Estoy escribiendo en word";
    }
  }

?>