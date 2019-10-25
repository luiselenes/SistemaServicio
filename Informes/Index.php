<?php 
session_start();
if (!isset($_SESSION['Usuario'])){
  header('Location: index.php');
}
//echo $_SESSION['Usuario']; 
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Gestion de Informes </title>

    <!-- Bootstrap core CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/w3.css">
    <link rel="javascript" href="../js/Estilo.js">

</head>
<body>
<body id="page-top" class="fondito">
      <?PHP
      require 'cabezera.php' ;
      ?>
    <div id="wrapper">    
      <?PHP
      require_once 'slider.php' ; 
      ?>
      <div id="content-wrapper">
        <div class="container-fluid">

           <!-- Poner todo el desmadre que quieras aqui xD  -->
           
           <div class="card mb-0">
             <div class="card-header">
               <i class="fas fa-table"></i>
               <span class="grande nito"> Gestion de Informes Registrados</span>
             </div>
            </div>

            <div class="card-body" id="colorFondo">
           <div id= "tablaFrame" class="table-responsive">
            
           </div> 
        </div>
      </div>
      </div>
    </div>
    <div id="Formulario" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
            <div class="w3-center"><br>
                <span onclick="document.getElementById('Formulario').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Cerrar Formulario">×</span>
                Descripcion General Del Informe
            </div>
            <br>
            <div id="frmmodi" class="w3-container">
            </div>
            <br>
        </div>
    </div>
<!-- Modal que pregunta si quieres eliminar o no ? -->
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">¿Desea Eliminar Este Informe</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="Eliminar()">Si</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal que muestra el mensaje sobre el resultado de la eliminacion del infomre -->
   <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
          <h4 class="modal-title">Informe Eliminado Con Exito!!!</h4>
          <center><button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button></center>
        </div>
      </div>
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