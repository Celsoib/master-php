<?php

  class NotaController {
    public function listar(){
      // MODELO
      require_once 'models/nota.php';

      // LÓGICA ACCIÓN CONTROLADOR
      $nota = new Nota();
      $notas = $nota->conseguirTodos('notas');

      // VISTA
      require_once 'views/nota/listar.php';


    }

    public function crear(){
      // MODELO
      require_once 'models/nota.php';

      // LÓGICA ACCIÓN CONTROLADOR
      $nota = new Nota();
      $nota->setUsuario_id(1);
      $nota->setTitulo("Nota desde PHP MVC");
      $nota->setDescripcion("Descripción de mi nota");
      $guardar = $nota->guardar();

      // VISTA
      // header('Location: views/nota/listar.php');
      header('Location: index.php?controller=Nota&action=listar');
    }

    public function borrar(){

    }
  }

?>