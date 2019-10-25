<div>
<?php
require_once 'Conexion.php';
$bd = new Conexion(); 
//$ide = mysqli_real_escape_string($bd,$_POST['Id']);
$salida = '<div class="w3-container">';
$np = 0;
$mnto = 0 ;
$dscr = "" ;
$fctura = 0 ;
$empsa = "" ;
$registros = $bd->query("SELECT `NumPartida`, `Descripcion`, `Factura`, `Empresa` FROM `partidas` where `NumPartida`=21102");
if ($registros->num_rows > 0 ){
    while($reg = mysqli_fetch_array($registros)){
        //echo $reg['ID'].'<br>';
        /*
        $salida .= 'Numero de Partida <input type="text" id="NumPart" value='.$reg['NumPartida'].' class="w3-input w3-border w3-margin-bottom"><br>';
        $salida .= 'Monto Total <input type="text" id="Monto" value='.$reg['Monto'].' class="w3-input w3-border w3-margin-bottom"><br>';
        $salida .= 'Descripcioon de la Partida <input type="text" id="Desc" value='.$reg['Descripcion'].' class="w3-input w3-border w3-margin-bottom"><br>';
        $salida .= 'Numero de Factura <input type="text" id="NumFact" value='.$reg['Factura'].' class="w3-input w3-border"><br>';
        $salida .= 'Nombre de la Empresa <input type="text" id="NomEmp" value='.$reg['Empresa'].' class="w3-input w3-border w3-margin-bottom"><br>';
        $salida .= '<button class="w3-button w3-blue" onclick="actualiza()">Modificar Partida</button><br>    ';
        $salida .= $reg['Descripcion'] .'<br>';
        $salida .= '<button class="w3-button w3-red" onclick="cierraFormulario()">Cancelar</button>';
        */
        $np = $reg['NumPartida'];
        $mnto = $reg['Monto'];
        $dscr = $reg['Descripcion'];
        $fctura = $reg['Factura'];
        $empsa = $reg['Empresa'];
        //echo '<hr>';
        
    }
    //NumPart Monto Desc NumFact NomEmp
}
$bd->close();
//$salida .= '</div>';
//echo $salida ;
?>
<?php
echo $dscr ;
?>
Numero de partida: <input type= "text" id="NumPart" value ="<?php echo $np; ?>" class = "w3-input w3-border w3-margin-bottom"><br>
Monto total: <input type= "text" id="NumPart" value ="<?php echo $mnto; ?>" class = "w3-input w3-border w3-margin-bottom"><br>
Descripcion de Partida: <input type= "text" id="NumPart" value ="<?php echo $dscr; ?>" ><br>
Numero de Factura<input type= "text" id="NumPart" value ="<?php echo $fctura; ?>" class = "w3-input w3-border w3-margin-bottom"><br>
Nombre de la Empresa<input type= "text" id="NumPart" value ="<?php echo $empsa; ?>" class = "w3-input w3-border w3-margin-bottom"><br>
</div>