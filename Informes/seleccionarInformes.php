<?php
include_once '..\Conexion.php';
$bd = new Conexion();
$registros = $bd->query("SELECT `directorio` FROM `probador`");
if ($registros->num_rows > 0 ){
    while($reg = mysqli_fetch_array($registros)){
        //echo $reg['directorio']."<br>";
        echo '<a href="'.$reg['directorio'].'" download="'.$reg['directorio'].'">Descargar '.$reg['directorio']. '</a><br>';

    }
}
$bd->close();
?>