<?php

class Usuario {
  // LAS COSNTANTES DEBEN SER EN MAYUSCULAS
  const URL_COMPLETA = "http://localhost";
  public $email;
  public $password;

  public function getEmail(){
    return $this->email;
  }

  public function getPassword(){
    return $this->password;
  }

  public function setEmail($email){
    $this->email = $email;
  }

  public function setPassword($password){
    $this->password = $password;
  }

}


// ::self SE REFIRE A UNA PROPIEDAD A NIVEL DE CLASE
// $this-> SE REFIERE A UNA PROPIEDAD A NIVEL DE OBJETO

// TAMBIÉN FUNCIONA PQ AL SER UNA PROPIEDAD ESTÁTICA ESTÁ DEFINIDA A
// NIVEL DE CLASE, NO A NIVEL DE OBJETO
// echo Usuario::URL_COMPLETA;

$usuario = new Usuario();
echo $usuario::URL_COMPLETA;
var_dump($usuario);

?>