<?php

class Pedido {
  // VAMOS A DEFINIR PROPIEDADES PRIVADAS PARA QUE SE PUEDAN ACCEDER A ELLAS SÓLO MEDIANTE MÉTODOS
  private $id;
  private $usuario_id;
  private $provincia;
  private $localidad;
  private $direccion;
  private $coste;
  private $estado;
  private $fecha;
  private $hora;

  private $db;

  public function __construct() {
    // CONEXIÓN A LA BD
    $this->db = Database::connect();
  }

  // GETTERS
  public function getId(){
    return $this->id;
  }
  public function getUsuario_id(){
    return $this->Usuario_id;
  }
  public function getProvincia(){
    return $this->provincia;
  }
  public function getLocalidad(){
    return $this->localidad;
  }
  public function getDireccion(){
    return $this->direccion;
  }
  public function getCoste(){
    return $this->coste;
  }
  public function getEstado(){
    return $this->estado;
  }
  public function getFecha(){
    return $this->fecha;
  }
  public function getHora(){
    return $this->hora;
  }

  // SETTERS
  public function setId($id){
    $this->id = $id;
  }
  public function setUsuario_id($usuario_id){
    $this->Usuario_id = $usuario_id;
  }
  public function setProvincia($provincia){
    $this->provincia = $this->db->real_escape_string($provincia);
  }
  public function setLocalidad($localidad){
    $this->localidad = $this->db->real_escape_string($localidad);
  }
  public function setDireccion($direccion){
    $this->direccion = $this->db->real_escape_string($direccion);
  }
  public function setCoste($coste){
    $this->coste = $coste;
  }
  public function setEstado($estado){
    $this->estado = $estado;
  }
  public function setFecha($fecha){
    $this->fecha = $fecha;
  }
  public function setHora($hora){
    $this->hora = $hora;
  }


  //MÉTODOS
  public function getAll(){
    $productos = $this->db->query("SELECT * FROM pedidos ORDER BY id DESC;");
    return $productos;
  }

  public function getOne(){
    $producto = $this->db->query("SELECT * FROM pedidos WHERE id = {$this->getId()}");
    return $producto->fetch_object(); //PARA QUE SEA UN OBJETO TOTALMENTE USABLE
  }

  public function save() {

    $sql = "INSERT INTO pedidos VALUES(NULL, {$this->getUsuario_id()},'{$this->getProvincia()}','{$this->getLocalidad()}','{$this->getDireccion()}',{$this->getCoste()},'confirm',CURDATE(),CURTIME());";

    $save = $this->db->query($sql);

    // echo $sql;
    // echo "<br>";
    // echo $save;
    // echo "<br>";
    // echo $this->db->error;
    // die();

    $result = false;

    if($save) {
      $result = true;
    }

    return $result;
  }

}

?>