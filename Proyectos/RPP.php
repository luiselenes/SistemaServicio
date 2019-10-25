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
             <span class="mediana nito ">Nueva Partida a Proyecto Existente</span>
            </div>
           <div class="card-body">
            <div class="form-group">
                <label for="cvep">Nombre del Proyecto:</label>
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
            <div class="input-group form-group">
              <label for="Cvepart">Clave de Partida:</label><br>
              <input type="text" name="Cvepart" id="Cvepart" class="form-control" placeholder="Buscar">
              <div class="input-group-append">
                <button class="btn btn-success" data-toggle="modal" data-target="#frmBusqueda">Buscar</button> 
              </div>
            </div>
            <div>
            <label class="control-label col-sm-6" >Monto Aprobado:</label>
            <input class="form-control" type = "Text" placeholder = "Monto Aprobado" id="map">
              <br><br>
              <button class="btn" id="botonProyNuevo" onClick="CreateRelation()">Guardar</button>
              <form>
            </div><br><br>
        </div>
        </span>

        </div>
        </span> 
      </div>
    </div>

<div class="modal fade" id="frmBusqueda" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Listado De Totas Las Partidas</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div  class="table-responsive">
              <table class="table table-hover" id = "tablaMaster" width="100%" cellspacing="0">
                <thead>
                 <tr>
                    <th>N&uacute;mero de Partida</th>
                    <th>Descripci&oacute;n</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    include_once 'PHP/Conexion.php';
                    $bd = new Conexion(); 
                    $registros = $bd->query("SELECT `NumPartida`,`Titulo` FROM `partidas` WHERE 1");
                    if ($registros->num_rows > 0 ){
                        while($reg = mysqli_fetch_array($registros)){
                            echo '<tr>' ;
                            //echo $reg['ID'].'<br>';
                            echo '<td>'.$reg['NumPartida'].'</td>';
                            echo '<td>'.utf8_encode($reg['Titulo']).'</td>';
                            echo '<td><button class="btn" id="boton" onclick="aceptar('.$reg['NumPartida'].')">
                            Seleccionar <span class="glyphicon">&#9998;</span>
                            </button></td>';
                            echo '</tr>';
                        }
                    }
                    $bd->close();
                    ?>
                 </tbody>
               </table>
             </div> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
<div class="modal fade" id="frmResultado" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Listado De Totas Las Partidas</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div id="resultadosquery">

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
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

    <script src="js/modifi.js"></script>

</body>
</html>