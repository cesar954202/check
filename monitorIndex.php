  <!DOCTYPE html>
  <html>
    <head>
	     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	     <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	     <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta http-equiv="refresh" content="30">
		<title>Check Pantallas GDLHA</title>
	</head>
	<body>
		
		<div class="row">
			<div class="card horizontal grey darken-1">
				<div>
					<?php include('barraMenu.php');?>
				</div>
				<div class="card-image col s2">
					<img src="images/lgGDLHA.png">
				</div>
				<div class="card-stacked">
					<div class="card-content">
					  <h5 class="header">Monitor Pantallas</h5>
					</div>
				</div>
			</div>
		</div>
		<?php
		include('conexion.php');
		//Seleccion de servidor____________________________________________________________________
		echo "<div class = 'row'><div class = 'col s6 offset-s3'> <ul class='collapsible popout' data-collapsible='accordion'>";
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
		</div>
		</li> 
		</ul> 
		</div>
		</div>";
		?>

	<script type="text/javascript" src="js/materialize.min.js"></script>
	<script>

	</script>
	</body>
   </html>
