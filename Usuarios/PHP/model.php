<?php
include '../../Conexion.php';
$bd = new Conexion(); 
$opc=$_POST["opc"];
switch ($opc) {
 	case  1: //insertado de un nuevo cliente
 		$bd->query("INSERT INTO `usuarios`(`Uname`, `Pass`, `Email`, `tipoUser`, `NombreCompleto`) VALUES ('".$_POST["nombreUsuario"]."','".$_POST["contrasena"]."','".$_POST["correoElectronico"]."','Administrativo','".$_POST["nombreCompleto"]."')")or die($bd->error);
 		echo "Datos Registrados Con Exito";
 		break;
 	case 2: //eliminar datos 
	 	$bd->query("DELETE FROM usuarios where ID = ".$_POST["id"]) or die ($bd->error);
	 	echo "Datos Eliminados";
	 	break;
 	case 3: //creacion de la tabla 
		$tabla = '<table class="table table-hover" id="tablaMaster" width="100%" cellspacing="0">
              <thead>
              <tr>
                 <th>Nombre</th>
                 <th>Usuario</th>
                 <th>Contraseña</th>
                 <th>Correo</th>
                 <th></th>
                 <th></th>
                </tr>
               </thead>
            <tbody>';
        $registros = $bd->query("SELECT `ID`,`NombreCompleto`,`Uname`,`Pass`,`Email` FROM `usuarios`");
                if ($registros->num_rows > 0 ){
                    while($reg = mysqli_fetch_array($registros)){
                        $tabla .= '<tr>' ;
                        //echo $reg['ID'].'<br>';
                        $tabla .= '<td>'.$reg['NombreCompleto'].'</td>';
                        $tabla .= '<td>'.$reg['Uname'].'</td>';
                        $tabla .= '<td>'.$reg['Pass'].'</td>';
                        $tabla .= '<td>'.$reg['Email'].'</td>';
                        $tabla .= '<td><button id="boton" class="btn" onclick="selecUsuario'."('".$reg['ID']."'".')">
                        Ver M&aacute;s <span class="glyphicon">&#xe081;</span>
                        </button></td>';
                        $tabla .= '<td><button class="btn btn-danger" onclick="eliminar('.$reg['ID'].')"><span class="fas">&#xf00d;</span></button></td>';
                        $tabla .= '</tr>';
                    }
                }
                $bd->close();
        $tabla .= '</tbody></table>';
        echo $tabla ;
        break ;  
     	case 4:
        $bd->query("UPDATE `usuarios` SET `NombreCompleto`='".$_POST["nombreCompleto"]."',`Uname` ='".$_POST["nombreUsuario"]."',`Pass` ='".$_POST["contrasena"]."' ,`Email` ='".$_POST["correoElectronico"]."' where `ID` = ".$_POST["ID"])or die ($bd->error) ; 
        echo "Datos Actualizados";
        break ;
        /*
$bd->query("INSERT INTO `usuarios`(`Uname`, `Pass`, `Email`, `tipoUser`, `NombreCompleto`) VALUES ('".$_POST["nombreUsuario"]."','".$_POST["contrasena"]."','".$_POST["correoElectronico"]."','Administrativo','".$_POST["nombreCompleto"]."')")or die($bd->error);
        echo "Datos Registrados Con Exito";
        */



 } 
?>