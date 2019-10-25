<?php
/* Conectar a una base de datos de MySQL invocando al controlador */
$dsn = 'mysql:dbname=sistemaservicio;host=localhost';
$usuario = 'id8801236_root';
$contraseña = '14141414';
try {
    $gbd = new PDO($dsn, $usuario, $contraseña);
    foreach ($gbd->query("select * from usuarios") as $row) {
        print $row['ID'] . "\t";
        print $row['Uname'] . "\t";
        print $row['contra'] . "\t";
        print $row['correo'] . "\n";
    }
} catch (PDOException $e) {
    echo 'Falló la conexión: ' . $e->getMessage();
}

?>