<?php
$id_servidor=$_POST['id_servidor'];
$id_unidad=$_POST['id_unidad'];
$unidad=$_POST['unidad'];
$porcentajeMAX = $_POST['porcentajeMAX'];

include('../conexion.php');

$sqlqueryCapacidad = "SELECT * FROM servidores where id_servidor = '$id_servidor' ";
if ($resultCapacidad = $mysqli->query($sqlqueryCapacidad))
{
	if ($resultCapacidad->num_rows > 0)
	{
	  while ($rowCapacidad = $resultCapacidad->fetch_object())
	  {
	  	$fp = fopen("sizeDisk.bat", "w");
	  	fputs($fp, "cd C:\\xampp\\htdocs\Check\servidores
");

	  	$escritura ="wmic /node:$rowCapacidad->ip /user:$rowCapacidad->usuario /password:$rowCapacidad->pass logicaldisk where DeviceID='$unidad:' get size > espacio.txt";
	  	fputs($fp, $escritura);
	  	fclose($fp);
	  }
	}
}
$out = shell_exec("schtasks /run /TN \"sizeDisk\"");
sleep(20);
$size = 0;
if(file_exists("espacio.txt"))
{
	$fp = fopen("espacio.txt","r");
	$mensaje = fgets($fp);
	$mensaje_substraido = $mensaje[2];

	if ($mensaje_substraido == "S")
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
			$size = $resultado;
			}
		else {
			echo "Existe un problema con el archivo resultado no hay numero";
		}
	}
	else {
		echo "Existe un problema con el archivo resultado";
	}
	fclose($fp);
}
else
{
	echo "No existe el archivo resultado";
}

$sqlquery = "UPDATE unidades SET letra = '$unidad' , capacidad = '$size', porcentajeMAX = '$porcentajeMAX' WHERE id_unidad = '$id_unidad' ";

if($result = $mysqli->query($sqlquery)){

		echo "<script type='text/javascript'> alert('Se edito correctamente'); javascript:history.go(-1); </script>";

}else{
	echo "<script type='text/javascript'> alert('Un errror impidio agregar la nueva unidad '); javascript:history.go(-1); </script>";
}
?>