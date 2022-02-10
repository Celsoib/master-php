<?php
  // AQUÍ DENTRO VOY A CREAR UNA CLASE ESTÁTICA PARA IR YO CONSULTÁNDOLA Y
  // CONECTARME A LA BD.

  class database {
    public static function conectar (){
      $conexion = new mysqli("localhost","root","","notas_master");
      $conexion->query("SET NAMES 'utf8'");

      // LO RETORNAMOS PARA PODER UTILIZAR LA CONEXIÓN EN EL RESTO DEL SITIO,
      // PARA PODER HACER CONSULTA O LO QUE QUIERA.
      return $conexion;
    }
  }




?>