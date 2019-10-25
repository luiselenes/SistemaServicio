<?php
$bd = new mysqli("localhost","root","","sistemaservicio");
if(isset($_POST['botonProyNuevo'])) 
{ 
	/*
    $name = $_POST['cvep'];
    echo "User Has submitted the form and entered this name : <b> $name </b>";
    echo "<br>You can use the following form again to enter a new name.";
    */
    if ($_FILES['archivo']["error"] > 0){
        echo "Error: " . $_FILES['archivo']['error'] . "<br>";
    }
    else
    {
        ini_set( 'display_errors', 1 );
        error_reporting( E_ALL );
        /*
        echo "Nombre: " . $_FILES['archivo']['name'] . "<br>";
        echo "Clave del Proyecto ".$_POST['cvep']."<br>";
        echo "Tipo de Informe: " . $_POST['sel1']. "<br>";
        echo "se subieron correctamente los archivos a esta wea ?? <br>";
        */
        $bd->query("INSERT INTO `informes`(`CveP`, `TipoInf`, `Fini`, `Ffin`, `NomArch`,`FName`) VALUES ('".$_POST['cvep']."','".$_POST['sel1']."','".$_POST['fini']."','".$_POST['ffin']."','".$_POST['cvep'].$_FILES['archivo']['name']."','".$_FILES['archivo']['name']."')") or die($bd->error);
        echo 'Datos Registrados Con Exito!!';
        move_uploaded_file($_FILES['archivo']['tmp_name'],"Documentos/".$_POST['cvep']. $_FILES['archivo']['name']);
    }
    $bd->close();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sistema Servicio </title>

    <!-- Bootstrap core CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<link rel="stylesheet" href="../css/estilos.css">
<link rel="javascript" href="../js/Estilo.js">

</head>
<body id="page-top" class="fondito">
      <?PHP
      require 'cabezera.php' ;
      ?>
    <div id="wrapper">    
      <?PHP
      require 'slider.php' ; 
      ?>
      <div id="content-wrapper">
        <div class="container-fluid">

           <!-- Poner todo el desmadre que quieras aqui xD  -->
           <span class="chica nito">
           <div class="card card-register mx-auto mt-4">
           <div class="card-header" id="fondoP">
             <span class="mediana nito ">Agregar Informes a Proyecto Existente</span>
           </div>
           <div class="card-body">
            <div>
            
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <div class="input-group mb-3">
              <label>
                Nombre del Proyecto:
                <select class = "form-control" id="cvep" name = "cvep">
                  <?php
                      require 'PHP/Conexion.php';
                      $bd = new Conexion(); 
                      $registros = $bd->query("SELECT `CveP`,`TituloP` FROM `proyectos`");
                      if ($registros->num_rows > 0 ){
                      while($reg = mysqli_fetch_array($registros)){
                          echo '<option value="'.$reg[0].'">'.$reg[1].'</option>' ; 
                        }
                      }
                  ?>
                </select>
              </label>
            </div>
              <div class="">
                <label>Entrega de Informes:</label><br>
                <select class="form-control" id="sel1" name="sel1">
                  <option>1er Avance</option>
                  <option>2do Avande</option>
                  <option>3er Avance</option>
                  <option>Informe Final</option>
                </select><br>
                <div class="form-group row">
                  <div class="col-xs-4">
                    <label>Del: </label><input type = "date" class="form-control" name="fini" id="fini" value="2017-06-01">
                  </div>
                  <div class="col-xs-4">
                    <label>Al: </label><input type="date" class="form-control" name="ffin" id="ffin" value="2019-01-01">
                  </div>
                </div>
                <br>
                <input  class ="form-control" type="file" name="archivo" id="archivo">
                <br><br>
                <input type = "submit" value="Agregar" class="btn" id="botonProyNuevo" name="botonProyNuevo">
                <!--<button onclick="InsertarInforme()">Agregar</button>-->
              <form>
            </div><br>
        </div>
</span>
      </div>
    </div>
<?php require_once 'logout.php' ; ?>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="../js/demo/datatables-demo.js"></script>
    <script src="../js/demo/chart-area-demo.js"></script>

    <script src="js/controllers.js"></script>

</body>
</html>