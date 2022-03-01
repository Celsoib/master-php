<?php

class Producto {
  // VAMOS A DEFINIR PROPIEDADES PRIVADAS PARA QUE SE PUEDAN ACCEDER A ELLAS SÓLO MEDIANTE MÉTODOS
  private $id;
  private $categoria_id;
  private $nombre;
  private $descripcion;
  private $precio;
  private $stock;
  private $oferta;
  private $fecha;
  private $imagen;
  private $db;

  public function __construct() {
    // CONEXIÓN A LA BD
    $this->db = Database::connect();
  }

  //GETTERS
  function getId(){
    return $this->id;
  }
  function getCategoria_id(){
    return $this->categoria_id;
  }
  function getNombre(){
    return $this->nombre;
  }
  function getDescripcion(){
    return $this->descripcion;
  }
  function getPrecio(){
    return $this->precio;
  }
  function getStock(){
    return $this->stock;
  }
  function getOferta(){
    return $this->oferta;
  }
  function getFecha(){
    return $this->fecha;
  }
  function getImagen(){
    return $this->imagen;
  }

  //SETTERS
  function setId($id){
    $this->id = $id;
  }
  function setCategoria_id($categoria_id){
    $this->categoria_id = $categoria_id;
  }
  function setNombre($nombre){
    $this->nombre = $nombre;
  }
  function setDescripcion($descripcion){
    $this->descripcion = $descripcion;
  }
  function setPrecio($precio){
    $this->precio = $precio;
  }
  function setStock($stock){
    $this->stock = $stock;
  }
  function setOferta($oferta){
    $this->oferta = $oferta;
  }
  function setFecha($fecha){
    $this->fecha = $fecha;
  }
  function setImagen($imagen){
    $this->imagen = $imagen;
  }

  //MÉTODOS
  public function getAll(){
    $productos = $this->db->query("SELECT * FROM productos ORDER BY id DESC;");
    return $productos;
  }

}

?>