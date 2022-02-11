<?php

  require_once '../vendor/autoload.php';

  $foto_original = 'mifoto2.jpg';
  $guardar_en = 'fotomodificada.png';

  $thumb = new PHPThumb\GD($foto_original);

  // REDIMENCIONAR
  $thumb->resize(250,250); //SI PONEMOS 500 X 500 O MÁS, AJUSTA AL RATIO DE LA IMG PARA QUE NO SE DEFORME

  // RECORTAR
  // $thumb->crop(250,250,120,120);
  $thumb->cropFromCenter(150); //RECORTA PARTIENDO DEL CENTRO
  $thumb->cropFromCenter(150,100); //RECORTA DESDE EL CENTRO PARA QUE TENGA ANCHO DE 200 Y DE ALTO 100px


  $thumb->show();
  $thumb->save($guardar_en, 'png'); //SEGUNDO PARÁMETRO POR SI QUERAMOS CAMBIAR DE FORMATO DE IMG

  // LO QUE NOSOTROS HACEMOS EN UN FORMULARIO ES GUARDARLO EN EL DISCO DURO DEL SERVIDOR
  // Y LUEGO PODEMOS HACER VERSIONES EN MINIATURA QUE TAMBIÉN SE VAN A ESTAR GUARDANDO CON
  // EL MÉTODO save() Y TAMBIÉN PODEMOS ESTAR GUARDANDO EN LA BD


?>