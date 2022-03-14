<?php

class Producto {
  // VAMOS A DEFINIR PROPIEDADES PRIVADAS PARA QUE SE PUEDAN ACCEDER A ELLAS SÓLO MEDIANTE MÉTODOS
  private $id;
  private $categoria_id;
  private $nombre;
  private $descripcion;
  private $precio;
  private $stock;
  private $fecha;
  private $imagen;
  private $oferta;
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
  function getFecha(){
    return $this->fecha;
  }
  function getImagen(){
    return $this->imagen;
  }
  function getOferta(){
    return $this->oferta;
  }

  //SETTERS
  function setId($id){
    $this->id = $id;
  }
  function setCategoria_id($categoria_id){
    $this->categoria_id = $categoria_id;
  }
  function setNombre($nombre){
    $this->nombre = $this->db->real_escape_string($nombre);
  }
  function setDescripcion($descripcion){
    $this->descripcion = $this->db->real_escape_string($descripcion);
  }
  function setPrecio($precio){
    $this->precio = $this->db->real_escape_string($precio);
  }
  function setStock($stock){
    $this->stock = $this->db->real_escape_string($stock);
  }
  function setFecha($fecha){
    $this->fecha = $fecha;
  }
  function setImagen($imagen){
    $this->imagen = $imagen;
  }
  function setOferta($oferta){
    $this->oferta = $this->db->real_escape_string($oferta);
  }

  //MÉTODOS
  public function getAll(){
    $productos = $this->db->query("SELECT * FROM productos ORDER BY id DESC;");
    return $productos;
  }

  public function getRandom($limit){
    $productos = $this->db->query("SELECT * FROM productos ORDER BY RAND() LIMIT $limit;");
    return $productos;
  }

  public function getOne(){
    $producto = $this->db->query("SELECT * FROM productos WHERE id = {$this->getId()}");
    return $producto->fetch_object(); //PARA QUE SEA UN OBJETO TOTALMENTE USABLE
  }

  public function save() {

    $sql = "INSERT INTO productos VALUES(NULL, {$this->getCategoria_id()},'{$this->getNombre()}','{$this->getDescripcion()}',{$this->getPrecio()},{$this->getStock()},CURDATE(),'{$this->getImagen()}',null);";

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

  public function edit() {

    $sql = "UPDATE productos SET nombre='{$this->getNombre()}', descripcion='{$this->getDescripcion()}', precio={$this->getPrecio()}, stock={$this->getStock()}, categoria_id={$this->getCategoria_id()}";

    if($this->getImagen() != null){
      $sql .= ", imagen='{$this->getImagen()}'";
    }


    $sql .= " WHERE id={$this->id};";

    // echo $this->db->error;  		//DEPURAR MYSQL CON ESTE CÓDIGO
    // var_dump($sql);
    // die();

    $save = $this->db->query($sql);

    $result = false;

    if($save) {
      $result = true;
    }

    return $result;
  }

  public function delete() {
    $sql = "DELETE FROM productos WHERE id={$this->id}";
    $delete = $this->db->query($sql); //ACCESO A EL OBJETO sql Y UTILIZO query PARA PASARLE MI sql

    $result = false;

    if($delete) {
      $result = true;
    }

    return $result;
  }

}

?>