<?php
require_once 'Conexion.php';
$bd = new Conexion(); 
//NumPart Monto Desc NumFact NomEmp
$NumPart = mysqli_real_escape_string($bd,$_POST['numpart']);
$Desc = mysqli_real_escape_string($bd,$_POST['Desc']);
echo $NumPart;
echo $Desc;
$bd->query("INSERT INTO `partidas`(`NumPartida`,`Descripcion`) VALUES (".$NumPart."
,'".$Desc."')")or die($bd->error);
$bd->close();
echo 'Partida Registrada Con Exito';
?>