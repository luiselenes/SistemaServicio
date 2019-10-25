<?php
session_start();
require_once 'Conexion.php';
$bd = new Conexion(); 
$ide = mysqli_real_escape_string($bd,$_POST['Id']);
$salida = '<div class="w3-container">';
$registros = $bd->query("SELECT `NumPartida`, `Descripcion` FROM `partidas` WHERE `NumPartida` =".$ide);
if ($registros->num_rows > 0 ){
    while($reg = mysqli_fetch_array($registros)){
      $np = $reg['NumPartida'];
      $dscr = utf8_encode($reg['Descripcion']);
    }
}
$bd->close();
?>
<div>
<?php
//print $dscr ;
?>
N&uacute;mero de partida: <input type= "text" id="NumPart" value ="<?php echo $np; ?>" class = "w3-input w3-border w3-margin-bottom"><br>
Descripci&oacute;n de Partida:
 <textarea rows="7" type= "text" id="Desc"  class = "w3-input w3-border w3-margin-bottom"><?php echo $dscr; ?></textarea><br>
<button class="w3-button w3-blue" onclick="actualiza()">Guardar Cambios</button>
<button class="w3-button w3-green" onclick="document.getElementById('Formulario').style.display='none'">Aceptar</button>
</div>