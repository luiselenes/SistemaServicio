<?php
require '../../Conexion.php';
$bd = new Conexion();
$NombreCompleto;
$NombreUsuario;
$CorreoElectronico; 
$Contrasena ; 
$ID = $_POST['ID'];
$registros = $bd->query("SELECT `NombreCompleto`,`Uname`,`Pass`,`Email` FROM `usuarios` WHERE `ID` =".$ID) or die ($bd->error);
if ($registros->num_rows > 0 ){
  while($reg = mysqli_fetch_array($registros)){
    $NombreCompleto = $reg[0];
    $NombreUsuario = $reg[1];
    $CorreoElectronico = $reg[3];
    $Contrasena = $reg[2];
  }
}
?>

 <div class="card-body">
  <div>
    <label class="control-label col-sm-6" >Nombre Completo:</label>
    <input class="form-control" type = "Text" value="<?php echo $NombreCompleto ?>" id="NombreCompleto">
  </div><br>
 <div>
  <label class="control-label col-sm-6" >Nombre de Usuario:</label>
  <input class="form-control" type = "Text" value="<?php echo $NombreUsuario ?>" id="NombreUsuario" >
 </div><br>
 <div>
 <label class="control-label col-sm-6" >Correo Electr&oacute;nico:</label>
 <input class="form-control" type = "Text" value="<?php echo $CorreoElectronico ?>" id="CorreoElectronico" >
 </div><br>
 <div>
  <label class="control-label col-sm-4" >Contraseña:</label>
  <input class="form-control" type = "Text" value="<?php echo $Contrasena ?>" id="Contrasena" >
 </div><br>        
 <?php
 echo '<button onclick="actualizar('.$ID.')"  class="btn">Guardar</button>'
  ?>

</div>