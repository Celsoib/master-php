<?php
  // EN EL DIRECTORIO NO HACE FALTA PONER "../config/database.php" PQ AL FINAL
  // ModeloBase Y TODO SE INCLUYE EN EL index.php CON LO CUAL DESDE EL index.php
  // TENGO ACCESO A TODOS LOS DIRECTORIOS SIN MODIFICAR AQUÍ NADA.
  require_once 'config/database.php';

  class ModeloBase {
    public $db;

    public function __construct(){
      $this->db = database::conectar();
    }
    public function conseguirTodos($tabla){
      $query = $this->db->query("SELECT * FROM $tabla ORDER BY id DESC");
      return $query;
    }
  }

?>