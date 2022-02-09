<?php

  // LO RECOMENDABLE DENTRO DEL CONTROLADOR SERÍA CREARME DIFERENTES ACCIONES, DIFERENTES
  // MÉTODOS EN UNA CLASE

  // ENTONCES UN CONTROLADOR SE SEPARA BÁSICAMENTE EN ACCIONES
  // TENEMOS EL CONTROLADOR EN SÍ Y ESE CONTROLADOR ENCAPSULA ACCIONES

  class UsuarioController {

    public function mostrarTodos(){
      require_once "models/usuario.php";

      $usuario = new Usuario();

      $todos_los_usuarios = $usuario->conseguirTodos();

      require_once "views/usuarios/mostrar_todos.php";
    }

    public function crear(){
      require_once 'views/usuarios/crear.php';
    }

  }

?>