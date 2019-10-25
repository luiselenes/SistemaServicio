<?php

define("HOST","localhost"); //AQUI VA TU HOST
define("USER","root");
define("PASS","");
define("DBNAME","sistemaservicio");
/*
define("HOST","localhost"); //AQUI VA TU HOST
define("USER","id8801236_root");
define("PASS","14141414");
define("DBNAME","sistemaservicio");*/
class Conexion extends mysqli {
    //protected $conexion extends mysqli ;
    public function __construct() {
        parent::__construct(HOST, USER, PASS,DBNAME);
        $conexion = new mysqli(HOST, USER, PASS,DBNAME);
        
        if (mysqli_connect_error()) {
            die('Error de Conexión (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
        }
    }

}
//$bd = new Conexion('localhost', 'id8801236_root', '14141414', 'sistemaservicio');
//$bd = new Conexion('localhost', 'id8801236_root', '14141414', 'sistemaservicio');
/*$bd = new Conexion();
echo 'Éxito... ' . $bd->host_info . "\n <br>";
$registros = $bd->query("Select * from Usuarios");
while($reg = $registros->fetch_array()){
    echo $reg['ID'].'<br>';
}
$bd->close();
*/
?>