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
          <a href="#!" class="brand-logo">Editar Unidad</a>
          <ul class="right hide-on-med-and-down">
            <li><a class="dropdown-button" href="../index.php" ><i class="material-icons">arrow_back
</i></a></li>
          </ul>
        </div>
      </nav>
      <br>
      
        <?php
          $id_unidad = $_GET["id"];
          include('../conexion.php');
          $sqlquery = "SELECT * FROM unidades RIGHT JOIN servidores ON servidores.id_servidor = unidades.id_servidor WHERE id_unidad = $id_unidad";
          if ($result = $mysqli->query($sqlquery))
          {
            if ($result->num_rows > 0)
            {
              while ($row = $result->fetch_object())
              {

               echo "

                    <div class='container grey darken-4'>
                     
                      <div class='row'>
                        <form action='editandoUnidad.php' method='post'>
                            <div class='input-field col s6 offset-s3 white-text'>
                              $row->nombre
                              <br>
                            </div>

                            <div class='input-field col s6 offset-s3'>
                              <input id='unidad' type='text' class='validate white-text' name='unidad' value = '$row->letra' required >
                              <label for='unidad'>Letra de unidad</label>
                            </div>
                            <div class='col s6 offset-s3'>
                              <label >Porcentaje minimo de espacio libre</label>
                              <p class='range-field'>
                                <input type='range' id='porcentajeMAX' name='porcentajeMAX' min='0' max='100' value='$row->porcentajeMAX' />
                              </p> 
                            </div>  
                            <div class='row'>
                            <br>
                            <input type='hidden' name='id_unidad'  value = '$row->id_unidad' /> 
                            <input type='hidden' name='id_servidor'  value = '$row->id_servidor' />
                            <button class='btn waves-effect waves-light grey col s2 offset-s7' type='submit' name='action'>Actualizar
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
      <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="../js/materialize.min.js"></script>
      <script>
        $(document).ready(function() {
        $('select').material_select();
      });
      </script>
    </body>
  </html>