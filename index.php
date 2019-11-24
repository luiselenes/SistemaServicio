<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Iniciar Sesion</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="css/w3.css">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Iniciar Sesion</div>
        <div class="card-body">
         <!-- <form action="Sesions.php" method="post"> -->
            <div class="form-group">
              <div class="form-label-group">
                <!--<input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="required" autofocus="autofocus"> -->
                <input type="text" id="inputU" name="inputU" class="form-control" required="required">
                <label for="inputEmail">Usuario</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputPassword" name="inputPassword" class="form-control" required="required">
                <label for="inputPassword">Contraseña</label>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="remember-me">
                  Recordar Contraseña
                </label>
              </div>
            </div>
            <button class="btn btn-primary btn-block" onClick="inseccion()">Acceder</button>
            <!--<input class="btn btn-primary btn-block" type = "submit" value = "Ingresar" />-->
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="Registro.html">Registra una Cuenta</a>
            <a class="d-block small" href="OlvidarContra.html">Olvidaste tu Contraseña?</a>
            <p class="d-block small" id="equivocado">
            <?php
            if (isset($_SESSION['Err'])){
              echo $_SESSION['Err'];
            }
            ?>
            </p>
          </div>
        </div>
      </div>
    </div>
    <div id="emergente" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-top" style="max-width:200px">
            <div class="w3-center"><br>
                <h1>Bienvenido</h1><br>
                <span onClick="move()" class="w3-button w3-black w3-round-large"> 
                    Aceptar
                </span>
            </div>
            <br>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/loger.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
