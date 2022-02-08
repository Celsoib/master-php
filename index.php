<?php

  // CAPTURAR EXCEPCIONES, EN CÓDIGO SUSCEPTIBLE A ERRORES
  try{

    if(isset($_GET['id'])){
      echo "<h1>El parámetro es: {$_GET['id']}</h1>";
    }else {
      throw new Exception("Faltan parámetros por la URL");
    }

  } catch(Exception $e){
    echo "Ha habido un error: ".$e->getMessage();

  } finally {
    // FINALLY: SIRVE PARA INDICARLE CUANDO SE HA ACABADO ESTA ESTRUCTURA
    // AUNQUE NO SE USE MUCHO, BÁSICAMENTE SIRVE PAR AHACER ALGO CUANDO SE
    // ACABE EL TRY Y CATCH
    echo "<br>Todo correcto";
  }

?>