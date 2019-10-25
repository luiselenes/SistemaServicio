<?php
//Archivo para las operaciones con la bd 
require_once 'Conexion.php';
$bd = new Conexion();
$opcion = 0 ; 
$data=$_POST["opc"];
switch ($data) {
	case 1: //Insertar un nuevo Proyecto
		$titulo = mysqli_real_escape_string($bd,$_POST['titulo']);
		$cvep = mysqli_real_escape_string($bd,$_POST['cvep']);
		$fecI = mysqli_real_escape_string($bd,$_POST['usr1']);
		$fecF = mysqli_real_escape_string($bd,$_POST['usr2']);
		$dirname = mysqli_real_escape_string($bd,$_POST['dirname']);
		$colaboradores = mysqli_real_escape_string($bd,$_POST['colaboradores']);
		$monto = mysqli_real_escape_string($bd,$_POST['monto']);
		$bd->query("INSERT INTO `proyectos`(`CveP`, `TituloP`, `VigI`, `VigF`, `DirProy`, `Colaboradores`, `MontoAp`) VALUES ('".$cvep."','".$titulo."','".$fecI."','".$fecF."','".$dirname."','".$colaboradores."',".$monto.")")or die($bd->error);
		$bd->close();
		echo 'Datos Registrados Con Exito!!!';
		//header('Location: ../VistaProyectos.php');
		break;
	case 2: //Modificar un Proyecto Existente 
		$titulo = mysqli_real_escape_string($bd,$_POST['titulo']);
		$cvep = mysqli_real_escape_string($bd,$_POST['cvep']);
		$cvep2 = mysqli_real_escape_string($bd,$_POST['cvepn']);
		$fecI = mysqli_real_escape_string($bd,$_POST['usr1']);
		$fecF = mysqli_real_escape_string($bd,$_POST['usr2']);
		$dirname = mysqli_real_escape_string($bd,$_POST['dirname']);
		$colaboradores = mysqli_real_escape_string($bd,$_POST['colaboradores']);
		$monto = mysqli_real_escape_string($bd,$_POST['monto']);
		$consulta = "UPDATE `proyectos` SET `TituloP`='".$titulo."',`VigI`='".$fecI."',`VigF`='".$fecF."',`DirProy`='".$dirname."',`Colaboradores`='".$colaboradores."',`MontoAp`=".$monto." ,`Cvep`='".$cvep2."'  WHERE `CveP` like '".$cvep."'";
		$bd->query($consulta) or die ($bd->error);
		$bd->close();
		echo 'Datos Modificados Con Exito!!';
		break;
	case 3: //creacion de la tabla 
		$tabla = '<table class="table table-hover" id="tablaMaster" width="100%" cellspacing="0">
              <thead>
              <tr>
                 <th>Clave del Proyecto</th>
                 <th>T&iacute;tulo del Proyecto</th>
                 <th>Director del Proyecto</th>
                 <th>Monto Aprobado</th>
                 <th></th>
                </tr>
               </thead>
            <tbody>';
        $registros = $bd->query("SELECT `CveP`,`TituloP`,`DirProy`,`MontoAp` FROM `proyectos`");
                if ($registros->num_rows > 0 ){
                    while($reg = mysqli_fetch_array($registros)){
                        $tabla .= '<tr>' ;
                        //echo $reg['ID'].'<br>';
                        $tabla .= '<td>'.$reg['CveP'].'</td>';
                        $tabla .= '<td>'.$reg['TituloP'].'</td>';
                        $tabla .= '<td>'.$reg['DirProy'].'</td>';
                        $tabla .= '<td>'.$reg['MontoAp'].'</td>';
                        $tabla .= '<td><button id="boton" class="btn" onclick="selecInforme'."('".$reg['CveP']."'".')">
                        Ver M&aacute;s <span class="glyphicon">&#xe081;</span>
                        </button></td>';
                        $tabla .= '</tr>';
                    }
                }
                $bd->close();
        $tabla .= '</tbody></table>';
        echo $tabla ; 
	break ;
	case 4:	//crear relacion de Proyectos con Partidas  
		$cvep = mysqli_real_escape_string($bd,$_POST['cvep']);
		$cvepart = mysqli_real_escape_string($bd,$_POST['cvepart']);
		$map = mysqli_real_escape_string($bd,$_POST['mapro']);
		/*$bd->query("INSERT INTO `proyectopartidas`(`Cvep`, `NumPartida`, `MontoUA`) VALUES ('".$cvep."','".$cvepart."',".$map.")") or die ($bd->error);
		*/
		$resultado = "" ;
		$registros = $bd->query("call sp_CRPP('".$cvep."',".$cvepart.",".$map.")");
                if ($registros->num_rows > 0 ){
                    while($reg = mysqli_fetch_array($registros)){
                        $resultado = $reg[0];
                    }
                }
        $bd->close();
		echo $resultado;
	break ; 
	case 5:
		$bd->query("DELETE FROM `proyectos` WHERE `CveP` = '".mysqli_real_escape_string($bd,$_POST['cvep'])."'") or die ($bd->error);
		echo "Proyecto Eliminado";
	break;
	default:
		# code...
		break;
}
?>