  <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>Eliminar Servidor</title>
    </head>

    <body>

      <nav>
        <div class="nav-wrapper grey darken-4">
          <a href="#!" class="brand-logo">Eliminar Servidor</a>
          <ul class="right hide-on-med-and-down">
            <li><a class="dropdown-button" href="../index.php" ><i class="material-icons">arrow_back
</i></a></li>
          </ul>
        </div>
      </nav>
      <br>
      <div class="container grey darken-4">
       
        <div class="row">
          <form action="eliminandoServidor.php" method="post">
            <div class="input-field col s6 offset-s3 white-text">
              <select name="servidor" required>
                <?php
                  include('../conexion.php');
                  $sqlquery = "SELECT * FROM servidores";
                  if ($result = $mysqli->query($sqlquery))
                  {
                    if ($result->num_rows > 0)
                    {
                      while ($row = $result->fetch_object())
                      {
                       echo "<option value= '$row->id_servidor' > $row->nombre</option>";
                      }
                    }
                  }
                ?>
              </select>
              <label>Servidores</label>
            </div>

             <div class="row">
              <br>
              <button class="btn waves-effect waves-light grey col s2 offset-s7" type="submit" name="action">Guardar
                <i class="material-icons right">send</i>
              </button>
              </div>
          </form>
        </div>
      </div>


     <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="../js/materialize.min.js"></script>
      <script>
        $(document).ready(function() {
        $('select').material_select();
      });
      </script>
    </body>
  </html>