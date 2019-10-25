<table class="table table-hover">
            <thead>
            <tr>
                <th>Clave del Proyecto</th>
                <th>Titulo del Proyecto</th>
                <th>Director del Proyecto</th>
                <th>Monto Aprobado</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
<?php
require_once 'Conexion.php';
$bd = new Conexion();
$opcion = mysqli_real_escape_string($bd,$_POST['Opc']);
$val = mysqli_real_escape_string($bd,$_POST['valor']);
$query ;
switch($opcion){
    case "Titulo":
        $query = "SELECT `CveP`,`TituloP`,`VigI`,`VigF`,`DirProy`,`Colaboradores`,`MontoAp` FROM `proyectos` WHERE `TituloP` like '%".$val."%'"; 
    break ; 
    case "Director":
        $query = "SELECT `CveP`,`TituloP`,`VigI`,`VigF`,`DirProy`,`Colaboradores`,`MontoAp` FROM `proyectos` WHERE `DirProy` like '%".$val."%'";
    break ; 
    case "clave":
        $query = "SELECT `CveP`,`TituloP`,`VigI`,`VigF`,`DirProy`,`Colaboradores`,`MontoAp` FROM `proyectos` WHERE `CveP` like '".$val."'";
    break ; 
}
$cuerpo ; 
$registros = $bd->query($query);
if ($registros->num_rows > 0 ){
    while($reg = mysqli_fetch_array($registros)){
        echo '<tr>' ;
        echo '<td>'.$reg['CveP'].'</td>';
        echo '<td>'.$reg['TituloP'].'</td>';
        echo '<td>'.$reg['DirProy'].'</td>';
        echo '<td>'.$reg['MontoAp'].'</td>';
        echo '<td><button class="btn" onclick="selecInforme'."('".$reg['CveP']."'".')">Ver Mas</button></td>';
        echo '</tr>';
    }
}
else 
{
    echo 'No se encontraron Datos!!!';
}
$bd->close();
?>
</tbody>
</table>