<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>PANTALLA SIN CONEXION</title>
    </head>

    <body>
      <?php
      $id_pantalla = $_GET["id"];

      include('../conexion.php');

      $sqlqueryV = "SELECT * FROM estado_pantallas WHERE id_pantalla = $id_pantalla";

      if ($resultV = $mysqli->query($sqlqueryV))
        {
          if ($resultV->num_rows > 0)
          {
            while ($rowV = $resultV->fetch_object())
            {
              echo "<script>alert('Pantalla $rowV->nombre ultima conexion desde $rowV->date_actualizacion IP: $rowV->ip'); window.close();</script>";
            }
           }
        }

      ?>
     <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="../js/materialize.min.js"></script>
    </body>
  </html>