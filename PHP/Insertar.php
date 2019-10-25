<?php
require_once 'Conexion.php';
$bd = new Conexion(); 
//NumPart Monto Desc NumFact NomEmp
$NumPart = mysqli_real_escape_string($bd,$_POST['NumPart']);
$Monto = mysqli_real_escape_string($bd,$_POST['Monto']);
$Desc = mysqli_real_escape_string($bd,$_POST['Desc']);
$NumFact = mysqli_real_escape_string($bd,$_POST['NumFact']);
$NomEmp = mysqli_real_escape_string($bd,$_POST['NomEmp']);
$bd->query("INSERT INTO `partidas`(`Id`, `NumPartida`, `Monto`, `Descripcion`, `Factura`, `Empresa`) VALUES (null,".$NumPart."
,".$Monto.",'".$Desc."',".$NumFact.",'".$NomEmp."')")or die($bd->error);
$bd->close();
echo 'Partida Registrada Con Exito';
?>