<?php
  abstract class Ordenador {
    public $encendido;

    // CUANDO YO DEFINO UNA FUNCIÓN COMO ABSTRACTA NO LE PUEDO INDICAR QUÉ FUNCIONALIDAD VA
    // A TENER DENTRO, SIMPLEMENTE LA DEFINO, DIGO QUE VA A EXISTIR. HAY QUE DEFINIR EN LA
    // CLASE HIJO
    abstract public function encender();

    public function apagar(){
      $this->encendido = false;
    }
  }

  class PcAsus extends Ordenador{
    public $software;

    public function arrancarSoftware(){
      $this->software = true;
    }

    public function encender(){
      $this->encendido = true;
    }
  }

  $ordenador = new PcAsus();
  $ordenador->arrancarSoftware();
  $ordenador->encender();
  $ordenador->apagar();
  var_dump($ordenador);
?>