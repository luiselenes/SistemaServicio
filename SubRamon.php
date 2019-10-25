<?php
session_start();
if ($_FILES['archivo']["error"] > 0){
  echo "Error: " . $_FILES['archivo']['error'] . "<br>";
  }
else
  {
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    echo "Nombre: " . $_FILES['archivo']['name'] . "<br>";
    echo "Tipo: " . $_FILES['archivo']['type'] . "<br>";
    echo "Tamaño: " . ($_FILES["archivo"]["size"] / 1024) . " kB<br>";
    echo "Carpeta temporal: " . $_FILES['archivo']['tmp_name'];
    move_uploaded_file($_FILES['archivo']['tmp_name'],"Documentos/".$_SESSION['Usuario']. $_FILES['archivo']['name']);
        //<em id="__mceDel"> </em>
    $from = "sistemaserviciotecc.000webhostapp.com";
    //$to = "jscervantesmedina@gmail.com";
    $to = $_SESSION['Correo'];
    $subject = "Subida de Archivo Con Exito";
    $message = "Usted Subio su Archivo ".$_FILES['archivo']['name']. " Con Exito nwn" ;
    $headers = "De:" . $from;
    mail($to,$subject,$message, $headers);
    echo "Se Envio Un Correo de Notificacion.";
  }
?>