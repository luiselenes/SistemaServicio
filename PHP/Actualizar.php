<?php
require_once 'Conexion.php';
$bd = new Conexion(); 
//NumPart Monto Desc NumFact NomEmp
$NumPart = mysqli_real_escape_string($bd,$_POST['NumPart']);
$Monto = mysqli_real_escape_string($bd,$_POST['Monto']);
$Desc = mysqli_real_escape_string($bd,$_POST['Desc']);
$NumFact = mysqli_real_escape_string($bd,$_POST['NumFact']);
$NomEmp = mysqli_real_escape_string($bd,$_POST['NomEmp']);
$bd->query("UPDATE `partidas` SET `Monto`=".$Monto.",`Descripcion`='".$Desc."',`Factura`=".$NumFact.",`Empresa`='".$NomEmp."' WHERE `NumPartida` =".$NumPart) or
      die($bd->error);
if($bd->affected_rows > 0){
    echo 'Datos Modificados Con Exito';
}else{
    echo 'Error... Verifica que paso porfavor';
}
$bd->close();
?>