            <?php
            require_once 'Conexion.php';
            $bd = new Conexion();
            if ($_FILES['archivo']["error"] > 0){
                echo "Error: " . $_FILES['archivo']['error'] . "<br>";
                }
              else
                {
                  ini_set( 'display_errors', 1 );
                  error_reporting( E_ALL );
                  echo "Nombre: " . $_FILES['archivo']['name'] . "<br>";
                  echo "Clave del Proyecto ".$_POST['cvep']."<br>";
                  echo "Tipo de Informe: " . $_POST['sel1']. "<br>";
                  $bd->query("INSERT INTO `informes`(`CveP`, `TipoInf`, `Fini`, `Ffin`, `NomArch`,`FName`) VALUES ('".$_POST['cvep']."','".$_POST['sel1']."','".$_POST['fini']."','".$_POST['ffin']."','".$_POST['cvep'].$_FILES['archivo']['name']."','".$_FILES['archivo']['name']."')") or die($bd->error);
                  echo 'Datos Registrados Con Exito!!';
                  move_uploaded_file($_FILES['archivo']['tmp_name'],"../Documentos/".$_POST['cvep']. $_FILES['archivo']['name']);
                }
            $bd->close();
            ?>