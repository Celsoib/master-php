<?php

class Usuario {
  // VAMOS A DEFINIR PROPIEDADES PRIVADAS PARA QUE SE PUEDAN ACCEDER A ELLAS SÓLO MEDIANTE MÉTODOS
  private $id;
  private $nombre;
  private $apellidos;
  private $email;
  private $password;
  private $rol;
  private $imagen;
  private $db;

  public function __construct() {
    // CONEXIÓN A LA BD
    $this->db = Database::connect();
  }

  // GETTERS
  function getId(){
    return $this->id;
  }

  function getNombre(){
    return $this->nombre;
  }

  function getApellidos(){
    return $this->apellidos;
  }

  function getEmail(){
    return $this->email;
  }

  function getPassword(){
    return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost'=>4]);
  }

  function getRol(){
    return $this->rol;
  }

  function getImagen(){
    return $this->imagen;
  }

  // SETTERS
  function setId($id){
    $this->id = $id;
  }

  function setNombre($nombre){
    $this->nombre = $this->db->real_escape_string($nombre);
  }

  function setApellidos($apellidos){
    $this->apellidos = $this->db->real_escape_string($apellidos);
  }

  function setEmail($email){
    $this->email = $this->db->real_escape_string($email);
  }

  function setPassword($password){
    $this->password = $password;
    // $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);

  }

  function setRol($rol){
    $this->rol = $this->db->real_escape_string($rol);
  }

  function setImagen($imagen){
    $this->imagen = $this->db->real_escape_string($imagen);
  }

  public function save() {
    $sql = "INSERT INTO usuarios VALUES(NULL,'{$this->getNombre()}','{$this->getApellidos()}','{$this->getEmail()}','{$this->getPassword()}','user',null);";
    $save = $this->db->query($sql);

    $result = false;

    if($save) {
      $result = true;
      // echo "result true";
    } else {
      echo "result false";
    }

    return $result;
  }

  public function login() {
    $result = false;
    $email = $this->email;
    $password = $this->password;

    // COMPROBAR SI EXISTE EL USUARIO
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $login = $this->db->query($sql);

    if($login && $login->num_rows == 1) {
      // SACAMOS EL OBJETO QUE ME DEVUELVE LA BD
      $usuario = $login->fetch_object();

      //VERIFICAR LA CONTRASEÑA
      $verify = password_verify($password, $usuario->passwordd);

      if($verify){
        $result = $usuario;
      }
    }

    return $result;

  }

}


?>