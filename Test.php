  <!DOCTYPE html>
  <html> 
    <head>
       <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
       <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
       <meta name="viewport" content=" width=device-width, initial-scale=1.0"/>
    <title>Check Servidores GDLHA</title>
  </head>
  <body>
    <?php
    $date1 = new DateTime("now");
    $today = $date1->format('Y-m-d');
    if(isset($_POST['fecha']))
    {
      
      $fecha = $_POST['fecha'];
    }
    else
    {
      $fecha = $date1->format('Y-m-d');
    }
    
     echo "
    <div class='row grey darken-1'>
        <div class='col s1'> ";
          include('barraMenu.php');
    echo" </div>
        <div class=' col s3'>
          <img  src='images/lgGDLHA.png' width ='50%' >
        </div>
        <div class='col s2'>
          <h5 class='header white-text'>Check List GDLHA </h5>
        </div>
        <div class='col s2'>
          <h5 class='header'> $fecha  </h5>
        </div>
        <div class='col s4' >
            <form action = '#' method = 'post'> 
              <input type='date' class='btn col s6' value = '$fecha' name='fecha'  min='2018-07-19' max= $today required>
              <input class = 'btn waves-effect grey darken-3 '  type='submit'> 
            </form>
        </div> 
    </div>
    ";
    include('conexion.php');
    //Seleccion de servidor____________________________________________________________________
    echo "<div class = 'row' id = 'Principal'><div class = 'col s4 offset-s2'>";

    
    $sqlquerys = "SELECT * FROM servidores";
    if ($resultServidores = $mysqli->query($sqlquerys))
    {
      if ($resultServidores->num_rows > 0)
      {
      
        while ($rowServidores = $resultServidores->fetch_object())
        { 
          /////Muestra rapida estado de discos
          
          $estado = "green'> HD OK";
          $errores = 0;

          $sqlqueryV = "SELECT COUNT(*) as numero FROM servidores RIGHT JOIN unidades ON unidades.id_servidor = servidores.id_servidor RIGHT JOIN registros_espacio ON unidades.id_unidad = registros_espacio.id_unidad WHERE servidores.id_servidor = $rowServidores->id_servidor && registros_espacio.date = (SELECT MAX(DATE) FROM registros_espacio WHERE unidades.id_unidad = registros_espacio.id_unidad && date LIKE '$fecha%') && registros_espacio.observacion != 'OK' ";

          if ($resultV = $mysqli->query($sqlqueryV))
          {
            if ($resultV->num_rows > 0)
            {
              while ($rowV = $resultV->fetch_object())
              {
                $errores =  $rowV->numero;
              }
             }
          }
          /////Muestra rapida dias con el HD
          $sqlqueryV = "SELECT COUNT(*) as numero FROM servidores RIGHT JOIN registros_reinicios ON servidores.id_servidor = registros_reinicios.id_servidor 
                  WHERE servidores.id_servidor = $rowServidores->id_servidor && registros_reinicios.date = (SELECT MAX(DATE) FROM registros_reinicios
                  WHERE servidores.id_servidor = registros_reinicios.id_servidor && date LIKE '$fecha%') && registros_reinicios.observacion != 'OK'";

          if ($resultV = $mysqli->query($sqlqueryV))
          {
            if ($resultV->num_rows > 0)
            {
              while ($rowV = $resultV->fetch_object())
              {
                $errores = $errores + $rowV->numero;
              }
             }
          }

          if($errores > 0)
          {
            $estado = "red'> ERROR";
          }
          /////Muestra rapida dias

          $sqlqueryD = "SELECT * FROM registros_reinicios WHERE id_servidor = $rowServidores->id_servidor && date = (SELECT MAX(DATE) FROM registros_reinicios WHERE id_servidor = $rowServidores->id_servidor && date LIKE '$fecha%')";

          if ($resultD = $mysqli->query($sqlqueryD))
          {
            if ($resultD->num_rows > 0)
            {
              while ($rowD = $resultD->fetch_object())
              {$diasSinReiniciar =  $rowD->dias;}
             }
          }
          if(($diasSinReiniciar > 2) && ($diasSinReiniciar < 30)){$colorDias = " blue ";}
          if($diasSinReiniciar <= 2){$colorDias = " black ";}
          if($diasSinReiniciar >= 30){$colorDias = " red ";}

          $estadoDias = " <span class='white-text badge $colorDias'> $diasSinReiniciar dias </span> ";

            echo "

                <div class='btn-large col s10 modal-trigger grey' href = '#modal$rowServidores->id_servidor'> $rowServidores->nombre <span class='white-text badge $estado </span> $estadoDias </div> <br>

               <div class='modal' id='modal$rowServidores->id_servidor'>
                <div class='modal-content'>

                      <h5 class='header'> $rowServidores->nombre </h5>
                      <div class='row white-text black'>
                        <div class = 'col s2'>Unidad</div>
                        <div class = 'col s2'>Capacidad</div>
                        <div class = 'col s2'>Espacio Libre</div>
                        <div class = 'col s2'>Porcentaje</div>
                        <div class = 'col s2'>Hora de registro</div>
                        <div class = 'col s2'>Observación</div>
                      </div>    
            ";

            /////Seleccion de unidades de servidor
          $sqlqueryU = "SELECT * FROM servidores LEFT JOIN unidades ON unidades.id_servidor = servidores.id_servidor WHERE unidades.id_servidor = $rowServidores->id_servidor";
          $porcentaje = 1;
          $icono = "<i class='material-icons red'>priority_high</i>";//<i class='material-icons green accent-4'>check</i>
          if ($resultUnidades = $mysqli->query($sqlqueryU))
          {
            if ($resultUnidades->num_rows > 0)
            {
              while ($rowUnidades = $resultUnidades->fetch_object())
              {

                /////Seleccion de registros recientes de ese dia
              $sqlqueryR = "SELECT * FROM registros_espacio WHERE id_unidad = $rowUnidades->id_unidad && date = (SELECT MAX(DATE) FROM registros_espacio WHERE id_unidad = $rowUnidades->id_unidad && date LIKE '$fecha%')";
              if ($resultRegistro = $mysqli->query($sqlqueryR))
              {
                if ($resultRegistro->num_rows > 0)
                {
                  while ($rowRegistro = $resultRegistro->fetch_object())
                  { 
                    $mC = "b";
                    $capacidad = $rowUnidades->capacidad;//bytes
                    if($capacidad > 1024){
                      $capacidad = $capacidad / 1024; $mC = 'Kb';//Kb
                      if($capacidad > 1024){
                        $capacidad = $capacidad / 1024; $mC = 'Mb';//Mb
                        if($capacidad > 1024){
                          $capacidad = $capacidad / 1024; $mC = 'Gb';//Mb
                        }
                      }
                    }                 
                    $mE = "b";
                    $espacioLibre = $rowRegistro->espacioLibre;//bytes
                    if($espacioLibre > 1024){
                      $espacioLibre = $espacioLibre / 1024; $mE = 'Kb';//Kb
                      if($espacioLibre > 1024){
                        $espacioLibre = $espacioLibre / 1024; $mE = 'Mb';//Mb
                        if($espacioLibre > 1024){
                          $espacioLibre = $espacioLibre / 1024; $mE = 'Gb';//Mb
                        }
                      }
                    }

                    $porcentaje = ($rowRegistro->espacioLibre * 100)/ $rowUnidades->capacidad;

                    if($porcentaje >= $rowUnidades->porcentajeMAX ){$icono = "<i class='material-icons green accent-4'>check</i> ";}
                    else{$icono = "<i class='material-icons red'>priority_high</i>";}

                    echo "

                      <div class='row'>
                        <div class = 'col s2'> $rowUnidades->letra <a  href ='servidores/editarUnidad.php?id=$rowUnidades->id_unidad' ><i class='material-icons left'>create</i></a> </div>
                        <div class = 'col s2'> ". round($capacidad,3)." $mC </div>
                        <div class = 'col s2'> ". round($espacioLibre,3)." $mE </div>
                        <div class = 'col s2'> ". round($porcentaje,3)." % $icono </div>
                        <div class = 'col s2'> $rowRegistro->date </div>
                        <div class = 'col s2'> $rowRegistro->observacion </div>
                      </div>                    
                    ";
                  }
                }
              }

              }
            }
          }

          $sqlqueryRR = "SELECT * FROM registros_reinicios WHERE id_servidor = $rowServidores->id_servidor && date = (SELECT MAX(DATE) FROM registros_reinicios WHERE id_servidor = $rowServidores->id_servidor && date LIKE '$fecha%')";
          if ($resultRegistroR = $mysqli->query($sqlqueryRR))
          {
            if ($resultRegistroR->num_rows > 0)
            {
              while ($rowRegistroR = $resultRegistroR->fetch_object())
              {
                echo "
                  <div class='row' >
                    <div class = 'col s6'> $rowRegistroR->ultimo_reinicio </div>
                    <div class = 'col s2'> $rowRegistroR->dias dias </div>
                    <div class = 'col s2'> $rowRegistroR->date </div>
                    <div class = 'col s2'> $rowRegistroR->observacion </div>
                  </div>
                  <a href='#!' class='modal-action modal-close grey btn-flat'>Aceptar</a>

                ";
              }
            }
          }

          echo "</div> </div> ";
        }
        
      }
    }
    echo "</div>";

    //Seleccion de servidor________________________________________________________Monitor de pantallas 
    echo "<div class = 'col s4'> <ul class='collapsible popout' data-collapsible='accordion'>";
    $date1 = new DateTime("now");
    $fecha = $date1->format('Y-m-d h:i:s');

    $sqlquery = "SELECT * FROM estado_pantallas";
    if ($result = $mysqli->query($sqlquery))
    {
      if ($result->num_rows > 0)
      {
        while ($row = $result->fetch_object())
        {
          $icono = "<i class='material-icons red'>priority_high</i>";//<i class='material-icons green accent-4'>check</i>

        $date1 = new DateTime($row->date_actualizacion);
        $date2 = new DateTime("now");
        $diff = $date1->diff($date2);
          

          if($diff->days <= 0 && $diff->h <= 0 && $diff->i <= 11)
          {
            $icono = "<i class='material-icons green accent-4'>check</i> ";
          }
          else
          {
            $icono .= " <script type='text/javascript'> window.open('monitor/popUp.php?id=$row->id_pantalla','alerta$row->nombre','width=500,height=300, top=250,left=250');</script>";
          }
          $diferencia = "$diff->days:$diff->h:$diff->i:$diff->s";
          echo "
            <li>
              <div class='collapsible-header grey'> $icono $row->nombre </div>
              <div class='collapsible-body '>
                <span> 
                <div class='row '>
                  <div class = 'col s3'> IP </div>
                  <div class = 'col s3'> Ultima conexion </div>
                  <div class = 'col s3'> Diferencia</div>
                  <div class = 'col s3'> Actualizado</div>
                </div>
              </span>
             </div>
             <div class='collapsible-body '>
              <span> 
                <div class='row'>
                    <div class = 'col s3'> $row->ip</div>
                    <div class = 'col s3'> $row->date_actualizacion </div>
                    <div class = 'col s3'> $diferencia </div>
                    <div class = 'col s3'> $fecha </div>
                  </div>                    
          ";
      
        }
      }
    }

    echo "</span>
    </li> 
    </ul> 
    </div>
    </div>";
    ?>


  <script type="text/javascript" src="js/materialize.min.js"></script>
    <script>
      $(document).ready(function () {
        $(".sidenav").sideNav();
        $(".modal").modal();        
      });
    </script>
  </body>
</html>

    <div id="modal1" class="modal">
      <div class="modal-content">
      </div>
    </div>