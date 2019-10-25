<?php
session_start();
require_once 'Conexion.php';
$bd = new Conexion(); 
$cp = mysqli_real_escape_string($bd,$_POST['Cvep']);
$Cvep;
$Titulo;
$VigI;
$VigF;
$DirProy;
$colab;
$salida = '<div class="w3-container">';
$registros = $bd->query("SELECT `CveP`,`TituloP`,`VigI`,`VigF`,`DirProy`,`Colaboradores` FROM `proyectos` where `CveP` like '".$cp."'");
if ($registros->num_rows > 0 ){
    while($reg = mysqli_fetch_array($registros)){
      $Cvep = $reg['CveP'];
      $Titulo = $reg['TituloP'];
      $VigI = $reg['VigI'];
      $VigF = $reg['VigF'];
      $DirProy = $reg['DirProy'];
      $colab = $reg['Colaboradores'];
    }
}
$bd->close();
?>
<div>
<?php
//print $dscr ;
?>
Clave del Proyecto: <input type= "text" id="NumPart" value ="<?php echo $Cvep; ?>" class = "w3-input w3-border w3-margin-bottom">
Titulo del Proyecto: <input type= "text" id="Monto" value ="<?php echo $Titulo; ?>" class = "w3-input w3-border w3-margin-bottom">
Fecha de Inicio: <input type= "text" id="Desc" value ="<?php echo $VigI; ?>" class = "w3-input w3-border w3-margin-bottom">
Fecha de Finalizacion: <input type= "text" id="NumFact" value ="<?php echo $VigF; ?>" class = "w3-input w3-border w3-margin-bottom">
Director del Proyecto<input type= "text" id="NomEmp" value ="<?php echo $DirProy; ?>" class = "w3-input w3-border w3-margin-bottom">
Colaboradores: <input type = "textarea" value="<?php echo $colab; ?>" class="w3-input w3-border w3-margin-bottom">
<button class="w3-button w3-red" onclick="document.getElementById('Formulario').style.display='none'">Cancelar</button>
</div>