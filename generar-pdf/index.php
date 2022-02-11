<?php
  require '../vendor/autoload.php'; //CON ESTO YA TENGO DISPONIBLE LAS CLASES QUE TENGO DE vendor

  use Spipu\Html2Pdf\Html2Pdf; //NAMESPACE

  $html2pdf = new Html2Pdf();

  // RECOGER LA VISTA A IMPRIMIR
  ob_start(); //ABRO EL ob_start
  require_once 'pdf_para_generar.php'; //LQ HAYA DESPUÉS DEL ob_start ME LO VA A RECOGER
  $html = ob_get_clean(); //Y LO VOY A PODER GUARDAR EN UNA VARIABLE CON LA FUNCIÓN ob_get_clean()
  // TODO LO QUE HAY ENTRE EL ob_start() Y EL ob_get_clean() LO PODEMOS GUARDAR DENTRO DE UNA VARIABLE


  $html2pdf->writeHTML($html);
  $html2pdf->output('pdf_generado.pdf'); //NOMBRE DEL ARCHIVO PDF AL DESCARGAR

?>