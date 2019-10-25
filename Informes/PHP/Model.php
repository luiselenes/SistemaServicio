<?php
require_once 'Conexion.php';
$bd = new Conexion();
$opcion = 0 ; 
$data=$_POST["opc"];
switch ($data) {
	case 0:// seleccionar todos los informes que existen en la bd 	
		$tabla = '<table class="table table-hover" id="tablaMaster" width="100%" cellspacing="0">
              <thead>
              <tr>
                <th>Clave del Proyecto</th>
                <th>Titulo del Proyecto</th>
                <th>Tipo de Informe</th>
                <th>Nombre del Archivo</th>
                <th></th>
                <th></th>
                </tr>
               </thead>
            <tbody>';
        $registros = $bd->query("SELECT info.CveP,pro.TituloP,info.TipoInf,info.NomArch,info.Fname FROM informes info inner join proyectos pro on info.CveP = pro.CveP ");
        if ($registros->num_rows > 0 ){
            while($reg = mysqli_fetch_array($registros)){
                $tabla.= '<tr>' ;
                //echo $reg['ID'].'<br>';
                $tabla .= '<td>'.$reg[0].'</td>';
                $tabla .= '<td>'.$reg[1].'</td>';
                $tabla .= '<td>'.$reg[2].'</td>';
                $tabla .= '<td><a href="Documentos/'.$reg[3].'" download="'.$reg[4].'">'.$reg[4].'</a></td>';
                $tabla .= '<td><button class="btn" id="boton" onclick="selecInforme'."('".$reg[0]."','".$reg[2]."'".')">Ver Mas</button></td>';
                $tabla .= '<td><button class="btn btn-danger" onclick="preguntar'."('".$reg[0]."','".$reg[2]."'".')">Eliminar</button></td>';
                $tabla .= '</tr>';
            }
        }
        $bd->close();
        $tabla .= '</tbody></table>';
        echo $tabla ; 
		break;
	case 1: //Borrado de Informacion
        $cve = $_POST['cve'];
        $tipo = $_POST['tipo'];
        $Directorio = "..\Documentos\\";
        //echo 'Datos Recibidos ' . $cve . ' ' . $tipo; 
        $query = "SELECT `NomArch` FROM `informes` WHERE `CveP` like '".$cve."' and `TipoInf` like '".$tipo."'";
        $registros = $bd->query($query);
        if ($registros->num_rows > 0 ){
            while($reg = mysqli_fetch_array($registros)){
                $Directorio .= $reg[0];
            }
        }
        echo 'Se encontro el Siguiente Directorio....'.$Directorio;
        $bd->query("DELETE FROM `informes` WHERE `CveP` like '".$cve."' AND `TipoInf` like '".$tipo."'")or die ("Error en: ". $bd->error);
        echo 'Se Borro El Registro Con Exito... Ahora Intentaremos Eliminar El Archivo Relacionado a este'; 
        if (unlink($Directorio)){
            echo 'Se elimino un archivo';
        }else
        {
            echo 'Ocurrio un error';
        }
        break ; 	
	default:
		# code...
		break;
}
?>