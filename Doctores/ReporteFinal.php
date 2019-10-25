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
              <form action="GeneraPDF/ReporteFinal.php" method="POST">
                <div>
                    <select class="grande nito" name="tipoInf">
                        <option>INFORME TECNICO FINAL </option>
                    </select>
                        <br><br>
                        <label><span class="mediana nito">I.-Identificacion del Proyecto</span></label>
                        <br><br>
                        <table class="table table-bordered" id="tabla">
                            <tbody class=" nito">
                            <tr>
                            <td>Plantel</td>
                            <td><input type = "text" class="form-control" name="ptel" required="required" value="Instituto Tecnologico De Culiacan" readonly="readonly"></td>            
                            </tr>
                            <tr>
                            <td>Responsable Tecnico del Proyecto </td>
                            <td><input type = "text" class="form-control" id="respon2" name="respon" required="required" readonly="readonly"></td>                          
                            </tr>
                            <tr>
                            <td>Clave del Proyecto</td>
                                <td>
                                    <input type = "text" class="form-control" name = "cve" id="cve2" readonly="readonly">
                                    <div class="form-inline">
                                    <a class="btn btn-primary" data-toggle="modal" data-target="#frmBusqueda" required="required">Buscar</a> 
                                    </div>
                                </td> 
                            </tr>
                            <tr>
                            <td>Titulo del Proyecto</td>
                            <td><input type = "text"  id="titproy2" class="form-control" name="titproy" required="required" readonly="readonly"></td>                                                      
                            </tr>
                            <tr>
                            <td>Fecha del Proyecto</td>
                            <td>Fecha de Inicio: <input type = "date" class="form-control" name = "periodo1" required="required" value="2019-01-01"> <br>
                                Fecha de Termino: <input type = "date" class="form-control" name = "periodo2" required="required" value="2019-01-01"> </td>
                            </tr>
                            </tbody>
                        </table>                            
                        </div><br>
                        <div class="izquierda">
                        <span class="chica2"> Tipo de Investigacion:</span>
                        <input class="fecha1"name="TipoInv" id="fAvance" type ="text" placeholder="" required="required">
                        <br><br>               
                        <span class="chica2"> Duracion del Proyecto:</span>
                        <input class="fecha1" name="Duracion" id="montoEjer" type ="text" placeholder="" required="required" >
                        </div>
                        <br>
                            <label><span class="mediana nito">II. Resultados</span></label>
                            <br>  
                            <label><span class="mediana ">1.Resumen del Proyecto</span></label>
                            <br>
                            <label><span class="chica">Introduccion</span></label>
                            <br>
                            <label><span class="chica2">Contiene una descripcion general de la problematica que aborda el proyecto de investigacion</span></label>
                        <div class="form-group" id="tabla">
                        <textarea class="form-control" rows="10" name="resumen" id="resumen" required="required"></textarea>
                        </div>

                        <br><br><br><br><br><br>
                        <label><span class="chica">Objetivos</span></label>
                        <br>
                        <label><span class="chica2">Contiene el esclarecimiento de los objetivos que se cumplieron con el desarrollo del proyecto de forma cualitativa</span></label>
                        <br>
                        <label><span class="mediana ">GENERAL</span></label>
                        <div class="form-group" id="tabla">
                            <textarea class="form-control" rows="2" name="general" id="resumen" required="required"></textarea>
                            <br>
                            <label><span class="mediana ">ESPECÍFICOS</span></label><br>
                            <textarea class="form-control" rows="3" name="especificos" id="resumen" required="required"></textarea>
                        </div>
                        <br><br><br><br>
                        <label><span class="mediana">Metas</span></label><br>
                        <label><span class="chica2">Contiene los resultados concretos obtenidos de forma cuantitativa respecto a tesis desarrolladas,
                        publicaciones, trabajos de residencias profesionales, participantes en la cúspide, participacion en eventos, etc.
                        </span></label>
                        <textarea class="form-control" rows="2" name="metas" id="resumen" required="required"></textarea>
                        <br>
                        <label><span class="mediana ">Desarrollo y resultados del proyecto</span></label>
                        <label><span class="chica2">Contiene una explicacion de los procedimientos seguidos para el cumplimiento de los objetivos y metas que conforman el proyecto</span></label>
                        <label><span class="mediana">Desarrollo del proyecto:</span></label>
                        <textarea class="form-control" rows="3" name="DesarrolloProyecto" id="resumen" required="required"></textarea><br>
                         <div>  <label><span class="mediana">Resultados del Proyecto:</span></label><br>
                         <label><span class="chica">Durante el periodo reportado se lograron los entregables siguientes:</span></label><br>
                         <textarea class="form-control" rows="5" name="entregables" id="resumen" required="required"></textarea><br>  
                         <label><span class="mediana">Conclusiones/Observaciones</span></label><br>
                         <label><span class="chica">Contiene comentarios al respecto del proyecto desarrollado</span></label><br>
                         <textarea class="form-control" rows="5" name="conclusiones" id="resumen" required="required"></textarea><br>  
                       </div><br>
                       
                       <div>   
                         <label><span class="mediana">2. Objetivo del Proyecto</span></label><br>
                            Grado de Incumplimiento del Objetivo propuesto: <input type = "text" class="fecha1" name= "gradoCumplimiento" placeholder="%" id="cve2"><br><br>
                            GENERAL:
                            <textarea class="form-control" rows="5" name="ObjetivoGeneral" id="resumen" required="required"></textarea><br>  
                            <br>
                            <label><span class="mediana">ESPECIFICOS</span></label><br>
                            <textarea class="form-control" rows="5" name="ObjetivoEspecifico" id="resumen" required="required"></textarea><br>    
                        </div><br>
                       <div>   
                         <label><span class="mediana">3. Metas</span></label><br>
                            Grado de cumplimiento de las metas propuestas: <input type = "text" class="fecha1" name= "grado" placeholder="%" id="cve2"><br>
                            <label><span class="chica">Cumplimiento de Metas:</span></label><br>
                            <textarea class="form-control" rows="8" name="CumplimientoMetas" id="resumen" required="required"></textarea><br>   
                            <label><span class="mediana">Metas Cumplidas</span></label><br>   
                            <textarea class="form-control" rows="8" name="MetasCumplidas" id="resumen" required="required"></textarea><br>  
                            <br> 
                       </div><br>
                       <div>   
                         <label><span class="mediana">4. Metodologia</span></label><br>
                            <label><span class="chica">Descripcion de la metodologia empleada para el alcance de los objetivos</span></label><br>
                            <textarea class="form-control" rows="12" name="metodologia" id="resumen" required="required"></textarea><br> 
                       </div><br>
                       <div>   
                         <label><span class="mediana">5. Colaboracion y Participacion</span></label>
                            <label><span class="chica">Descripcion de la participacion e integracion del grupo de trabajo indicando el desempeño y las actividades
                            realizadas incluyendo estudiantes. Tambien se indica si hubo cambios en los participacion de los investigadores y el grado de afectacion
                            del proyecto. </span></label><br><br>
                            <label><span class="mediana">Integrantes del Proyecto</span></label><br>
                            <textarea class="form-control" rows="3" name="IntegrantesProyecto" id="resumen" required="required"></textarea><br>
                         <label><span class="chica2">Colaboracion con Externos</span></label>
                         <textarea class="form-control" rows="3" name="IntegrantesExternos" id="resumen" required="required"></textarea><br>
                         <label><span class="chica2">Participacion de Estudiantes</span></label>
                         <textarea class="form-control" rows="3" name="IntegrantesEstudiantes" id="resumen" required="required"></textarea><br>
                       </div><br>
                       <div>   
                         <label><span class="mediana">6. Desviaciones y Monto</span></label><br>
                            <textarea class="form-control" rows="5" name="desviaciones" id="resumen" required="required"></textarea><br> 
                       </div><br>
                       <div>   
                         <label><span class="mediana">7. Productos Transferidos</span></label><br>
                            <textarea class="form-control" rows="2" name="productos" id="resumen" required="required"></textarea><br> 
                       </div><br>
                       <div>   
                         <label><span class="mediana">8. Difusion</span></label><br>
                            <textarea class="form-control" rows="7" name="difusion" id="resumen" required="required"></textarea><br> 
                       </div><br>
                       <div>   
                         <span class="mediana">9. Recurso Ejercido</span>
                         <input class="form-control" name="montoEjercido" id="montoEjer" type ="text" placeholder="" required="required"  value="0" readonly="">
                       </div><br>
                       <div>   
                         <span class="mediana">10. Beneficios y Problemas</span>
                         <textarea class="form-control" rows="4" name="beneficiosProblemas" id="resumen" required="required"></textarea><br>       
                       </div><br>
                       <div>   
                         <span class="mediana">11. Informacion Adicional</span>
                         <textarea class="form-control" rows="2" name="InformacionAdicional" id="resumen" required="required"></textarea><br> 
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
                       </div><br>
                        <input type="submit" value="Generar PDF" class="btn" formtarget="_blank">                           
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
    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="../js/demo/datatables-demo.js"></script>
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="js/modifi.js"></script>
  </body>
</html>