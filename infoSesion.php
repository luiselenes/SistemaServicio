<?php
session_start();
echo "Informacion de la session actual<br>" ;
echo "Nombre de Usuario ".$_SESSION['Usuario']."<br>";
echo "Correo Electronico".$_SESSION['Correo']."<br>";
?>