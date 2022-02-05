<?php
class Coche {
  // atributos o propiedades (en programación estructurada: variables)

  //PUBLIC: PODEMOS ACCEDER A ÉL DESDE CUALQUIER LUGAR, DENTRO DE CLASE ACTUAL
  //DENTRO DE CLASES QUE HEREDEN ESTA CLASE O FUERA DE LA CLASE
  public $color;

  // PROTECTED: PODEMOS ACCEDER A ELLOS DESDE LA CLASE QUE LOS DEFINE Y DESDE CLASES
  // QUE HEREDEN ESTA CLASE

  protected $marca;

  // PRIVATE: ÚNICAMENTE SE PUEDE ACCEDER DESDE ESTA CLASE, DE LA CLASE QUE LOS DEFINE
  private $modelo;
  public $velocidad;
  public $caballaje;
  public $plazas;

  public function __construct($color, $marca, $modelo, $velocidad, $caballaje, $plazas){
    $this->color = $color;
    $this->marca = $marca;
    $this->modelo = $modelo;
    $this->velocidad = $velocidad;
    $this->caballaje = $caballaje;
    $this->plazas = $plazas;

  }

  // metodos, son acciones que hace el objeto (antes funciones, en P.E.)
  public function getColor(){
    // busca en esta clase la propiedad x
    return $this->color;
  }

  public function setColor($color){
    $this->color = $color;
  }

  public function acelerar(){
    $this->velocidad++;
  }

  public function frenar(){
    $this->velocidad--;
  }

  public function getVelocidad(){
    return $this->velocidad;
  }

  public function setModelo($modelo){
    $this->modelo = $modelo;
  }

  public function mostrarInformacion(Coche $miObjeto){
    if (is_object($miObjeto)) {
      $informacion = "<h1>Información del miObjeto</h1>";
      $informacion .= "Color: ".$miObjeto->color;
      $informacion .= "<br>Modelo: ".$miObjeto->modelo;
      $informacion .= "<br>Velocidad: ".$miObjeto->velocidad;
    } else {
      $informacion = "Tu dato es este: $miObjeto";
    }
    return $informacion;
  }

} //fin definición de la clase


?>