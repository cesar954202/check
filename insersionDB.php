<?php
include('conexion.php');

if ($result = $mysqli->query("SELECT * FROM servidores LEFT JOIN unidades ON unidades.id_servidor = servidores.id_servidor"))
{
	if ($result->num_rows > 0)
	{
		while ($row = $result->fetch_object())
		{
			$date1 = new DateTime("now");
			$fechactual = $date1->format('Y-m-d');
			$servidor = $row->nombre;
			$unidad = $row->letra;
			$archivo = $unidad . "_" . $servidor . $fechactual . ".txt";
			$observacion = "Error";
			$espacioLibre = 0;
				if(file_exists("archivosTXT/". $fechactual ."/" . $archivo))
				{
					$fp = fopen("archivosTXT/". $fechactual ."/". $archivo,"r");
					$mensaje = fgets($fp);
					$mensaje_substraido = $mensaje[2];

					if ($mensaje_substraido == "F")
					{
						$espacio = fgets($fp);
						$resultado  = "";
						$tam = strlen($espacio);
						for ($i=0; $i < $tam; $i++) {
							if(is_numeric($espacio[$i]))
							{$resultado.=$espacio[$i];}
						}
						if(is_numeric($resultado))
						{
							$espacioLibre = $resultado;
							$porcentaje = ($espacioLibre * 100)/ $row->capacidad;
							if($porcentaje >= $row->porcentajeMAX )
							{
								$observacion = "OK";
							}
							else
							{
								$observacion = "Disco espacio libre menor al $row->porcentajeMAX % ";
							}
						}
						else {
							$observacion = "Existe un problema con el archivo resultado no hay numero";
							$espacioLibre = 0;
						}
					}
					else {
						$observacion =  "Problema con el archivo resultado, esta vacio o dañado, verificar claves de sesion en servidor";
						$espacioLibre = 0;
					}
					fclose($fp);
				}
				else
				{
					$observacion = "No existe el archivo resultado";
					$espacioLibre = 0;
				}
				//echo "$row->id_servidor $servidor $row->id_unidad $unidad $espacioLibre $observacion <br>" ;
				$sqlqueryInsert = "INSERT INTO registros_espacio ( id_unidad, espacioLibre , observacion ) VALUES ('$row->id_unidad', '$espacioLibre', '$observacion')";
				//echo $sqlqueryInsert . "<br>";
				if($resultInsercion = $mysqli->query($sqlqueryInsert)){
					//echo "<script type='text/javascript'> alert('Se agrego  '); </script>";
					//echo $sqlqueryInsert . "<br>";
					//echo "Ok";
				}else{
					echo "<script type='text/javascript'> alert('Un errror impidio agregar datos de espacio libre '); </script>";
					/////SELECT * FROM `registros_espacio` WHERE id_unidad = 4 && date = (SELECT MAX(DATE) FROM registros_espacio WHERE id_unidad = 4 && date ), para consultar se ve seleccionar el mas tarde de un dia
				}
		}
	}
}

if ($result = $mysqli->query("SELECT * FROM servidores "))
{
	if ($result->num_rows > 0)
	{
		while ($row = $result->fetch_object())
		{
// extraccion de datos de tiempo
			$servidor = $row->nombre;
			$archivoTiempo = $servidor . "_T_" . $fechactual . ".txt";
			$dias = 0;
			$observacion = "ERROR";
			$ultimo_reinicio = "Error";			
			$estado_servidor = "ERROR";

			if(file_exists("archivosTXT/". $fechactual ."/". $archivoTiempo))
			{
				$fp = fopen("archivosTXT/". $fechactual ."/". $archivoTiempo,"r");
				$mensaje = fgets($fp);
				$ultimo_reinicio = $mensaje;
				
				//echo "<td>" . $mensaje . "</td>";  // Aqui esta el mensaje Para Base de datos
				if($mensaje[0]=="T")
				{
					$fechaarranque = $mensaje[49] . $mensaje[50] . $mensaje[51] . $mensaje[52] . "-" . $mensaje[46] . $mensaje[47] . "-" . $mensaje[43] . $mensaje[44];
					$fecha1 = new DateTime($fechaarranque);
					$fecha2 = new DateTime($fechactual);
					$diff = $fecha1->diff($fecha2); 
					//echo "$row->id_servidor $row->nombre $dias <br>";//////////////////////////////////////////////////////////////////////////////Listo para SQL
					$dias = $diff->days; 
					$observacion = "OK";

				}
				else {
					$observacion = "No se pudo abrir el archivo resultado de tiempo.";
				}
			}
			else
			{
				$observacion = "No hay archivo resultado tiempo";
			}

			$sqlqueryInsert = "INSERT INTO registros_reinicios ( id_servidor, ultimo_reinicio , dias , observacion) VALUES ('$row->id_servidor', '$ultimo_reinicio', '$dias' , '$observacion')";
				//echo $sqlqueryInsert . "<br>";
			if($resultInsercion = $mysqli->query($sqlqueryInsert)){
				//echo "<script type='text/javascript'> alert('Se agrego  '); </script>";
				//echo $sqlqueryInsert . "<br>";
				echo "Ok";
			}else{
				echo "<script type='text/javascript'> alert('Un errror impidio insertar en SQL datos de reinicios '); </script>";
				/////SELECT * FROM `registros_espacio` WHERE id_unidad = 4 && date = (SELECT MAX(DATE) FROM registros_espacio WHERE id_unidad = 4 && date ), para consultar se ve seleccionar el mas tarde de un dia
			}
		}
	}
}
echo "<script languaje='javascript' type='text/javascript'>window.close();</script>";
?>