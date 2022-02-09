<?php

  class NotaController {
    public function listar(){
      // MODELO
      require_once 'models/nota.php';

      // LÓGICA ACCIÓN CONTROLADOR
      $nota = new Nota();
      $nota->setNombre("Hola");
      $nota->setContenido("Hola Mundo PHP MCV");

      // VISTA
      require_once 'views/nota/listar.php';
      

    }

    public function crear(){

    }

    public function borrar(){

    }
  }

?>