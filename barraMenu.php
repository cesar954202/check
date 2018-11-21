  <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
      <ul id="dropdown1" class="dropdown-content">
        <li><a href="servidores/agregar.php">Agregar Servidor</a></li>
        <li><a href="servidores/EditarServidor.php">Editar Servidor</a></li>
        <li class="divider"></li>
        <li><a href="servidores/eliminarServidor.php">Eliminar Servidor</a></li>
      </ul>

      <ul id="dropdown2" class="dropdown-content">
        <li><a href="servidores/agregarUnidad.php">Agregar Unidad</a></li>
        <li><a href="servidores/EditarUnidad.php">Editar Unidad</a></li>
        <li class="divider"></li>
        <li><a href="X.php">Eliminar Unidad</a></li>
      </ul>

      <ul id="dropdown3" class="dropdown-content">
        <li><a href="monitorIndex.php">Ver monitoreo</a></li>
        <li><a href="monitor/agregar.php">Agregar pantalla</a></li>
        <li class="divider"></li>
        <li><a href="X.php">Eliminar pantalla</a></li>
      </ul>

      <ul id="dropdown4" class="dropdown-content">
        <li><a href="X.php">Ver monitoreo</a></li>
        <li><a href="X.php">Agregar Equipo</a></li>
        <li class="divider"></li>
        <li><a href="X.php">Eliminar equipo</a></li>
      </ul>


      <ul id="slide-out" class="side-nav">
        <li><a href="index.php">Inicio Check List GDLHA</a></li>
        <li><a href="actualizar.php">Actualizar</a></li>
        <li class="divider"></li>
        <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Servidores<i class="material-icons right">arrow_drop_down</i></a></li>
        <li><a class="dropdown-button" href="#!" data-activates="dropdown2">Unidades<i class="material-icons right">arrow_drop_down</i></a></li>
        <li><a class="dropdown-button" href="#!" data-activates="dropdown3">Monitoreo Pantallas<i class="material-icons right">arrow_drop_down</i></a></li>
        <li><a class="dropdown-button" href="#!" data-activates="dropdown4">Monitoreo Equipos<i class="material-icons right">arrow_drop_down</i></a></li>
      </ul>
      <a class="sidenav btn grey darken-3" data-activates="slide-out"><i class="material-icons grey darken-3">menu</i></a>

      <?php// include('index.php')?>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script>
        $(document).ready(function () {
          $(".sidenav").sideNav();
        });
      </script>
    </body>
  </html>