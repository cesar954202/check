<?php

$out = shell_exec("schtasks /run /TN \"checkList\"");
//header('Location: index.php');
//sleep(185);

?>

  <!DOCTYPE html>
  <html>
    <head>
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

     <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

     <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

     <script language="javascript"> 
 		var segundos = 

    <?php
      include('conexion.php');
      $sqlquery = "SELECT COUNT(*) as numero FROM servidores LEFT JOIN unidades ON unidades.id_servidor = servidores.id_servidor";
      if ($result = $mysqli->query($sqlquery))
      {
        if ($result->num_rows > 0)
        {
          while ($row = $result->fetch_object())
          {
            $segundos = ($row->numero * 5) + 20;
           echo "$segundos";
          }
        }
      }
    ?>

    ; 
    	function tiempo(){  
  		var t = setTimeout("tiempo()",1000);  
 		 document.getElementById('contenedor').innerHTML = 'Será redireccionado en '+segundos--+" segundos.";  
  		if (segundos==0){
        	window.location.href='index.php'; 
   			clearTimeout(t);  
  			}  
 		}  
 		tiempo()
    </script> 
    </head>
    <title>Actualizando Check</title>

    <body>
    <center>
      <div class="card-panel grey darken-1">
        <span class="white-text" id="contenedor">
        </span>
        <br>
      <div class="preloader-wrapper big active">
        <div class="spinner-layer spinner-blue">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div><div class="gap-patch">
            <div class="circle"></div>
          </div><div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>
      </div>
      <center>


 
    <script type="text/javascript" src="js/materialize.min.js"></script>
	</body>
</html>