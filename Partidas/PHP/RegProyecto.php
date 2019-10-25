<?php
require_once 'Conexion.php';
$bd = new Conexion();
$titulo = mysqli_real_escape_string($bd,$_POST['titulo']);
$cvep = mysqli_real_escape_string($bd,$_POST['cvep']);
$fecI = mysqli_real_escape_string($bd,$_POST['usr1']);
$fecF = mysqli_real_escape_string($bd,$_POST['usr2']);
$dirname = mysqli_real_escape_string($bd,$_POST['dirname']);
$colaboradores = mysqli_real_escape_string($bd,$_POST['colaboradores']);
$bd->query("INSERT INTO `proyectos`(`CveP`, `TituloP`, `VigI`, `VigF`, `DirProy`, `Colaboradores`) VALUES ('".$cvep."','".$titulo."','".$fecI."','".$fecF."','".$dirname."','".$colaboradores."')")or die($bd->error);
$bd->close();
echo 'Partida Registrada Con Exito';
header('Location: ../VistaProyectos.php');
//INSERT INTO `proyectos`(`CveP`, `TituloP`, `VigI`, `VigF`, `DirProy`, `Colaboradores`) VALUES ('proyecto1','Proyecto1','2019/01/01','2019/01/03','Guerrero Vasquez Rosa del Carmen','Jesus Cervantes, Renato Mascareno')
?>