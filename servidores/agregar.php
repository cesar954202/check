  <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>Agregar nuevo servidor</title>
    </head>

    <body>

      <nav>
        <div class="nav-wrapper grey darken-4">
          <a href="#!" class="brand-logo">Agregar Servidor</a>
          <ul class="right hide-on-med-and-down">
            <li><a class="dropdown-button" href="../index.php" ><i class="material-icons">arrow_back
</i></a></li>
          </ul>
        </div>
      </nav>
      <br>
      <div class="container grey darken-4">
       
        <div class="row">
          <form action="agregandoServer.php" method="post">
            <div class="input-field col s6 offset-s3">
              <input id="Nombre" type="text" class="validate white-text" name="nombre" required>
              <label for="Nombre">Nombre De Servidor</label>
            </div>


              <div class="input-field col s6 offset-s3">
                <input id="ip" type="text" class="validate white-text" name="ip" required >
                <label for="ip">Direccion IP</label>


            </div>
              <div class="input-field col s6 offset-s3">
                <input id="usuarioServer" type="text" class="validate white-text" name="usuarioServer" required>
                <label for="usuarioSrver">Dominio\Usuario</label>
              </div>



              <div class="input-field col s6 offset-s3">
                <input id="passServer" type="password" class="validate white-text" name="pass"  required>
                <label for="passServer">Contraseña Servidor</label>
              </div>
              <br>
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
    </body>
  </html>