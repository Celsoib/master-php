<?php

interface Ordenador {
  public function encender();
  public function apagar();
  public function reiniciar();
  public function desfragmentar();
  public function detectarUSB();
}

class iMAC implements Ordenador {
  private $modelo;

  function getModelo() {
    return $this->modelo;
  }

  function setModelo($modelo) {
    $this->modelo = $modelo;
  }

  public function encender(){

  }
  public function apagar(){

  }
  public function reiniciar(){

  }
  public function desfragmentar(){

  }
  public function detectarUSB(){

  }

}

$maquintos = new iMAC();
$maquintos->setModelo("Mackbook pro");
var_dump($maquintos);
echo $maquintos->getModelo();

?>