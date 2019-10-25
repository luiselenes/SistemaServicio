<?php
//esta parte sirve para registrarnos de awebo xD 
session_start();
if (!isset($_SESSION['Usuario'])){
    header('Location: index.php');
  }
?>
<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <form action="subida.php" method="post" enctype="multipart/form-data">
            <input type="file" name="archivo" id="archivo"></input>
            <input type="submit" value="Subir archivo"></input>
        </form>
    </body>
</html>
