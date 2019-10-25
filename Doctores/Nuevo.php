<?php
session_start();
if (!isset($_SESSION['Usuario'])){
  header('Location: ..\index.php');
}
?>
<!DOCTYPE html>
<html lang="sp">

  <head>

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


    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/w3.css">
    <link rel="javascript" href="../js/Estilo.js">
    <link rel="stylesheet" href="../css/sb-admin.css">
    
  </head>

  <body class="fondito">
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
      <div class="card card-register mx-auto mt-2">
        <div class="card-header" id="fondoP">
          <span class="mediana nito ">Proyecto Nuevo </span>
        </div>

        <span class="chica nito">
          <div class="card-body">
            
            <div>
              T&iacute;tulo del Proyecto:
              <input class="w3-input" id ="titulo" type = "Text" placeholder = "Título del Proyecto">
            </div>
            <br>
            <div>
              Clave del Proyecto:
              <input class="w3-input" id="cvep" type = "Text" placeholder = "Clave del Proyecto">
            </div>
            <br>
            <div class="dates w3-row-padding">
              <label>Vigencia:</label><br>
              <div class="w3-third">
                De: <input type="date" class ="w3-input"type="text" name="usr1" id="usr1" name="event_date" placeholder="YYYY-MM-DD" value="2019-01-01" autocomplete="off">
              </div>
              <div class="w3-third">
                A: <input type ="date"  class = "w3-input" name ="usr2" id="usr2" name="event_date" placeholder="YYYY-MM-DD" value="2019-01-01" autocomplete="off" >
              </div>
            </div>
            <br>
            <div>
              Director(a) del Proyecto:
              <input class="w3-input" id="dirname" type = "Text" placeholder = "Nombre del Director(a)">
            </div>
            <br>
            <div>
              Colaboradores:
              <input class="w3-input" id="colaboradores" type = "Text" placeholder = "Nombre de los Colaboradores">
            </div>
            <br>
            <div>
              Monto Aprobado:
              <input class="w3-input" id="monto" type = "Text" placeholder = "Monto Aprobado para el proyecto">
            </div>
            <br>
              <input type="button" class="btn w3-color-blue" id="botonProyNuevo" value="Aceptar" onclick="insertarDatos()" data-target="#dialogo">
              <br><br>
          </div>
        </div>
        </span> 
      </div>
        </div>
    </div>
    <!-- -->
    <div class="modal fade" id="dialogo" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
          <p id ="resultados"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="$(location).attr('href','Index.php');">Ir a Inicio</button>
        </div>
      </div>
    </div>
  </div>
    <?php require_once 'logout.php' ; ?>
    <!-- Bootstrap core JavaScript-->
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
    <script src="../js/modifi.js"></script>
  </body>

</html>
