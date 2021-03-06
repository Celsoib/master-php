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

  public function getOneByUser(){
    $sql = "SELECT p.id, p.coste FROM pedidos p "
            //."INNER JOIN lineas_pedidos lp ON lp.pedido_id = p.id "
            ."WHERE p.usuario_id = {$this->getUsuario_id()} "
            ."ORDER BY id DESC LIMIT 1";

    $pedido = $this->db->query($sql);

    // echo $sql;
    // echo $this->db->error;
    // die();

    return $pedido->fetch_object(); //PARA QUE SEA UN OBJETO TOTALMENTE USABLE
  }

  public function getAllByUser(){
    $sql = "SELECT p.* FROM pedidos p "
            ."WHERE p.usuario_id = {$this->getUsuario_id()} "
            ."ORDER BY id DESC";

    $pedido = $this->db->query($sql);

    return $pedido; //PARA QUE SEA UN OBJETO TOTALMENTE USABLE
  }


  // VAMOS A HACER UNA CONSULTA QUE ME SAQUE TODOS LOS PRODUCTOS EN BASE A UN
  // id DE PEDIDO QUE LE VAMOS A PASAR

  public function getProductosByPedido($id){
    // $sql = "SELECT * FROM productos WHERE id IN
    //           (SELECT producto_id FROM lineas_pedidos WHERE pedido_id = {$id})";
            // ESA CONSULTA ME VA A SACAR TODOS LOS PRODUCTOS QUE YO TENGA, QUE ESTÁN DENTRO
            // O QUE EXISTEN DENTRO DE LA TABLA lineas_pedidos CUYO id DEL PEDIDO SEA EL QUE LE
            // PASAMOS

    // PARA MOSTRAR LA CANTIDAD TENDRÍA QUE HACER UNA CONSULTA DE OTRA FORMA:
    $sql = "SELECT pr.*, lp.unidades FROM productos pr
            INNER JOIN lineas_pedidos lp ON lp.producto_id = pr.id
            WHERE lp.pedido_id = {$id}";

    $productos = $this->db->query($sql);

    return $productos;

    //SACAMOS EL PRODUCTOS QUE VA A CONTENER TODO EL RESULT SET O UNA VARIABLE
    //QUE ME VIENE DE LA BD

  }

  public function save() {

    $sql = "INSERT INTO pedidos VALUES(NULL, {$this->getUsuario_id()},'{$this->getProvincia()}','{$this->getLocalidad()}','{$this->getDireccion()}',{$this->getCoste()},'confirm',CURDATE(),CURTIME());";

    $save = $this->db->query($sql);

    $result = false;

    if($save) {
      $result = true;
    }

    return $result;
  }

  public function save_linea() {
    // SACAMOS CON UNA CONSULTA EL ÚLTIMO REGISTRO QUE HEMOS INSERTADO, ES
    // EL ÚLTIMO PEDIDO QUE HEMOS INSERTADO O REGISTRADO EN LA BD, EL ÚLTIMO INSERT

    // LAST_INSERT_ID() SACA LA CLAVE PRIMARIA O EL CAMPO id DEL ÚLTIMO INSERT QUE HEMOS
    // HECHO, EN ESTE CASO SERÍA LO DEL PEDIDO

    $sql = "SELECT LAST_INSERT_ID() as pedido";
    $query = $this->db->query($sql);
    $pedido_id = $query->fetch_object()->pedido; //FETCH_OBJECT PARA SABER QUÉ DATO ME DEVUELVE, ACCEDEMOS A LA PROPIEDAD PEDIDO

    // AHORA TENGO QUE INSERTAR EN LA TABLA DE "LINEA_PEDIDO" LOS PRODUCTOS Y
    // LA CANTIDAD DE LOS PRODUCTOS, PARA ESO TENGO QUE RECORRER MI CARRITO

    foreach($_SESSION['carrito'] as $elemento){
      $producto = $elemento['producto'];

      $insert = "INSERT INTO lineas_pedidos VALUES(NULL, {$pedido_id}, {$producto->id}, {$elemento['unidades']})";

      $save = $this->db->query($insert);

      // var_dump($producto);
      // var_dump($insert);
      // $this->db->error;
      // die();
    }

    // AHORA EN CADA ITERACIÓN QUE YO HAGA DEL PRODUCTO, EL CARRITO PUEDE TENER MIL FILAS
    // CON MIL PRODUCTOS PUES YO VOY A RECORRER CADA UNO DE ESAS FILAS Y EN CADA UNA DE ESAS
    // LO QUE YO VOY A HACER ES INSERTAR UN REGISTRO EN LA TABLA DE LINEAS_PEDIDO CON EL
    // pedido_id, EL producto_id Y LAS unidades

     $result = false;

    if($save) {
      $result = true;
    }

    return $result;

  }

  public function edit() {

    $sql = "UPDATE pedidos SET estado='{$this->getEstado()}'";
    $sql .= " WHERE id={$this->getId()};";

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

}

?>