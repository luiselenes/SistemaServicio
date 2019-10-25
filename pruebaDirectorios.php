<?php
$directorio = opendir("Documentos/"); //ruta actual
$contador = 1 ;
echo 'Archivos Publicados<br>';
while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
{
    if (is_dir($archivo))//verificamos si es o no un directorio
    {
        //echo "[".$archivo . "]<br />"; //de ser un directorio lo envolvemos entre corchetes
    }
    else
    {
        echo '<a href="Documentos/'.$archivo.'" download="'.$archivo.'">Descargar'.$archivo.'</a><br>';
       // echo $contador."-".$archivo."<br/>";
    }
    $contador++;
}
?>