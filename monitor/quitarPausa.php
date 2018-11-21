<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>Pausando alerta pantalla</title>
    </head>

    <body>
      <?php
      $id_pantalla = $_GET["id_pantalla"];

      include('../conexion.php');

      $sqlqueryV = "UPDATE estado_pantallas SET pausar = '0' WHERE id_pantalla = $id_pantalla";

      if ($resultV = $mysqli->query($sqlqueryV))
        {
          echo "<script>alert('Pantalla se reanudo en alertas '); document.location.href= '../index.php';</script>";
        }

      ?>
     <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="../js/materialize.min.js"></script>
    </body>
  </html>