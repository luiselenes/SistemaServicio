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
<body>
<body id="page-top" class="fondito">
      <?PHP
      require_once 'cabezera.php' ;
      ?>
    <div id="wrapper">    
      <?PHP
      require_once 'slider.php' ; 
      ?>

      <div id="content-wrapper">
        <div class="container-fluid" >
           <!-- Poner todo el desmadre que quieras aqui xD  -->
      <div class="card card-register mx-auto mt-3" id="fondoTarjeta" >
        <span class="chica nito">
          <div class="card-body mt-3">
            
            <div>
              T&iacute;tulo del Proyecto:<br>
              <input class="txt" id ="titulo" type ="text" placeholder = "Título del Proyecto">
            </div>
            <br>
            <div>
              Clave del Proyecto:<br>
              <input class="fecha1" id="cvep" type ="text" placeholder = "Clave del Proyecto">
            </div>
            <br>
            <div class="dates w3-row-padding">
              <label>Vigencia:</label><br>
              <div class="w3-third">
                De: <input type="date" class ="form-control" type="text" name="usr1" id="f1" name="event_date" placeholder="YYYY-MM-DD" value="2019-01-01" autocomplete="off">
              </div>
              <div class="w3-third">
                A: <input type ="date"  class = "form-control" name ="usr2" id="f1" name="event_date" placeholder="YYYY-MM-DD" value="2019-01-01" autocomplete="off" >
              </div>
            </div>
            <br>
            <div>
              Director(a) Responsable:<br>
              <input class="txt" id="dirname" type = "Text" placeholder = "Nombre del Director(a)">
            </div>
            <br>
            <div>
              Colaboradores:<br>
              <input class="txt" id="colaboradores" type = "Text" placeholder = "Nombre de los Colaboradores">
            </div>
            <br>
            <label>Entrega de Informe de Avance:</label><br>
              <div class="w3-third">
                Primer Avance:<input type="date" class ="form-control" type="text" name="usr1" id="f1" name="event_date" placeholder="YYYY-MM-DD" value="2019-01-01" autocomplete="off">
              </div>
              <div class="w3-third">
                Segundo Avance: <input type ="date"  class = "form-control" name ="usr2" id="f1" name="event_date" placeholder="YYYY-MM-DD" value="2019-01-01" autocomplete="off" >
              </div>
              <div class="w3-third">
                Tercer Avance: <input type ="date"  class = "form-control" name ="usr2" id="f1" name="event_date" placeholder="YYYY-MM-DD" value="2019-01-01" autocomplete="off" ><br><br>
              </div>
              <div>
              Entrega de Informe Final:<br><input class="txt" id="monto" type = "text">
            </div><br>
            <label>Monto Aprobado:</label><br>
              <div class="w3-third">
                Partida 21701:<br><input type="text" class ="fecha1"  name="partida1">
              </div>
              <div class="w3-third">
                Partida 31903:<br><input type="text" class = "fecha1"  name="partida2">
              </div>
              <div class="w3-third">
                Total:<br><input type="text"  class = "fecha1"  name="montoTotal"   autocomplete="off" ><br><br>
              </div>
              <br>
            <br>
              <button type="button" class="btn w3-color-blue" id="botonProyNuevo" onclick="insertarDatos()" data-target="#dialogo">
              <span class="chica nito">Imprimir</span>
            </button>
              <br>

          </div>          
            </div>
            <br>
        </div>
        </span> 
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
</body>
</html>