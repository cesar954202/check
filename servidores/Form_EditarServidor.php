  <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>Editar servidor</title>
    </head>

    <body>

      <nav>
        <div class="nav-wrapper grey darken-4">
          <a href="#!" class="brand-logo">Editando Servidor</a>
          <ul class="right hide-on-med-and-down">
            <li><a class="dropdown-button" href="EditarServidor.php" ><i class="material-icons">arrow_back
</i></a></li>
          </ul>
        </div>
      </nav>
      <br>
      <div class="container grey darken-4">

        <?php
        $id_servidor=$_POST['servidor'];

        include('../conexion.php');
        $sqlquery = "SELECT * FROM servidores WHERE id_servidor = $id_servidor";
        if ($result = $mysqli->query($sqlquery))
        {
          if ($result->num_rows > 0)
          {
            while ($row = $result->fetch_object())
            {
             

             echo "
                  <div class='row'>
                    <form action='editandoServer.php' method='post'>
                      <input type='hidden' name='id_servidor' value='$row->id_servidor'>

                      <div class='input-field col s6 offset-s3'>
                        <input id='Nombre' type='text' class='validate white-text' name='nombre' value='$row->nombre' required>
                        <label for='Nombre'>Nombre De Servidor</label>
                      </div>

                      <div class='input-field col s6 offset-s3'>
                          <input id='ip' type='text' class='validate white-text' name='ip' value='$row->ip' required >
                          <label for='ip'>Direccion IP</label>


                      </div>
                        <div class='input-field col s6 offset-s3'>
                          <input id='usuarioServer' type='text' class='validate white-text' name='usuarioServer' value='$row->usuario' required>
                          <label for='usuarioSrver'>Dominio\Usuario</label>
                        </div>



                        <div class='input-field col s6 offset-s3'>
                          <input id='passServer' type='password' class='validate white-text' name='pass' value='$row->pass' required>
                          <label for='passServer'>Contraseña Servidor</label>
                        </div>
                        <br>
                        <div class='row'>
                        <br>
                        <button class='btn waves-effect waves-light grey col s2 offset-s7' type='submit' name='action'>Guardar Cambios
                          <i class='material-icons right'>send</i>
                        </button>
                        </div>
                    </form>
                  </div>
                </div>

             ";
            }
          }
        }
        ?>
       
     <!--Import jQuery before materialize.js-->
      <script type='text/javascript' src='../js/jquery-3.2.1.min.js'></script>
      <script type='text/javascript' src='../js/materialize.min.js'></script>
    </body>
  </html>