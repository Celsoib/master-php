<?php

  namespace MisClases;

  class Usuario {
    public $nombre;
    public $email;

    public function __construct(){
      $this->nombre = "Celso Ibáñez";
      $this->email = "celso@celso.com";
    }

  }

?>