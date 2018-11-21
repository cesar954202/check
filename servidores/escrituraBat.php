<?php
include('../conexion.php');

$sqlquery = "SELECT * FROM unidades INNER JOIN servidores ON unidades.id_servidor = servidores.id_servidor";
if ($result = $mysqli->query($sqlquery))
{
	unlink("../check.bat");
	$fp = fopen("../check.bat", "w");

  fputs($fp, "md C:\\xampp\\htdocs\Check\archivosTXT\%Date:~6,4%-%Date:~3,2%-%Date:~0,2%
");

    fputs($fp, "cd C:\\xampp\\htdocs\Check\archivosTXT\%Date:~6,4%-%Date:~3,2%-%Date:~0,2%
");
   	if ($result->num_rows > 0)
   	{
    	while ($row = $result->fetch_object())
      	{
          $archivoNombre = $row->letra . "_" . $row->nombre . "%Date:~6,4%-%Date:~3,2%-%Date:~0,2%.txt";
      		$escritura = "wmic /node:$row->ip /user:$row->usuario /password:$row->pass logicaldisk where DeviceID='$row->letra:' get freespace > $archivoNombre
";
       		//echo $escritura;
       		//echo "<br>";
       		fputs($fp, $escritura);
      	}
    }
}
$sqlquery = "SELECT * FROM servidores";
if ($result = $mysqli->query($sqlquery))
{
    if ($result->num_rows > 0)
    {
      while ($row = $result->fetch_object())
        {
          $archivoNombre = $row->nombre . "_T_%Date:~6,4%-%Date:~3,2%-%Date:~0,2%.txt";
          $escritura = "systeminfo /s $row->ip /u $row->usuario /p $row->pass | find \"Tiempo\" > $archivoNombre
";
          //echo $escritura;
          //echo "<br>";
          fputs($fp, $escritura);
        }
    }
}

fclose($fp);
?>