<?php
  class Usuario {
    public $nombre;
    public $email;

    public function __construct(){
      $this->nombre = "Celso Ibáñez";
      $this->email = "celso@celso.com";

      echo "Creando el objeto creado <br>";
    }

    // ESTE VA A SER EL COMPORTAMIENTO QUE TENGA LA CLASE CUANDO INTENTE IMPRIMIRLA
    public function __toString(){
      return "Hola, {$this->nombre}, estás registrado con {$this->email}";
    }
    // ESTO SIRVE CUANDO LA REFERENCIA A ESTE OBJETO, A ESTA CLASE DESAPAREZCA CUANDO YA NO
    // VAYA A EXISTIR VA REFERENCIA AL OBJETO DESTRUIR
    public function __destruct(){
      echo "<br>destruyendo el objeto";
    }
  }

  $usuario = new Usuario();

  // echo $usuario->nombre;
  echo $usuario;

  // for ($i = 0; $i <= 200 ; $i++) {
  //   echo $i."<br>";
  // }
?>