<?php
require_once 'Conexion.php';
$bd = new Conexion(); 
//NumPart Monto Desc NumFact NomEmp
$NumPart = mysqli_real_escape_string($bd,$_POST['NumPart']);
$Desc = mysqli_real_escape_string($bd,$_POST['Desc']);
$bd->query("UPDATE `partidas` SET `Descripcion`='".$Desc."' WHERE `NumPartida` = ".$NumPart) or
      die($bd->error);
if($bd->affected_rows > 0){
    echo 'Datos Modificados Con Exito';
}else{
    echo 'Error... Verifica que paso porfavor';
}
$bd->close();
?>