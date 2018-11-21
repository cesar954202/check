<?php
$nombre=$_POST['nombre'];
$ip=$_POST['ip'];


include('../conexion.php');

$nombre = addslashes($nombre);
$ip = addslashes($ip);


$sqlquery = "INSERT INTO estado_pantallas ( nombre, ip ) VALUES ('$nombre', '$ip')";

if($result = $mysqli->query($sqlquery)){
	echo "<script type='text/javascript'> alert('Se agrego correctamente'); javascript:history.go(-2); </script>";
	
}else{
	echo "<script type='text/javascript'> alert('Un errror impidio agregar el nuevo servidor '); javascript:history.go(-1); </script>";
}
//echo $sqlquery;
//echo $result;
?>