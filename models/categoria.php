<!-- UN MODELO REPRESENTA A LOS REGISTROS DE LA TABLA categoria DE LA BD, LA REPRESENTACIÓN
DE CADA UNO DE ELLOS SERÍA UN MODELO, CUANDO YO CREO UN OBJETO CON EL MODELO LO QUE HAGO
ES SIMULAR COMO SI FUERA A CREAR UN REGISTRO EN LA BD, Y NO LO SIMULA SINO QUE AL FINAL
ESTAMOS TRABAJANDO CON UN REGISTRO DE LA BD O REPRESENTA ESO, UN OBJETO REPRESENTA UN REGISTRO.
Y LUEGO DENTRO DE ESTE MODELO VOY A HACER TODO LO RELACIONADO CON LA INTERACTUACIÓN CON
LA BD, GUARDAR COSAS, SACAR COSAS, Y LUEGO EN LOS CONTROLADORES YO LLAMOS A LOS MODELOS
PARA QUE ME DEN ESA INFORMACIÓN DE LA BD Y ESOS TIPOS DE OBJETOS Y ESAS ENTIDADES -->

<?php

class Categoria {

  private $id;
  private $nombre;
  private $db;

  public function __construct() {
    // CONEXIÓN A LA BD
    $this->db = Database::connect();
  }

  function getId(){
    return $this->id;
  }

  function getNombre(){
    return $this->nombre;
  }

  function setId($id){
    $this->id = $id;
  }

  function setNombre($nombre){
    $this->nombre = $this->db->real_escape_string($nombre);
  }

  // FUNCIÓN PARA LISTAR CATEGORÍAS
  public function getAll(){
    $categorias = $this->db->query("SELECT * FROM categorias ORDER BY id DESC;");
    return $categorias;
  }

  public function getOne(){
    $categoria = $this->db->query("SELECT * FROM categorias WHERE id={$this->getId()};");
    return $categoria->fetch_object(); //PARA QUE ME SAQUE DIRECTAMENTE EL ÚNICO OBJETO QUE ME PUEDE SACAR
  }

  public function save(){
    $sql = "INSERT INTO categorias VALUES(NULL,'{$this->getNombre()}');";
    $save = $this->db->query($sql);

    $result = false;

    // EN EL CASO DE QUE NOS DEVUELVE BIEN EL save QUE NOS DEVUELVA true
    if($save) {
      $result = true;
    }
    // SINO QUE NOS DEVUELVA false
    return $result;
  }

}

?>