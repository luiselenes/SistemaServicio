<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
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
$mtap ;
$salida = '<div class="w3-container">';
$registros = $bd->query("SELECT `CveP`,`TituloP`,`VigI`,`VigF`,`DirProy`,`Colaboradores`,`MontoAp` FROM `proyectos` where `CveP` like '".$cp."'");
if ($registros->num_rows > 0 ){
    while($reg = mysqli_fetch_array($registros)){
      $Cvep = $reg['CveP'];
      $Titulo = $reg['TituloP'];
      $VigI = $reg['VigI'];
      $VigF = $reg['VigF'];
      $DirProy = utf8_encode($reg['DirProy']);
      $colab = $reg['Colaboradores'];
      $mtap = $reg['MontoAp'];
    }
}
$bd->close();
?>
<div class="chica nito">
<?php
//print $dscr ;
?>
Clave del Proyecto: <input type= "text" id="CveP" value ="<?php echo $Cvep; ?>" class = "w3-input w3-border w3-margin-bottom">
T&iacute;tulo del Proyecto: <input type= "text" id="TituloP" value ="<?php echo $Titulo; ?>" class = "w3-input w3-border w3-margin-bottom">
Fecha de Inicio: <input type= "text" id="FI" value ="<?php echo $VigI; ?>" class = "w3-input w3-border w3-margin-bottom">
Fecha de Finalizaci&oacute;n: <input type= "text" id="FF" value ="<?php echo $VigF; ?>" class = "w3-input w3-border w3-margin-bottom">
Director del Proyecto:<input type= "text" id="DirProy" value ="<?php echo $DirProy; ?>" class = "w3-input w3-border w3-margin-bottom">
Colaboradores: <input type = "textarea" id= "Colaboradores" value="<?php echo $colab; ?>" class="w3-input w3-border w3-margin-bottom">
Monto Aprobado: <input type = "text" id= "Monto" value="<?php echo $mtap; ?>" class="w3-input w3-border w3-margin-bottom"><br>
<button class="w3-button w3-green" onclick="document.getElementById('Formulario').style.display='none'">Aceptar</button>
<button class="w3-button w3-green" onclick="makeReport(1)">Crear Reporte 1</button>
<button class="w3-button w3-green" onclick="makeReport(2)" disabled="true">Crear Reporte 2</button>
<button class="w3-button w3-green" onclick="makeReport(3)" disabled="true">Crear Reporte 3</button>
<button class="w3-button w3-green" onclick="makeReport(4)" disabled="true">Crear Reporte Final</button>
</div>
</body>
</html>