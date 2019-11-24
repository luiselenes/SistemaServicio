<?PHP
  session_start();
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
      <div class="card card-register mx-auto mt-2" id="fondoTarjeta">
        <span class="chica2 nito">
           <div class="card-body">
              <form action="GeneraPDF/index.php" method="POST">
               <div>
                  <select class="grande nito" name="tipoInf">
                    <option>Primer Informe Parcial </option>
                    <option>Segundo Informe Parcial</option>
                    <option>Tercer Informe Parcial</option>
                  </select>
                    <br><br>
                    <div class="w3-third">
                      <input type="date" class ="form-control" type="text" id="fechaIzq" name="event_date"  value="2019-01-01" autocomplete="off">
                    </div><br><br>
                    <table class="table table-bordered" id="tabla">
                        <tbody class=" nito">
                        <tr>
                          <td>Titulo del Proyecto</td>
                          <td><input type = "text"  id="titproy2" class="form-control" name="titproy" required="required" readonly="readonly"></td>
                        </tr>
                        <tr>
                          <td>Clave</td>
                          <td>
                            <input type = "text" class="form-control" name = "cve" id="cve2" readonly="readonly">
                            <div class="form-inline">
                            <a class="btn btn-primary" data-toggle="modal" data-target="#frmBusqueda" required="required">Buscar</a> 
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>Plantel</td>
                          <td><input type = "text" class="form-control" name="ptel" required="required" value="Instituto Tecnologico De Culiacan" readonly="readonly"></td>
                        </tr>
                        <tr>
                          <td>Responsable</td>
                          <td><input type = "text" class="form-control" id="respon2" name="respon" required="required" readonly="readonly"></td>
                        </tr>
                        <tr>
                          <td>Periodo Reportado</td>
                          <td>Del: <input type = "date" class="form-control" name = "periodo1" required="required" value="2019-01-01"> 
                            Al: <input type = "date" class="form-control" name = "periodo2" required="required" value="2019-01-01"> </td>
                        </tr>
                        </tbody>
                    </table>                            
                     </div>  <br>
                     <div class="izquierda">
                       <span class="chica2"> Avance del Proyecto:</span>
                       <input class="fecha1"name="fAvance" id="fAvance" type ="text" placeholder="%" required="required">
                       <br><br>               
                       <span class="chica2"> Monto Ejercido:</span>
                       <input class="fecha1" name="montoEjer" id="montoEjer" type ="text" placeholder="$" required="required" readonly="readonly" value="0">
                     </div>
                     <br>
                     <div class="form-group" id="tabla">
                       <label><span class="mediana nito">Resumen</span></label>
                       <textarea class="form-control" rows="10" name="resumen" id="resumen" required="required"></textarea>
                     </div>
                     <br><br><br><br><br><br><br><br>
                     <div class="form-group" id="tabla">
                       <label><span class="mediana nito">Comentarios</span></label>
                       <textarea class="form-control" rows="4" id="comment" name="comment" required="required"></textarea>
                     </div>
                     <br>
                     <table class="table table-bordered" id="tabla2">
                     <tbody>
                        <tr>
                          <label class="lblRespTec">
                            <span class="chica2">Responsable Tecnico</span>
                          </label>
                           <label class="lblNombFir">
                            <span class="chica2">Nombre y Firma</span>
                          </label>
                          <td></td>
                          <label class="lblAval">
                            <span class="chica2">Aval</span>
                          </label>
                          <label class="lblNombFir2">
                            <span class="chica2">Nombre y Firma</span>
                          </label>
                          <td></td>
                        </tr>
                        </tbody>
                    </table>    
                    <br>
                     <p>
                       <span class=" chica2 nito">
                       *La firma del aval prodra ser preferentemente del Jefe de la Division de Estudios 
                       de Posgrado e Investigacion, el Jefe de Departamento Academico correspondiente o del Subdirector Academico.
                       </span><br>
                       <input type="submit" value="Generar PDF" class="btn" formtarget="_blank">
                     </p>          
                    </form>
                  </div>
            </div>
        </span> 
      </div>
    </div>
    </div>
<div class="modal fade" id="frmBusqueda" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Listado De Totas Las Partidas Registradas</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div  class="table-responsive">
              <table class="table table-hover" id = "tablaMaster2" width="100%" cellspacing="0">
                <thead>
                 <tr>
                    <th>Clave</th>
                    <th>Titulo</th>
                    <th>Director </th>
                    <th>Monto Aprovado</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    include_once 'PHP/Conexion.php';
                    $bd = new Conexion(); 
                    $registros = $bd->query("SELECT `CveP`,`TituloP`,`DirProy`,`MontoAp` FROM `proyectos` where DirProy like '".$_SESSION['NombrePersona']."'");
                    if ($registros->num_rows > 0 ){
                        while($reg = mysqli_fetch_array($registros)){
                            echo '<tr>' ;
                            //echo $reg['ID'].'<br>';
                            echo '<td>'.$reg['CveP'].'</td>';
                            echo '<td>'.$reg['TituloP'].'</td>';
                            echo '<td>'.utf8_encode($reg['DirProy']).'</td>';
                            echo '<td>'.$reg['MontoAp'].'</td>';
                            echo '<td><button class="btn" id="boton" onclick="'."aceptar('".$reg['CveP']."','".$reg['TituloP']."','".utf8_encode($reg['DirProy'])."')".'">
                            Seleccionar <span class="glyphicon">&#9998;</span>
                            </button></td>';
                            echo '</tr>';
                        }
                    }
                    $bd->close();
                    //INSERT INTO `proyectos`(`CveP`, `TituloP`, `VigI`, `VigF`, `DirProy`, `Colaboradores`, `MontoAp`, `MontoRes`) VALUES ('atenf','Analisis de la demanda de atencion de enfermedades renales en hospitales publicos','2019-01-01','2019-01-01','López Varela Carmen Guadalupe','S/C',1000,1000)
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
    <script src="../vendor/datatables /dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="../js/demo/datatables-demo.js"></script>
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="js/modifi.js"></script>

    
  </body>
</html>