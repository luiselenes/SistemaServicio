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

    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<link rel="stylesheet" href="../css/Estilo.css">
<link rel="javascript" href="../js/Estilo.js">
<link rel="stylesheet" href="../css/sb-admin.css">

</head>
<body>
<body id="page-top">
      <?PHP
      require_once 'cabezera.php' ;
      ?>
    <div id="wrapper">    
      <?PHP
      require_once 'slider.php' ; 
      ?>
      <div id="content-wrapper">
        <div class="container-fluid">
            <?php
            /*
            Numero de Partida <input type="text" id="NumPart" value='.$reg['NumPartida'].' class="w3-input w3-border w3-margin-bottom"><br>';
            $salida .= 'Monto Total <input type="text" id="Monto" value='.$reg['Monto'].' class="w3-input w3-border w3-margin-bottom"><br>';
            $salida .= 'Descripcioon de la Partida <input type="text" id="Desc" value='.$reg['Descripcion'].' class="w3-input w3-border w3-margin-bottom"><br>';
            $salida .= 'Numero de Factura <input type="text" id="NumFact" value='.$reg['Factura'].' class="w3-input w3-border"><br>';
            $salida .= 'Nombre de la Empresa <input type="text" id="NomEmp" value='.$reg['Empresa'].' class="w3-input w3-border w3-margin-bottom"><br>';
            $salida .= '<button class="w3-button w3-blue" onclick="actualiza()">Modificar Partida</button>    ';
            $salida .= '<button class="w3-button w3-red" onclick="cierraFormulario()">Cancelar</button>';
            */
            ?>
           <!-- Poner todo el desmadre que quieras aqui xD  -->
            <div class ="container-fluid">
                <label class="control-label col-sm-4" >Numero de Partida:</label>
                <input type="text" id= "NumPart" class="w3-input w3-border col-sm-4">
                <label class="control-label col-sm-4" >Monto Total:</label>
                <input type="text" id= "Monto" class="w3-input w3-border col-sm-4"><br>
                <label class="control-label col-sm-4" >Descripcion de Partida:</label>
                <input type="text" id= "Desc" class="w3-input w3-border col-sm-4"><br>
                <label class="control-label col-sm-4" >Numero de Factura</label>
                <input type="text" id="NumFact" class="w3-input w3-border col-sm-4"><br>
                <label class="control-label col-sm-4" >Nombre de la Empresa</label>
                <input type="text" id="NomEmp" class="w3-input w3-border col-sm-4"><br>
                <button class="w3-button w3-blue" onclick="inserta()">Agregar Partida</button>
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