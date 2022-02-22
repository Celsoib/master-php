<?php

class Database {
  public static function connect() {
    $db = new mysqli('localhost','root','','tienda_master');
    $db->query("SET NAMES 'utf8'");
    return $db;
  }
}

// LO ÚNICO QUE TENDRÍA QUE HACER ES USAR EL MÉTODO db QUE ME DEVUELVE ESTE MÉTODO
// PARA HACER LA CONEXIÓN A LA BD Y HACER CONSULTAS

?>