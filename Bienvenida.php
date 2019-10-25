<?php 
session_start();
if (!isset($_SESSION['Usuario'])){
  header('Location: index.php');
}
if ($_SESSION['Tipo'] === "Administrativo"){
  header('Location: Doctores/index.php');
}
//echo $_SESSION['Tipo'] ;
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
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" href="css/sb-admin.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link type="text/css" rel="stylesheet" href="css/estilos.css"/>   
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
</head>
<body>
<body id="page-top" class="fondito col-lg-14">
      <?PHP
      require 'cabezera.php';?>
    <div id="wrapper">    
      <?PHP
      require_once 'slider.php';?>
      <div id="content-wrapper">
        <div class="container-fluid">

           <!-- Poner todo el desmadre que quieras aqui xD  -->
           <div style="margin-top:100px;margin-left:15px" id="showcase">
             <h1 Style="font-size:62px"><b>Bienvenido</b></h1>
          </div>
              <div class="form-section" >
              </div>
              <div  style="margin-top:5px;margin-left:40px" id="showcase">
                <h1 Style="font-size:30px"><b>Sistema de Altas de Proyectos</b></h1>
             </div>
        </div>
      </div>
    </div>
<?php require_once 'logout.php' ; ?>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>
</body>
</html>