<?php

  namespace PanelAdministrador;

  class Usuario {
    public $nombre;
    public $email;

    public function __construct(){
      $this->nombre = "Antonio Pineda";
      $this->email = "antonio@antonio.com";
    }

    public function informacion(){
      // echo __CLASS__;
      // echo __METHOD__;
      // echo __FILE__;
      // echo __TRAIT__;
      echo __NAMESPACE__;
    }
  }

?>